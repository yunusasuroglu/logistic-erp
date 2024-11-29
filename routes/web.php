<?php

use App\Http\Controllers\Admin\company\CompanyController;
use App\Http\Controllers\Company\contacts\ContactsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Language\LanguageController;
use App\Http\Controllers\Admin\Language\TranslationController;
use App\Http\Controllers\Company\Persons\PersonsController;
use App\Http\Controllers\Admin\Roller\RoleController;
use App\Http\Controllers\Company\shipments\ShipmentsController;
use App\Http\Controllers\Employee\shipments\MyShipmentsController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Company\invoices\InvoiceController;
use App\Http\Controllers\Employee\invoices\MyInvoiceController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//  tek sayfa olucak role göre şekillenicek üye ise üyenin yapabiliceği işlemler


Route::get('/dil/{lang}/', [LanguageController::class, 'switchLang'])->name('change.language');
Route::get('/shipment/{id}/pdf/{token}', [PageController::class, 'downloadShipmentPdf'])->name('shipment.pdf');
Route::get('/invoice/download/{token}', [PageController::class, 'downloadInvoicePDF'])->name('invoice.download');

Route::middleware(['auth'])->group(function () {
    Route::get('kayit-ol/onay-bekleniyor', [PageController::class, 'awaitingApproval'])->name('awaiting.approval');
    // Kullanıcı yetkilendirme kontrolleri için route grubu
    Route::group(['middleware' => ['role_or_permission:Süper Admin']], function () {
        Route::get('/superadmin/dashboard', [HomeController::class, 'SuperAdminDashboard'])->name('home.superadmin');
        Route::get('/roller', [UserController::class, 'roles'])->name('roles');
        Route::get('/rol/ekle', [RoleController::class, 'create'])->name('role.create');
        Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
        Route::get('/rol/{id}/duzenle', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/rol/{id}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('/rol/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
        
        Route::get('/languages', [LanguageController::class, 'languages'])->name('languages');
        Route::get('/languages/language-add', [LanguageController::class, 'LanguageNew'])->name('languages.new');
        Route::post('/languages/new-language', [LanguageController::class, 'LanguageStore'])->name('languages.store');
        Route::get('/languages/language-update/{language}', [LanguageController::class, 'LanguageEdit'])->name('languages.edit');
        Route::put('/languages/language-upp/{language}', [LanguageController::class, 'LanguageUpdate'])->name('languages.update');
        Route::delete('/languages/{language}', [LanguageController::class, 'LanguageDestroy'])->name('languages.destroy');
        Route::get('/languages/{code}/keys', [TranslationController::class, 'index'])->name('languages.translations');
        Route::post('/languages/{code}/key', [TranslationController::class, 'update'])->name('languages.translations.update');

        Route::get('/kullanicilar', [UserController::class, 'users'])->name('users');
        Route::get('/yeni-kullanici', [UserController::class, 'create'])->name('user.create');
        Route::post('/kullanici-ekle', [UserController::class, 'store'])->name('user.store');
        Route::get('/kullanici/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/kullanici/{id}', [UserController::class, 'update'])->name('user.update');
        Route::post('/sifre-guncelle/{id}', [UserController::class, 'changePassword'])->name('user.change-password');
        Route::delete('/kullanici/{id}/sil', [UserController::class, 'destroy'])->name('user.destroy');
        Route::post('/kullanici/onayla/{id}', [UserController::class, 'approveUser'])->name('user.approve');

        Route::get('/sirketler', [CompanyController::class, 'companies'])->name('companies');
        Route::get('/sirket/yeni-sirket', [CompanyController::class, 'NewCompany'])->name('companies.new');
        Route::post('/sirket/sirket-olustur', [CompanyController::class, 'AddCompany'])->name('companies.add');
        Route::get('/sirket/{id}/duzenle', [CompanyController::class, 'EditCompany'])->name('companies.edit');
        Route::put('/sirket/{id}/duzenle', [CompanyController::class, 'UpdateCompany'])->name('companies.update');
        Route::delete('/sirket/{id}/sil', [CompanyController::class, 'destroy'])->name('companies.destroy');
        Route::post('/sirket/onayla/{id}', [CompanyController::class, 'approveCompany'])->name('company.approve');
    });
    
    Route::group(['middleware' => ['ensureUserHasCompletedProfile']], function () {
        Route::get('/', [HomeController::class, 'home'])->name('home');
        Route::get('/profil/duzenle', [PageController::class, 'editProfile'])->name('profile.edit');
        Route::put('/profil/duzenle', [PageController::class, 'upProfile'])->name('profile.update');
        Route::put('/profil/adres/duzenle', [PageController::class, 'upAddressProfile'])->name('profile.address.update');
        Route::put('/profil/resim/duzenle', [PageController::class, 'UserProfilePhotoUpdate'])->name('profile.image.update');
        Route::post('/profil/sifre/duzenle', [PageController::class, 'upPasswordProfile'])->name('profile.password.update');

        Route::get('/sirket/profili', [PageController::class, 'CompanyProfile'])->name('company.profile');

        Route::group(['middleware' => ['role_or_permission:Firmenleiter']], function () {
            Route::get('/company-admin/dashboard', [HomeController::class, 'CompanyAdminDashboard'])->name('home.company');
            Route::get('/api/shippingData/{interval}', [PageController::class, 'getShippingData'])->name('shipping-data');

            Route::get('/sevkiyatlar/', [ShipmentsController::class, 'ShipmentsView'])->name('shipments');
            Route::get('/sevkiyatlar/sevkiyat-olustur/', [ShipmentsController::class, 'ShipmentsAdd'])->name('shipments.add');
            Route::post('/sevkiyatlar/sevkiyat-ekle/', [ShipmentsController::class, 'ShipmentsStore'])->name('shipments.store');
            Route::get('/shipments/status', [ShipmentsController::class, 'ShipmentsStatus'])->name('shipments.status');
            Route::get('/shipments/duzenle/{id}', [ShipmentsController::class, 'ShipmentsEdit'])->name('shipments.edit');
            Route::put('/shipments/guncelle/{id}', [ShipmentsController::class, 'ShipmentsUpdate'])->name('shipments.update');
            Route::get('/shipment/pdf/{id}/', [ShipmentsController::class, 'downloadPdf'])->name('shipment.company.pdf');

            Route::get('/faturalar', [InvoiceController::class, 'InvoiceView'])->name('company.invoices');
            Route::post('/fatura/olustur', [InvoiceController::class, 'InvoiceAdd'])->name('company.invoice.add');
            Route::get('/company/invoice/{invoice}', [InvoiceController::class, 'downloadCompanyInvoice'])->name('company.invoice.download');

            Route::get('/sirket/profili-duzenle/{id}/{reference_token}', [PageController::class, 'CompanyProfileEdit'])->name('company.profile.edit');
            Route::put('/sirket/profili-guncelle', [PageController::class, 'CompanyProfileUpdate'])->name('company.profile.update');
            Route::put('/sirket/profili/adres-guncelle', [PageController::class, 'CompanyProfileAddressUpdate'])->name('company.profile.address.update');
            Route::put('/sirket/profili/profil-resmi/guncelle', [PageController::class, 'CompanyProfilePhotoUpdate'])->name('company.profile.photo.update');

            Route::get('/calisanlar/', [PersonsController::class, 'Persons'])->name('persons');
            Route::get('/calisanlar/yeni-calisan', [PersonsController::class, 'NewPerson'])->name('persons.new');
            Route::post('/calisanlar/yeni-calisan-ekle', [PersonsController::class, 'AddPerson'])->name('persons.add');
            Route::get('/calisan/{id}/duzenle', [PersonsController::class, 'EditPerson'])->name('persons.edit');
            Route::put('/calisan/{id}', [PersonsController::class, 'UpdatePerson'])->name('persons.update');
            Route::post('/calisan/sifre-guncelle/{id}', [PersonsController::class, 'PersonEditPassword'])->name('persons.edit-password');
            Route::post('/calisan/onayla/{id}', [PersonsController::class, 'approveUser'])->name('employee.approve');
            Route::delete('/calisan/{id}', [PersonsController::class, 'PersonDestroy'])->name('persons.destroy');

            Route::get('/timocom/', [PageController::class, 'TimoCom'])->name('timocom');

            Route::get('/payments/', [PageController::class, 'Payments'])->name('payments');

        });

        Route::group(['middleware' => ['role_or_permission:Mitarbeiter']], function () {
            Route::get('/calisan-admin/dashboard', [HomeController::class, 'EmployeeAdminDashboard'])->name('home.employee');
            Route::get('/sevkiyatlarim/', [MyShipmentsController::class, 'MyShipmentsView'])->name('my.shipments');
            Route::get('/sevkiyatlarim/sevkiyat-olustur/', [MyShipmentsController::class, 'ShipmentsAdd'])->name('my.shipments.add');
            Route::post('/sevkiyatlarim/sevkiyat-ekle/', [MyShipmentsController::class, 'ShipmentsStore'])->name('my.shipments.store');
            Route::get('/myshipments/status', [MyShipmentsController::class, 'ShipmentsStatus'])->name('my.shipments.status');
            Route::get('/myshipments/duzenle/{id}', [MyShipmentsController::class, 'ShipmentsEdit'])->name('my.shipments.edit');
            Route::put('/myshipments/guncelle/{id}', [MyShipmentsController::class, 'ShipmentsUpdate'])->name('my.shipments.update');
            Route::get('/myshipment/pdf/{id}/', [MyShipmentsController::class, 'downloadPdf'])->name('shipment.employee.pdf');
 
            Route::post('/fatura/ekle', [MyInvoiceController::class, 'InvoicePersonAdd'])->name('invoice.person.add');
            Route::get('/person/invoice/{invoice}', [InvoiceController::class, 'downloadPersonInvoice'])->name('person.invoice.download');
        });

        Route::group(['middleware' => ['role_or_permission:Mitarbeiter|Firmenleiter']], function () {
            Route::get('/kisiler/musteriler/', [ContactsController::class, 'ContactCustomerView'])->name('contacts.customer');
            Route::get('/kisiler/nakliyeciler/', [ContactsController::class, 'ContactCarrierView'])->name('contacts.carrier');
            Route::get('/kisiler/kisi-olustur/', [ContactsController::class, 'ContactAdd'])->name('contacts.contact.add');
            Route::post('/kisiler/kisi-ekle/', [ContactsController::class, 'ContactStore'])->name('contacts.contact.store');
            Route::get('/contacts/{id}/edit', [ContactsController::class, 'contactEdit'])->name('contacts.edit');
            Route::put('/contacts/{id}', [ContactsController::class, 'contactUpdate'])->name('contacts.update');
            Route::delete('/contacts/{id}', [ContactsController::class, 'contactDestroy'])->name('contacts.destroy');
        });
    });
});

Auth::routes();
