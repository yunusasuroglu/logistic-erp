<?php

namespace App\Http\Controllers\employee\shipments;

use App\Http\Controllers\Controller;
use App\Mail\ShipmentMail;
use App\Models\Contact;
use App\Models\Shipment;
use App\Models\ShipmentInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class MyShipmentsController extends Controller
{
    // Kendi Sevkiyatlarım
    public function MyShipmentsView()
    {
        // Giriş yapmış kullanıcıyı al
        $user = Auth::user();
        
        // Kullanıcının şirket ID'sini al
        $companyId = $user->company_id;
        
        // Şirkete ve giriş yapmış kullanıcıya ait sevkiyatları al
        $shipments = Shipment::where('company_id', $companyId)->where('user_id', $user->id)->paginate(10);
        
        // Şu anki tarihten bir ay öncesine kadar olan siparişleri al
        $oneMonthAgo = Carbon::now()->subMonth();
        
        // Statusu 1 olan ve şirkete ait siparişlerin 1 Aylık Toplam Fiyatı
        $monthlyTotalRevenue = Shipment::where('company_id', $companyId)->where('user_id', $user->id)->where('status', 1)->where('created_at', '>=', $oneMonthAgo)->sum('price');
        
        // Statusu 1 olan ve şirkete ait siparişlerin 1 Aylık Nakliye Gideri
        $monthlyCarrierExpense = Shipment::where('company_id', $companyId)->where('user_id', $user->id)->where('status', 1)->where('created_at', '>=', $oneMonthAgo)->sum('carrier_price');
        
        // Statusu 1 olan ve şirkete ait siparişlerin 1 Aylık Net Kazancı
        $monthlyNetGainExpense = Shipment::where('company_id', $companyId)->where('user_id', $user->id)->where('status', 1)->where('created_at', '>=', $oneMonthAgo)->sum('net_gain');
        
        // Şu anki tarihten bir hafta öncesine kadar olan siparişleri al
        $oneWeekAgo = Carbon::now()->subWeek();
        
        // Bir hafta içindeki şirkete ve giriş yapmış kullanıcıya ait sipariş sayısını al
        $weeklyShipmentCount = Shipment::where('company_id', $companyId)->where('user_id', $user->id)->where('created_at', '>=', $oneWeekAgo)->count();
        
        return view('employee.shipments.shipments', compact('shipments', 'monthlyTotalRevenue', 'monthlyCarrierExpense', 'monthlyNetGainExpense', 'weeklyShipmentCount'));
    }
    public function ShipmentsAdd()
    {
        $employee = auth()->user(); // veya Employee modelinde oturum açan kullanıcıyı nasıl tanımlıyorsanız
        
        // Kullanıcının bağlı olduğu şirketi alalım
        $company = $employee->company;
        
        // Şirketin müşterilerini ve nakliyecilerini alalım
        $customers = $company ? $company->contacts()->where('type', 1)->get() : collect();
        $carriers = $company ? $company->contacts()->where('type', 2)->get() : collect();
        // Şirketin shipment info kayıtlarını alalım
        $shipmentsInfo = $company ? $company->shipmentInfo()->where('type', 1)->get() : collect();
        $deliveryInfo = $company ? $company->shipmentInfo()->where('type', 2)->get() : collect();
        
        $shipmentsInfo = $shipmentsInfo->map(function ($shipmentInfo) {
            $shipmentInfo->infoArray = json_decode($shipmentInfo->info, true);
            return $shipmentInfo;
        });
        
        $deliveryInfo = $deliveryInfo->map(function ($deliveryInfo) {
            $deliveryInfo->infoArray = json_decode($deliveryInfo->info, true);
            return $deliveryInfo;
        });
        
        return view('employee.shipments.new-shipment', compact('customers','company', 'carriers','deliveryInfo', 'shipmentsInfo'));
    }
    public function ShipmentsStore(Request $request)
    {
        $data = $request->all();
        $user = Auth::user();
        $shipment = new Shipment();
        $authorName = $user->name;
        $authorSurname = $user->surname ?? '';
        $shipment->author = $authorName . ($authorSurname ? ' ' . $authorSurname : '');
        $shipment->company_id = $user->company_id;
        $shipment->user_id = $user->id;
        
        // Müşteri işlemleri
        if (isset($data['customer_select']) && $data['customer_select'] === 'new_customer') {
            $customerInfo = [
                'company_id' => auth()->user()->company_id,
                'type' => 1,
                'name' => $data['customer-name-surname'],
                'email' => $data['customer-email'],
                'phone' => $data['customer-phone'],
                'company_name' => $data['customer-company-name'],
                'address' => json_encode([
                    'street' => $data['customer-street'],
                    'zip_code' => $data['customer-zip-code'],
                    'city' => $data['customer-city'],
                    'country' => $data['customer-country'],
                ]),
            ];
            
            // Yeni müşteri oluştur ve veritabanına ekle
            Contact::create($customerInfo);
            $shipment->customer = [
                'company_name' => $data['customer-company-name'] ?? null,
                'name' => $data['customer-name-surname'] ?? null,
                'street' => $data['customer-street'] ?? null,
                'zip_code' => $data['customer-zip-code'] ?? null,
                'city' => $data['customer-city'] ?? null,
                'country' => $data['customer-country'] ?? null,
                'email' => $data['customer-email'] ?? null,
                'phone' => $data['customer-phone'] ?? null,
            ];
        } else {
            
            $shipment->customer = [
                'company_name' => $data['customer-company-name'] ?? null,
                'name' => $data['customer-name-surname'] ?? null,
                'street' => $data['customer-street'] ?? null,
                'zip_code' => $data['customer-zip-code'] ?? null,
                'city' => $data['customer-city'] ?? null,
                'country' => $data['customer-country'] ?? null,
                'email' => $data['customer-email'] ?? null,
                'phone' => $data['customer-phone'] ?? null,
            ];
            
        }
        
        if (isset($data['carrier_check']) && $data['carrier_check'] === 'carrier_yes') {
            if ($data['carrier_select'] === 'new_carrier') {
                // Yeni nakliyeci oluştur ve veritabanına ekle
                $carrierInfo = [
                    'company_id' => auth()->user()->company_id,
                    'type' => 2,
                    'company_name' => $data['carrier-company-name'],
                    'name' => $data['carrier-name-surname'],
                    'address' => json_encode([
                        'street' => $data['carrier-street'],
                        'zip_code' => $data['carrier-zip-code'],
                        'city' => $data['carrier-city'],
                        'country' => $data['carrier-country'],
                    ]),
                    'email' => $data['carrier-email'],
                    'phone' => $data['carrier-phone'],
                ];
                Contact::create($carrierInfo);
                $shipment->carrier = [
                    'company_name' => $data['carrier-company-name'],
                    'name' => $data['carrier-name-surname'],
                    'street' => $data['carrier-street'],
                    'zip_code' => $data['carrier-zip-code'],
                    'city' => $data['carrier-city'],
                    'country' => $data['carrier-country'],
                    'email' => $data['carrier-email'],
                    'phone' => $data['carrier-phone'],
                ];
            } else {
                // Yeni nakliyeci seçilmediyse ve mevcut bir nakliyeci seçildiyse, bu nakliyeci bilgilerini sevkiyata ekleyin
                $shipment->carrier = [
                    'company_name' => $data['carrier-company-name'],
                    'name' => $data['carrier-name-surname'],
                    'street' => $data['carrier-street'],
                    'zip_code' => $data['carrier-zip-code'],
                    'city' => $data['carrier-city'],
                    'country' => $data['carrier-country'],
                    'email' => $data['carrier-email'],
                    'phone' => $data['carrier-phone'],
                ];
            }
        } else {
            $shipment->carrier = null; // Nakliyeci seçilmediği için null
        }
        // Yükleme yerlerini işleyin
        $shipments = []; // Boş bir dizi oluştur
        $deliveries = [];
        for ($i = 1; isset($data['shipments_company_' . $i]); $i++) {
            if ($data['shipments_select-' . $i] === 'new_shipment') {
                $shipmentData = [
                    'id' => $i,
                    'company_name' => $data['shipments_company_' . $i],
                    'name' => $data['shipments_name_' . $i],
                    'phone' => $data['shipments_phone_' . $i],
                    'street' => $data['shipments_street_' . $i],
                    'zip_code' => $data['shipments_zip_' . $i],
                    'city' => $data['shipments_city_' . $i],
                    'country' => $data['shipments_country_' . $i],
                    'upload_date' => $data['shipments_upload_date_' . $i],
                    'time_start' => $data['shipments_time_start_' . $i],
                    'time_end' => $data['shipments_time_end_' . $i],
                    'ref_no' => $data['shipments_ref_no_' . $i],
                    'content' => $data['shipments_content_' . $i],
                ];
                $shipments[] = $shipmentData;
                
                // Yalnızca yeni gönderi seçildiğinde gönderi bilgisi oluşturun
                ShipmentInfo::create([
                    'company_id' => auth()->user()->company_id,
                    'type' => 1,
                    'info' => json_encode([
                        'company_name' => $shipmentData['company_name'],
                        'name' => $shipmentData['name'],
                        'phone' => $shipmentData['phone'],
                        'street' => $shipmentData['street'],
                        'zip_code' => $shipmentData['zip_code'],
                        'city' => $shipmentData['city'],
                        'country' => $shipmentData['country'],
                    ]),
                ]);
            } else {
                $shipmentData = [
                    'id' => $i,
                    'company_name' => $data['shipments_company_' . $i],
                    'name' => $data['shipments_name_' . $i],
                    'phone' => $data['shipments_phone_' . $i],
                    'street' => $data['shipments_street_' . $i],
                    'zip_code' => $data['shipments_zip_' . $i],
                    'city' => $data['shipments_city_' . $i],
                    'country' => $data['shipments_country_' . $i],
                    'upload_date' => $data['shipments_upload_date_' . $i],
                    'time_start' => $data['shipments_time_start_' . $i],
                    'time_end' => $data['shipments_time_end_' . $i],
                    'ref_no' => $data['shipments_ref_no_' . $i],
                    'content' => $data['shipments_content_' . $i],
                ];
                $shipments[] = $shipmentData;
            }
        }
        
        if (!empty($shipments)) {
            $shipment->upload_info = $shipments;
        }
        // Teslimat Yerlerini İşle
        
        for ($i = 1; isset($data['deliverys_company_' . $i]); $i++) {
            if ($data['deliverys_select-' . $i] === 'new_delivery') {
                $deliveryData = [
                    'company_name' => $data['deliverys_company_' . $i],
                    'name' => $data['deliverys_name_' . $i],
                    'phone' => $data['deliverys_phone_' . $i],
                    'street' => $data['deliverys_street_' . $i],
                    'zip_code' => $data['deliverys_zip_' . $i],
                    'city' => $data['deliverys_city_' . $i],
                    'country' => $data['deliverys_country_' . $i],
                    'upload_date' => $data['deliverys_upload_date_' . $i],
                    'time_start' => $data['deliverys_time_start_' . $i],
                    'time_end' => $data['deliverys_time_end_' . $i],
                    'ref_no' => $data['deliverys_ref_no_' . $i],
                    'content' => $data['deliverys_content_' . $i],
                ];
                $deliveries[] = $deliveryData;
                
                ShipmentInfo::create([
                    'company_id' => auth()->user()->company_id,
                    'type' => 2,
                    'info' => json_encode([
                        'company_name' => $deliveryData['company_name'],
                        'name' => $deliveryData['name'],
                        'phone' => $deliveryData['phone'],
                        'street' => $deliveryData['street'],
                        'zip_code' => $deliveryData['zip_code'],
                        'city' => $deliveryData['city'],
                        'country' => $deliveryData['country'],
                    ]),
                ]);
            } else {
                $deliveryData = [
                    'company_name' => $data['deliverys_company_' . $i],
                    'name' => $data['deliverys_name_' . $i],
                    'phone' => $data['deliverys_phone_' . $i],
                    'street' => $data['deliverys_street_' . $i],
                    'zip_code' => $data['deliverys_zip_' . $i],
                    'city' => $data['deliverys_city_' . $i],
                    'country' => $data['deliverys_country_' . $i],
                    'upload_date' => $data['deliverys_upload_date_' . $i],
                    'time_start' => $data['deliverys_time_start_' . $i],
                    'time_end' => $data['deliverys_time_end_' . $i],
                    'ref_no' => $data['deliverys_ref_no_' . $i],
                    'content' => $data['deliverys_content_' . $i],
                ];
                $deliveries[] = $deliveryData;
            }
        }
        
        
        if (!empty($deliveries)) {
            $shipment->delivery_info = $deliveries;
        }
        $carrierPrice = $request->input('carrier_price', 0);
        $price = $request->input('price');
        
        $shipment->carrier_price = $carrierPrice ?? 0;
        
        // Nakliyeci ücreti varsa ve doluysa, kaydet
        if (!empty($price)) {
            $shipment->price = $price;
        }
        $authorCompany = $user->company;
        $authorAddress = json_decode($authorCompany->address, true);
        // Şirket bilgilerini JSON formatına dönüştür
        $companyInfo = [
            'name' => $authorCompany->name,
            'phone' => $authorCompany->phone,
            'tax_number' => $authorCompany->tax_number,
            'logo' => $authorCompany->logo,
            'fax' => $authorCompany->fax,
            'hrb' => $authorCompany->hrb,
            'iban' => $authorCompany->iban,
            'bic' => $authorCompany->bic,
            'stnr' => $authorCompany->stnr,
            'ust_id_nr' => $authorCompany->ust_id_nr,
            'registry_court' => $authorCompany->registry_court,
            'general_manager' => $authorCompany->general_manager,
            'email' => $authorCompany->email,
            'street' => $authorAddress['street'] ?? '',
            'zip_code' => $authorAddress['zip_code'] ?? '',
            'city' => $authorAddress['city'] ?? '',
            'country' => $authorAddress['country'] ?? '',
        ];
        
        // Net Again hesaplaması
        $netGain = $price - $carrierPrice;
        $shipment->net_gain = $netGain;
        $shipment->author_company = $companyInfo;
        $shipment->status = 3;
        $shipment->s_code = $this->generateUniqueShipmentCode();
        $shipment->download_token = Str::random(40);
        $shipment->save();
        
        return redirect()->route('my.shipments')->with('success', 'Die Sendung wurde erfolgreich hinzugefügt.');
    }
    
    public function ShipmentsEdit($id)
    {
        $employee = auth()->user();
        // Kullanıcının bağlı olduğu şirketi alalım
        $company = $employee->company;

        $shipment = Shipment::where('id', $id)->where('company_id', $company->id)->where('user_id', $employee->id)->firstOrFail();
        
        // Şirketin müşterilerini ve nakliyecilerini alalım
        $customers = $company ? $company->contacts()->where('type', 1)->get() : collect();
        $carriers = $company ? $company->contacts()->where('type', 2)->get() : collect();
        $shipmentsInfo = $company ? $company->shipmentInfo()->where('type', 1)->get() : collect();
        $deliveryInfo = $company ? $company->shipmentInfo()->where('type', 2)->get() : collect();
        
        $shipmentsInfo = $shipmentsInfo->map(function ($shipmentInfo) {
            $shipmentInfo->infoArray = json_decode($shipmentInfo->info, true);
            return $shipmentInfo;
        });
        
        $deliveryInfo = $deliveryInfo->map(function ($deliveryInfo) {
            $deliveryInfo->infoArray = json_decode($deliveryInfo->info, true);
            return $deliveryInfo;
        });
        return view('employee.shipments.edit-shipment', compact('shipment','customers','company','carriers','deliveryInfo','shipmentsInfo'));
    }
    public function ShipmentsUpdate(Request $request, $id)
    {
        $data = $request->all();
        
        $employee = auth()->user();
        // Kullanıcının bağlı olduğu şirketi alalım
        $company = $employee->company;

        $shipment = Shipment::where('id', $id)->where('company_id', $company->id)->where('user_id', $employee->id)->firstOrFail();
        
        if (!$shipment) {
            return redirect()->back()->with('error', 'Sevkiyat bulunamadı.');
        }
        
        // Müşteri işlemleri
        if (isset($data['customer_select']) && $data['customer_select'] === 'new_customer') {
            $customerInfo = [
                'company_id' => auth()->user()->company_id,
                'type' => 1,
                'name' => $data['customer-name-surname'],
                'email' => $data['customer-email'],
                'phone' => $data['customer-phone'],
                'company_name' => $data['customer-company-name'],
                'address' => json_encode([
                    'street' => $data['customer-street'],
                    'zip_code' => $data['customer-zip-code'],
                    'city' => $data['customer-city'],
                    'country' => $data['customer-country'],
                ]),
            ];
            // Yeni müşteri oluştur ve veritabanına ekle
            Contact::create($customerInfo);
            $shipment->customer = [
                'company_name' => $data['customer-company-name'] ?? null,
                'name' => $data['customer-name-surname'] ?? null,
                'street' => $data['customer-street'] ?? null,
                'zip_code' => $data['customer-zip-code'] ?? null,
                'city' => $data['customer-city'] ?? null,
                'country' => $data['customer-country'] ?? null,
                'email' => $data['customer-email'] ?? null,
                'phone' => $data['customer-phone'] ?? null,
            ];
            
            // Güncelleme işlemi
            $shipment->update([
                'customer' => $shipment->customer,
            ]);
        } else {
            $shipment->customer = [
                'company_name' => $data['customer-company-name'] ?? null,
                'name' => $data['customer-name-surname'] ?? null,
                'street' => $data['customer-street'] ?? null,
                'zip_code' => $data['customer-zip-code'] ?? null,
                'city' => $data['customer-city'] ?? null,
                'country' => $data['customer-country'] ?? null,
                'email' => $data['customer-email'] ?? null,
                'phone' => $data['customer-phone'] ?? null,
            ];
            
            // Güncelleme işlemi
            $shipment->update([
                'customer' => $shipment->customer,
            ]);
        }
        
        if (isset($data['carrier_check']) && $data['carrier_check'] === 'carrier_yes') {
            if ($data['carrier_select'] === 'new_carrier') {
                $carrierInfo = [
                    'company_id' => auth()->user()->company_id,
                    'type' => 2,
                    'company_name' => $data['carrier-company-name'],
                    'name' => $data['carrier-name-surname'],
                    'address' => json_encode([
                        'street' => $data['carrier-street'],
                        'zip_code' => $data['carrier-zip-code'],
                        'city' => $data['carrier-city'],
                        'country' => $data['carrier-country'],
                    ]),
                    'email' => $data['carrier-email'],
                    'phone' => $data['carrier-phone'],
                ];
                Contact::create($carrierInfo);
                $shipment->carrier = [
                    'company_name' => $data['carrier-company-name'],
                    'name' => $data['carrier-name-surname'],
                    'street' => $data['carrier-street'],
                    'zip_code' => $data['carrier-zip-code'],
                    'city' => $data['carrier-city'],
                    'country' => $data['carrier-country'],
                    'email' => $data['carrier-email'],
                    'phone' => $data['carrier-phone'],
                ];
                $shipment->update([
                    'carrier' => $shipment->carrier,
                ]);
            } else {
                $shipment->carrier = [
                    'company_name' => $data['carrier-company-name'],
                    'name' => $data['carrier-name-surname'],
                    'street' => $data['carrier-street'],
                    'zip_code' => $data['carrier-zip-code'],
                    'city' => $data['carrier-city'],
                    'country' => $data['carrier-country'],
                    'email' => $data['carrier-email'],
                    'phone' => $data['carrier-phone'],
                ];
                $shipment->update([
                    'carrier' => $shipment->carrier,
                ]);
            }
        } else {
            $shipment->carrier = [
                'company_name' => $data['carrier-company-name'],
                'name' => $data['carrier-name-surname'],
                'street' => $data['carrier-street'],
                'zip_code' => $data['carrier-zip-code'],
                'city' => $data['carrier-city'],
                'country' => $data['carrier-country'],
                'email' => $data['carrier-email'],
                'phone' => $data['carrier-phone'],
            ];
            $shipment->update([
                'carrier' => $shipment->carrier,
            ]);
        }
        
        // Yükleme yerlerini işleyin
        $shipments = []; // Boş bir dizi oluştur
        $deliveries = [];
        for ($i = 1; isset($data['shipments_company_' . $i]); $i++) {
            if ($data['shipments_select-' . $i] === 'new_shipment') {
                $shipmentData = [
                    'company_name' => $data['shipments_company_' . $i],
                    'name' => $data['shipments_name_' . $i],
                    'phone' => $data['shipments_phone_' . $i],
                    'street' => $data['shipments_street_' . $i],
                    'zip_code' => $data['shipments_zip_' . $i],
                    'city' => $data['shipments_city_' . $i],
                    'country' => $data['shipments_country_' . $i],
                    'upload_date' => $data['shipments_upload_date_' . $i],
                    'time_start' => $data['shipments_time_start_' . $i],
                    'time_end' => $data['shipments_time_end_' . $i],
                    'ref_no' => $data['shipments_ref_no_' . $i],
                    'content' => $data['shipments_content_' . $i],
                ];
                $shipments[] = $shipmentData;
                $shipment->update([
                    'upload_info' => $shipments,
                ]);
                
                // Yalnızca yeni gönderi seçildiğinde gönderi bilgisi oluşturun
                ShipmentInfo::create([
                    'company_id' => auth()->user()->company_id,
                    'type' => 1,
                    'info' => json_encode([
                        'company_name' => $shipmentData['company_name'],
                        'name' => $shipmentData['name'],
                        'phone' => $shipmentData['phone'],
                        'street' => $shipmentData['street'],
                        'zip_code' => $shipmentData['zip_code'],
                        'city' => $shipmentData['city'],
                        'country' => $shipmentData['country'],
                    ]),
                ]);
            } else {
                foreach ($shipment->upload_info as $index => $location) {
                    $shipmentData = [
                        'company_name' => $data['shipments_company_' . $i],
                        'name' => $data['shipments_name_' . $i],
                        'phone' => $data['shipments_phone_' . $i],
                        'street' => $data['shipments_street_' . $i],
                        'zip_code' => $data['shipments_zip_' . $i],
                        'city' => $data['shipments_city_' . $i],
                        'country' => $data['shipments_country_' . $i],
                        'upload_date' => $data['shipments_upload_date_' . $i],
                        'time_start' => $data['shipments_time_start_' . $i],
                        'time_end' => $data['shipments_time_end_' . $i],
                        'ref_no' => $data['shipments_ref_no_' . $i],
                        'content' => $data['shipments_content_' . $i],
                    ];
                }
                $shipments[] = $shipmentData;
                $shipment->update([
                    'upload_info' => $shipments,
                ]);
            }
        }
        if (!empty($shipments)) {
            $shipment->upload_info = $shipments;
        }
        // Teslimat Yerlerini İşle
        
        for ($i = 1; isset($data['deliverys_company_' . $i]); $i++) {
            if ($data['deliverys_select-' . $i] === 'new_delivery') {
                $deliveryData = [
                    'company_name' => $data['deliverys_company_' . $i],
                    'name' => $data['deliverys_name_' . $i],
                    'phone' => $data['deliverys_phone_' . $i],
                    'street' => $data['deliverys_street_' . $i],
                    'zip_code' => $data['deliverys_zip_' . $i],
                    'city' => $data['deliverys_city_' . $i],
                    'country' => $data['deliverys_country_' . $i],
                    'upload_date' => $data['deliverys_upload_date_' . $i],
                    'time_start' => $data['deliverys_time_start_' . $i],
                    'time_end' => $data['deliverys_time_end_' . $i],
                    'ref_no' => $data['deliverys_ref_no_' . $i],
                    'content' => $data['deliverys_content_' . $i],
                ];
                $deliveries[] = $deliveryData;
                $shipment->update([
                    'delivery_info' => $deliveries,
                ]);
                
                ShipmentInfo::create([
                    'company_id' => auth()->user()->company_id,
                    'type' => 2,
                    'info' => json_encode([
                        'company_name' => $deliveryData['company_name'],
                        'name' => $deliveryData['name'],
                        'phone' => $deliveryData['phone'],
                        'street' => $deliveryData['street'],
                        'zip_code' => $deliveryData['zip_code'],
                        'city' => $deliveryData['city'],
                        'country' => $deliveryData['country'],
                    ]),
                ]);
            } else {
                $deliveryData = [
                    'company_name' => $data['deliverys_company_' . $i],
                    'name' => $data['deliverys_name_' . $i],
                    'phone' => $data['deliverys_phone_' . $i],
                    'street' => $data['deliverys_street_' . $i],
                    'zip_code' => $data['deliverys_zip_' . $i],
                    'city' => $data['deliverys_city_' . $i],
                    'country' => $data['deliverys_country_' . $i],
                    'upload_date' => $data['deliverys_upload_date_' . $i],
                    'time_start' => $data['deliverys_time_start_' . $i],
                    'time_end' => $data['deliverys_time_end_' . $i],
                    'ref_no' => $data['deliverys_ref_no_' . $i],
                    'content' => $data['deliverys_content_' . $i],
                ];
                $deliveries[] = $deliveryData;
                $shipment->update([
                    'delivery_info' => $deliveries,
                ]);
            }
        }
        
        if (!empty($deliveries)) {
            $shipment->delivery_info = $deliveries;
        }
        
        $carrierPrice = $request->input('carrier_price', 0);
        $price = $request->input('price');
        
        
        $netGain = $price - $carrierPrice;
        $shipment->update([
            'carrier_price' => $carrierPrice ?? 0,
            'price' => $price,
            'net_gain' => $netGain,
        ]);
        return redirect()->route('shipments')->with('success', 'Sendung erfolgreich aktualisiert.');
    }
    public function downloadPdf(Request $request, $id, $token)
    {
        $user = Auth::user();
        
        if($user){
            $shipment = Shipment::where('id', $id)->where('user_id', $user->id)->firstOrFail();
        }
        else{
            return route('home');
        }
        
        // PDF oluşturma işlemi
        $pdf = PDF::loadView('pdf.shipments-pdf', compact('shipment'));
        
        // PDF dosyasını indir
        return $pdf->download('shipment-details.pdf');
    }
    public function ShipmentsStatus(Request $request)
    {
        // Validasyon
        $request->validate([
            'shipment_id' => 'required|exists:shipments,id',
            'status' => 'required|in:1,2,3,4'
        ]);
    
        // Giriş yapmış kullanıcıyı al
        $user = Auth::user();
    
        // Shipment kaydını bulma ve kontrol etme
        $shipment = Shipment::where('id', $request->input('shipment_id'))->where('company_id', $user->company_id)->where('user_id', $user->id)->first();
    
        if ($shipment) {
            // Status güncelleme
            $shipment->status = $request->input('status');
            $shipment->save();
    
            // Başarılı bir geri dönüş mesajı
            if ($shipment->status == 2) {
                // Mail gönderme işlemi
                Mail::to($shipment->customer['email'])->send(new ShipmentMail($shipment));
            }
            return back()->with('success', 'Der Versandstatus wurde aktualisiert.');
        } else {
            // Hata mesajı
            return back()->with('error', 'Die Sendung wurde nicht gefunden oder Sie haben keine Zugriffsberechtigung.');
        }
    }
    // Benzersiz s_code oluşturma fonksiyonu
    private function generateUniqueShipmentCode()
    {
        do {
            $code = $this->generateRandomNumber(10); // 10 karakterlik rastgele bir sayı oluştur
        } while (Shipment::where('s_code', $code)->exists());
        
        return $code;
    }
    
    // Rastgele sayı oluşturma fonksiyonu
    private function generateRandomNumber($length)
    {
        $number = '';
        for ($i = 0; $i < $length; $i++) {
            $number .= mt_rand(0, 9);
        }
        
        return $number;
    }
}

