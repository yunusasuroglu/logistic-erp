<?php

namespace App\Http\Controllers\Company\contacts;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
    public function ContactCustomerView()
    {
        $user = Auth::user();
        $companyId = $user->company_id;
        $company = Company::find($companyId);
        if ($user) {
            $contacts = $company->contacts()->where('type', 1)->get();
                return view('company.contacts.customer', compact('contacts'));
        }

        return redirect()->route('login');
    }

    public function ContactCarrierView()
    {
        $user = Auth::user();
        $companyId = $user->company_id;
        $company = Company::find($companyId);
        if ($user) {
            // Modelde oluşturduğumuz contacts ile sadece kullanıcıya ait müşterileri alıyoruz
            $contacts = $company->contacts()->where('type', 2)->get();
    
            // Kişileri görüntülemek sayfa yolu ve sayfayada kullancağımız bir değişken gönderiyoruz
            return view('company.contacts.carrier', compact('contacts'));
        }

        return redirect()->route('login');
    }

    public function ContactAdd()
    {
        return view('company.contacts.new-contact');
    }

    public function contactStore(Request $request)
    {
        // Formdan gelen verileri doğrulayın
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_type' => 'required|in:1,2',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
        ]);

        $address = [
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'street' => $request->input('street'),
            'zip_code' => $request->input('zip_code'),
        ];
        // Yeni bir iletişim kaydı oluşturun
        $reverse_charge_value = $request->has('reverse_charge') ? 2 : 1;
        $contact = new Contact([
            'company_id' => auth()->user()->company_id,
            'name' => $request->name,
            'user_id' => $request->user_id,
            'phone' => $request->phone,
            'company_name' => $request->company_name,
            'email' => $request->email,
            'type' => $request->contact_type,
            'reverse_charge' => $reverse_charge_value,
            'address' => json_encode($address, JSON_UNESCAPED_UNICODE),
        ]);
        
        // İletişim kaydını veritabanına kaydedin
        $contact->save();
    
        // Başarılı bir işlem mesajı gönderin
        return redirect()->back()->with('success', 'Der Kontakt wurde erfolgreich registriert.');
    }

    public function contactEdit($id)
    {
        $contact = Contact::findOrFail($id);
        $address = json_decode($contact->address, true);
        return view('company.contacts.edit-contact', compact('contact','address'));
    }
    public function contactUpdate(Request $request, $id)
    {
        // Formdan gelen verileri doğrulayın
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_type' => 'required|in:0,1',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
        ]);

        $contact = Contact::findOrFail($id);

        $address = [
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'street' => $request->input('street'),
            'zip_code' => $request->input('zip_code'),
        ];
        $reverse_charge_value = $request->has('reverse_charge') ? 2 : 1;
        // İletişim kaydını güncelleyin
        $contact->update([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'phone' => $request->phone,
            'company_name' => $request->company_name,
            'email' => $request->email,
            'contact_type' => $request->contact_type,
            'reverse_charge' => $reverse_charge_value,
            'address' => json_encode($address, JSON_UNESCAPED_UNICODE),
        ]);

        // Başarılı bir işlem mesajı gönderin
        return redirect()->back()->with('success', 'Kontakt aktualisiert');
    }

    public function contactDestroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        // Başarılı bir işlem mesajı gönderin
        return redirect()->back()->with('success', 'Kontakt erfolgreich gelöscht');
    }
}
