<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentInfo extends Model
{
    use HasFactory;
    protected $fillable = ['company_id','type', 'info'];
    protected $casts = [
        'info' => 'array',
    ];
    // ShipmentInfo modelinin Company modeline olan ilişkisini tanımlıyoruz
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
