<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Shipment;
use App\Models\ShipmentInvoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function editProfile()
    {
        $user = Auth::user();
        return view('edit-profile', compact('user'));
    }
    public function upProfile(Request $request)
    {
        // Kullanıcının güncellenecek bilgilerini al
        $userData = [
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
        ];
        
        // Kullanıcıyı güncelle
        auth()->user()->update($userData);
        
        return redirect()->back()->with('success', 'Das Profil wurde erfolgreich aktualisiert.');
    }
    public function upAddressProfile(Request $request)
    {
        // Kullanıcının güncellenecek adres bilgilerini alın
        $addressData = [
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'street' => $request->input('street'),
            'zip_code' => $request->input('zip_code'),
        ];
        
        // Kullanıcının mevcut adres bilgilerini güncelleyin
        $user = auth()->user();
        $user->address = json_encode($addressData);
        $user->save();
        return redirect()->back()->with('success', 'Die Adresse wurde erfolgreich aktualisiert.');
    }
    public function upPasswordProfile(Request $request)
    {
        // Formdan gelen verileri doğrulayın
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed|different:current_password',
        ]);
        
        // Kullanıcının mevcut şifresini kontrol edin
        if (!Hash::check($request->input('current_password'), auth()->user()->password)) {
            return redirect()->back()->with('error', 'Ihr aktuelles Passwort ist nicht korrekt.');
        }
        
        // Kullanıcının şifresini güncelleyin
        $user = auth()->user();
        $user->password = Hash::make($request->input('new_password'));
        $user->save();
        
        return redirect()->back()->with('success', 'Das Passwort wurde erfolgreich aktualisiert.');
    }
    
    public function awaitingApproval()
    {
        return view('auth.awaiting-approval');
    }
    public function UserProfilePhotoUpdate(Request $request)
    {
        // Giriş yapan kullanıcının bilgilerini al
        $user = Auth::user();
        
        // Form verilerini doğrula
        $validatedData = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // fotoğraf dosyası için kural ekle
        ]);
        
        // Dosya yükleme işlemi
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            
            // Dosya adını düzenle
            $originalFileName = $file->getClientOriginalName();
            $fileName = time() . '-' . $this->cleanFileName($originalFileName);
            
            // Dosyayı public/assets/images/user-photos klasörüne kaydet
            $file->move(public_path('assets/images/user-photos'), $fileName);
            
            // Eski fotoğrafı sil (eğer varsa)
            if ($user->profile_image) {
                $oldPhotoPath = public_path($user->profile_image);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
            
            // Yeni fotoğraf yolunu kullanıcı veritabanına kaydet
            $user->profile_image = 'assets/images/user-photos/' . $fileName;
            $user->save();
            
            return redirect()->back()->with('success', 'Profilfoto erfolgreich aktualisiert');
        }
        
        return redirect()->back()->with('error', 'Datei nicht gefunden oder ungültiger Dateityp');
    }
    
    //************* Şirket Profil Alanı
    
    public function CompanyProfile()
    {
        // Giriş yapan kullanıcının company_id'sini al
        $user = Auth::user();
        $companyId = $user->company_id;
        
        // İlgili şirketi veritabanından al
        $company = Company::find($companyId);
        $address = json_decode($company->address, true);
        
        $employees = $company->users;
        foreach ($employees as $employee) {
            $employee->address = json_decode($employee->address, true);
        }
        
        $company = Company::find($companyId); // Şirketi bulmak için şirket ID'sini kullanın
        
        $customers = $company->contacts()->where('type', 1)->get();
        foreach ($customers as $customer) {
            $customer->address = json_decode($customer->address, true);
        }
        
        $carriers = $company->contacts()->where('type', 2)->get();
        foreach ($carriers as $carrier) {
            $carrier->address = json_decode($carrier->address, true);
        }
        $shipments = $company->shipments;
        
        $shipmentsCount = $company->shipments()->whereIn('status', [1, 2])->count();
        
        // Şirket bilgilerini Blade şablonuna gönder
        return view('companies.company-profile', compact('company','address','shipmentsCount','employees','customers','carriers','shipments'));
    }
    public function CompanyProfileEdit($id, $reference_token)
    {
        // Giriş yapan kullanıcının bilgilerini al
        $user = Auth::user();
        // İlgili şirketi veritabanından al
        $company = Company::where('id', $id)->where('reference_token', $reference_token)->first();
        
        // Şirket var mı kontrol et
        if (!$company) {
            return redirect('/')->with('error', 'Company not found');
        }
        $address = json_decode($company->address, true);
        return view('companies.company-profile-edit', compact('company','address'));
    }
    public function CompanyProfileUpdate(Request $request)
    {
        // Giriş yapan kullanıcının bilgilerini al
        $user = Auth::user();
        
        // Kullanıcının şirketini al
        $company = Company::find($user->company_id);
        
        if (!$company) {
            return redirect('/')->with('error', 'Firma nicht gefunden');
        }
        
        // Form verilerini doğrula
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'tax_number' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'fax' => 'nullable|string|max:255',
            'hrb' => 'nullable|string|max:255',
            'iban' => 'nullable|string|max:255',
            'bic' => 'nullable|string|max:255',
            'stnr' => 'nullable|string|max:255',
            'ust_id_nr' => 'nullable|string|max:255',
            'registry_court' => 'nullable|string|max:255',
            'general_manager' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif', // logo dosyası için kural ekle
        ]);
        
        // Logo dosyasını yükle ve kaydet
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            
            // Dosya adını düzenle
            $originalFileName = $file->getClientOriginalName();
            $fileName = time() . '-' . $this->cleanFileName($originalFileName);
            
            // Dosyayı public/assets/images/company-logos klasörüne kaydet
            $file->move(public_path('assets/images/company-logos'), $fileName);
            
            // Yeni logo dosyasını şirket veritabanına kaydet
            $company->logo = 'assets/images/company-logos/' . $fileName;
        }
        
        // Şirket bilgilerini güncelle (logo ile veya olmadan)
        $company->name = $validatedData['name'];
        $company->tax_number = $validatedData['tax_number'];
        $company->phone = $validatedData['phone'];
        $company->email = $validatedData['email'];
        $company->fax = $validatedData['fax'];
        $company->hrb = $validatedData['hrb'];
        $company->iban = $validatedData['iban'];
        $company->bic = $validatedData['bic'];
        $company->stnr = $validatedData['stnr'];
        $company->ust_id_nr = $validatedData['ust_id_nr'];
        $company->registry_court = $validatedData['registry_court'];
        $company->general_manager = $validatedData['general_manager'];
        $company->save();
        
        return redirect()->back()->with('success', 'Firmenprofil erfolgreich aktualisiert');
    }
    
    public function CompanyProfileAddressUpdate(Request $request)
    {
        // Giriş yapan kullanıcının bilgilerini al
        $user = Auth::user();
        
        // Kullanıcının şirketini al
        $company = Company::find($user->company_id);
        
        if (!$company) {
            return redirect('/')->with('error', 'Firma nicht gefunden');
        }
        
        // Form verilerini doğrula
        $validatedData = $request->validate([
            'street' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
        ]);
        
        // Adres bilgilerini güncelle
        $address = json_decode($company->address, true);
        $address['street'] = $validatedData['street'] ?? null;
        $address['zip_code'] = $validatedData['zip_code'] ?? null;
        $address['city'] = $validatedData['city'] ?? null;
        $address['country'] = $validatedData['country'] ?? null;
        
        $company->address = json_encode($address);
        
        $company->save();
        
        return redirect()->back()->with('success', 'Firmenadresse erfolgreich aktualisiert');
    }
    public function CompanyProfilePhotoUpdate(Request $request)
    {
        // Giriş yapan kullanıcının bilgilerini al
        $user = Auth::user();
        
        // Kullanıcının şirketini al
        $company = Company::find($user->company_id);
        
        if (!$company) {
            return redirect('/')->with('error', 'Firma nicht gefunden');
        }
        
        // Dosya yükleme işlemi
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            
            // Dosya adını düzenle
            $originalFileName = $file->getClientOriginalName();
            $fileName = time() . '-' . $this->cleanFileName($originalFileName);
            
            // Dosyayı public/assets/images klasörüne kaydet
            $file->move(public_path('assets/images/company-logos'), $fileName);
            
            // Yeni profil fotoğrafını şirket veritabanına kaydet
            $company->profile_image = 'assets/images/company-logos/' . $fileName;
            $company->save();
            
            return redirect()->back()->with('success', 'Profilfoto erfolgreich aktualisiert');
        }
        
        return redirect()->back()->with('error', 'Datei nicht gefunden oder ungültiger Dateityp');
    }
    public function downloadShipmentPdf(Request $request, $id, $token)
    {
        $shipment = Shipment::where('id', $id)->where('download_token', $token)->firstOrFail();
        
        // PDF oluşturma işlemi
        $pdf = PDF::loadView('pdf.shipments-pdf', compact('shipment'));
        
        // PDF dosyasını indir
        return $pdf->download('shipment-details.pdf');
    }
    
    public function downloadInvoicePDF($token)
    {
        // Tokena göre faturayı bulun
        $invoice = ShipmentInvoice::where('download_token', $token)->firstOrFail();
        
        // PDF görünümünü yükleyin
        $pdf = PDF::loadView('pdf.invoice-pdf', ['invoice' => $invoice]);
        
        // PDF dosyasını indirin
        return $pdf->download('invoice_' . $invoice->i_no . '.pdf');
    }
    // Dosya adını düzenleyen yardımcı fonksiyon
    private function cleanFileName($fileName) {
        // Türkçe karakterleri değiştir
        $fileName = str_replace(['ç', 'ğ', 'ı', 'ö', 'ş', 'ü', 'Ç', 'Ğ', 'İ', 'Ö', 'Ş', 'Ü'], ['c', 'g', 'i', 'o', 's', 'u', 'c', 'g', 'i', 'o', 's', 'u'], $fileName);
        
        // Özel karakterleri ve boşlukları alt çizgi ile değiştir
        $fileName = preg_replace('/[^A-Za-z0-9_\-.]/', '-', $fileName);
        
        // Dosya adındaki büyük harfleri küçük harfe çevir
        $fileName = strtolower($fileName);
        
        return $fileName;
    }
    public function getShippingData($interval)
    {
        $dateFormat = '';
    
        // Gruplama aralığına göre tarih formatını belirle
        switch ($interval) {
            case 'yearly':
                $dateFormat = 'Y'; // Yıllık gruplama için yıl bazında
                break;
            case 'monthly':
                $dateFormat = 'Y-m'; // Aylık gruplama için ay bazında
                break;
            case 'weekly':
                $dateFormat = 'Y-m-d'; // Haftalık gruplama için gün bazında
                break;
            default:
                $dateFormat = 'Y-m-d'; // Varsayılan olarak gün bazında
                break;
        }
    
        // Haftalık analiz için Pazartesi'den başlayarak haftanın günlerini oluştur
        if ($interval === 'weekly') {
            $startOfWeek = Carbon::now()->startOfWeek(); // Haftanın başlangıcı Pazartesi
            $endOfWeek = Carbon::now()->endOfWeek(); // Haftanın bitişi Pazar
    
            // Veritabanından ilgili verileri çek ve haftalık aralıkta filtrele
            $shipments = Shipment::whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->select('created_at', 'status', 'invoice_id')
                ->orderBy('created_at', 'asc')
                ->get();
    
            $weekDays = [];
            for ($date = $startOfWeek; $date->lte($endOfWeek); $date->addDay()) {
                $weekDays[$date->format('Y-m-d')] = [
                    'created_at' => $date->format('Y-m-d'),
                    'shipmentCount' => 0,
                    'approvedCount' => 0,
                    'invoiceCount' => 0,
                ];
            }
    
            // Tarih ve veri işlemleri
            $shippingData = $weekDays;
            $shipments->each(function ($shipment) use (&$shippingData) {
                $date = $shipment->created_at->format('Y-m-d');
    
                $shippingData[$date]['shipmentCount']++;
    
                if ($shipment->status == 1) {
                    $shippingData[$date]['approvedCount']++;
                }
    
                if ($shipment->invoice_id) {
                    $shippingData[$date]['invoiceCount']++;
                }
            });
        } else {
            // Diğer aralıklar için veri işlemleri
            $shippingData = [];
            $shipments = Shipment::select('created_at', 'status', 'invoice_id')
                ->orderBy('created_at', 'asc')
                ->get();
    
            $shipments->each(function ($shipment) use (&$shippingData, $dateFormat) {
                $date = $shipment->created_at->format($dateFormat);
    
                if (!isset($shippingData[$date])) {
                    $shippingData[$date] = [
                        'created_at' => $date,
                        'shipmentCount' => 0,
                        'approvedCount' => 0,
                        'invoiceCount' => 0,
                    ];
                }
    
                $shippingData[$date]['shipmentCount']++;
    
                if ($shipment->status == 1) {
                    $shippingData[$date]['approvedCount']++;
                }
    
                if ($shipment->invoice_id) {
                    $shippingData[$date]['invoiceCount']++;
                }
            });
        }
    
        // İndeksli diziyi sırala ve json olarak döndür
        $shippingData = array_values($shippingData);
    
        return response()->json($shippingData);
    }

    public function TimoCom()
    {
        return view('company.timocom.timocom');
    }
    public function Payments()
    {
        return view('company.payments.payments');
    }
}
