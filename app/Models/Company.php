<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'profile_image',
        'logo',
        'tax_number',
        'tax_office',
        'email',
        'phone',
        'fax',
        'hrb',
        'iban',
        'bic',
        'stnr',
        'ust_id_nr',
        'registry_court',
        'general_manager',
        'reference_token',
        'status',
        'address',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
    public function shipmentInfo()
    {
        return $this->hasMany(ShipmentInfo::class);
    }
    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }
    public function shipmentInvoices()
    {
        return $this->hasMany(ShipmentInvoice::class);
    }
}
