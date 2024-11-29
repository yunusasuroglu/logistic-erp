<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function SuperAdminDashboard()
    {
        return view('superadmin.super-admin-home');
    }
    public function CompanyAdminDashboard()
    {
        // Giriş yapmış kullanıcıyı al
        $user = auth()->user();
        
        // Kullanıcının şirketini al
        $company = $user->company;
        
        // Şirkete bağlı kullanıcı sayısını al
        $userCount = $company->users()->count();
        
        // Şirkete bağlı kişi (contacts) sayısını al
        $contactCount = $company->contacts()->count();
        
        // Şirkete bağlı fatura (ShipmentInvoices) sayısını al
        $invoiceCount = $company->shipmentInvoices()->count();
        
        $shipmentCount = $company->shipments()->count();
        
        $totalInvoiceAmount = $company->shipmentInvoices()->sum('price');
        
        // Bugünün tarihini al
        $today = Carbon::today();
        
        // Onaylanmamış sevkiyatları al (status != 1), tarihe bakmaksızın
        $unapprovedShipments = $company->shipments()->where('status', '!=', 1)->orderBy('created_at', 'asc')->get();
        
        // Bugünün onaylanmış siparişlerini al (status == 1)
        $todayApprovedShipments = $company->shipments()->where('status', '!=', 1)->whereDate('created_at', $today)->orderBy('created_at', 'asc')->get();
        
        // Onaylanmamış sevkiyatları ve bugünün onaylanmış siparişlerini birleştir
        $todayShipments = $unapprovedShipments->merge($todayApprovedShipments);
        
        
        // Faturası oluşturulmamış sevkiyatları al (invoice_id is null), tarihe göre sıralı
        $unbilledShipments = $company->shipments()->where('status',1)->whereNull('invoice_id')->orderBy('created_at', 'asc')->get();
        // Verileri view'a gönder
        
        $employees = User::where('company_id', $company->id)
        ->where('id', '!=', $user->id) // Giriş yapan kullanıcıyı hariç tut
        ->get();
        
        // Her bir çalışan için sevkiyatlar ve kazançlarını topla
        $employeesData = [];
        foreach ($employees as $employee) {
            $shipments = Shipment::where('company_id', $user->company_id)
            ->where('user_id', $employee->id)
            ->where('status', 1) // Sadece onaylanmış sevkiyatları al
            ->get();
            
            $totalRevenue = 0;
            
            foreach ($shipments as $shipment) {
                // Sevkiyatın faturalarını al (varsayılan olarak fatura ilişkisi burada olmalı)
                $invoices = $shipment->invoice;
                if ($invoices) {
                    $totalRevenue += $invoices->price;
                } else {
                    // $invoices boş veya null ise, alternatif bir işlem yapılabilir
                    // Örneğin: $totalRevenue = 0; gibi bir başlangıç değeri ataması yapılabilir.
                    $totalRevenue = 0;
                }
            }
            
            // Çalışanın verilerini diziye ekle
            $employeesData[] = [
                'employee' => $employee,
                'totalRevenue' => $totalRevenue,
            ];
        }
        return view('company-admin-home', compact('userCount','employeesData', 'contactCount','invoiceCount','shipmentCount','totalInvoiceAmount','todayShipments','unbilledShipments'));
    }
    public function EmployeeAdminDashboard()
    {
        return view('employee-admin-home');
    }
    public function home()
    {
        $user = Auth::user();
        
        if ($user->hasRole('Süper Admin')) {
            return redirect()->route('home.superadmin');
        } elseif ($user->hasRole('Firmenleiter')) {
            return redirect()->route('home.company');
        } elseif ($user->hasRole('Mitarbeiter')) {
            return redirect()->route('home.employee');
        } else {
            return redirect()->route('home.default');
        }
    }
    
}
