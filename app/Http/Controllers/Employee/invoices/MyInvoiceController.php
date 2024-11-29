<?php

namespace App\Http\Controllers\Employee\invoices;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceCreated;
use App\Models\Shipment;
use App\Models\ShipmentInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class MyInvoiceController extends Controller
{
    public function InvoicePersonAdd(Request $request)
    {
        // Form verilerini doğrula
        $validatedData = $request->validate([
            'price' => 'required|numeric',
            'date' => 'required|date',
        ]);
        
        // Sevkiyat bilgisini alın
        $shipment = Shipment::find($request->input('shipment_id'));
        
        if (!$shipment) {
            return redirect()->back()->with('error', 'Sevkiyat bulunamadı');
        }
        // Eğer fatura daha önce oluşturulmuşsa, kullanıcıyı bilgilendirin
        if ($shipment->invoice_date !== null) {
            return redirect()->back()->with('error', 'Bu sevkiyat için fatura zaten oluşturulmuş.');
        }
        // Son fatura numarasını al
        $lastInvoice = ShipmentInvoice::orderBy('id', 'desc')->first();
        if ($lastInvoice) {
            $lastInvoiceNumber = intval(str_replace('INV-', '', $lastInvoice->i_no));
        } else {
            $lastInvoiceNumber = 999; // İlk fatura numarası 1000 olacak
        }
        $newInvoiceNumber = $lastInvoiceNumber + 1;
        // Fatura bilgilerini oluştur
        $invoice = new ShipmentInvoice();
        $invoice->company_id = $shipment->company_id;
        $invoice->user_id = $shipment->user_id; // Giriş yapan kullanıcı ID'si
        $invoice->shipment_id = $shipment->id;
        $invoice->i_no = 'RE-'.$newInvoiceNumber; // Benzersiz fatura numarası oluştur
        $invoice->author = $shipment->author;
        
        
        $authorCompany = $shipment->author_company;
        $companyInfo = [
            'name' => $authorCompany['name'],
            'phone' => $authorCompany['phone'],
            'tax_number' => $authorCompany['tax_number'],
            'logo' => $authorCompany['logo'],
            'fax' => $authorCompany['fax'],
            'hrb' => $authorCompany['hrb'],
            'iban' => $authorCompany['iban'],
            'bic' => $authorCompany['bic'],
            'stnr' => $authorCompany['stnr'],
            'ust_id_nr' => $authorCompany['ust_id_nr'],
            'registry_court' => $authorCompany['registry_court'],
            'general_manager' => $authorCompany['general_manager'],
            'email' => $authorCompany ['email'],
            'street' => $authorCompany['street'] ?? '',
            'zip_code' => $authorCompany['zip_code'] ?? '',
            'city' => $authorCompany['city'] ?? '',
            'country' => $authorCompany['country'] ?? '',
        ];
        
        $customer = $shipment->customer;
        $customerInfo = [
            'name' => $customer['name'],
            'phone' => $customer['phone'],
            'email' => $customer ['email'],
            'company_name' => $customer ['company_name'],
            'street' => $customer['street'] ?? '',
            'zip_code' => $customer['zip_code'] ?? '',
            'city' => $customer['city'] ?? '',
            'country' => $customer['country'] ?? '',
        ];
        
        
        $uploadShipmentsInfo = $shipment->upload_info;
        $uploadInfo = [];
        
        foreach ($uploadShipmentsInfo as $info) {
            $uploadInfo[] = [
                
                'id' => $info['id'],
                'company_name' => $info['company_name'],
                'name' => $info['name'],
                'phone' => $info['phone'],
                'street' => $info['street'],
                'zip_code' => $info['zip_code'],
                'city' => $info['city'],
                'country' => $info['country'],
                'upload_date' => $info['upload_date'],
                'time_start' => $info['time_start'],
                'time_end' => $info['time_end'],
                'ref_no' => $info['ref_no'],
                'content' => $info['content'],
            ];
        }
        
        $deliveryShipmentsInfo = $shipment->delivery_info;
        $deliveryInfo = [];
        
        foreach ($deliveryShipmentsInfo as $info) {
            $deliveryInfo[] = [
                
                'company_name' => $info['company_name'],
                'name' => $info['name'],
                'phone' => $info['phone'],
                'street' => $info['street'],
                'zip_code' => $info['zip_code'],
                'city' => $info['city'],
                'country' => $info['country'],
                'upload_date' => $info['upload_date'],
                'time_start' => $info['time_start'],
                'time_end' => $info['time_end'],
                'ref_no' => $info['ref_no'],
                'content' => $info['content'],
            ];
        }
        
        
        $invoice->author_company = $companyInfo; // Yazarın şirket bilgisi
        $invoice->customer = $customerInfo; // Müşteri bilgisi
        
        $invoice->upload_info = $uploadInfo; // Yükleme bilgisi
        $invoice->delivery_info = $deliveryInfo; // Teslimat bilgisi
        
        $invoice->price = $validatedData['price'];
        $invoice->created_at = $validatedData['date'];
        $invoice->updated_at = $validatedData['date'];
        $invoice->download_token = Str::random(16); // Benzersiz bir indirme tokeni oluştur
        
        // Faturayı veritabanına kaydet
        $invoice->save();
        // Sevkiyatın fatura ID'sini güncelle
        
        // Fatura oluşturulduktan sonra sevkiyat tablosundaki invoice_date sütununu güncelleyin
        $shipment->invoice_date = now();
        $shipment->invoice_id = $invoice->id;
        $shipment->save();

        Mail::to($shipment->customer['email'])->send(new InvoiceCreated($invoice));

        return redirect()->back()->with('success', 'Rechnung erfolgreich erstellt');
    }
    public function downloadPersonInvoice(ShipmentInvoice $invoice)
    {
        // Kullanıcının şirketine ait olup olmadığını kontrol et
        if ($invoice->company_id !== auth()->user()->company_id || $invoice->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Sie sind nicht berechtigt, diese Rechnung herunterzuladen.');
        }

        // PDF oluştur
        $pdf = PDF::loadView('pdf.invoice-pdf', ['invoice' => $invoice]);

        // PDF dosyasını indirin
        return $pdf->download($invoice->i_no . '.pdf');
    }
}
