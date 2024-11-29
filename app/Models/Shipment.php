<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'author',
        'company_id',
        'user_id',
        'author_company',
        'customer',
        'carrier',
        'status',
        'price',
        'vat',
        'carrier_price',
        'net_gain',
        'invoice_id',
        'download_token',
    ];
    
    protected $casts = [
        'customer' => 'array',
        'author_company' => 'array',
        'carrier' => 'array',
        'upload_info' => 'array',
        'delivery_info' => 'array',
    ];
    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function invoice()
    {
        return $this->belongsTo(ShipmentInvoice::class, 'invoice_id');
    }
}