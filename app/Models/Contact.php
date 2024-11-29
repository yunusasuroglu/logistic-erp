<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company_id',
        'company_name',
        'email',
        'phone',
        'type',
        'address',
        'reverse_charge'
    ];
    public function getInitialsAttribute()
    {
        $names = explode(' ', $this->name);
        $initials = '';
        foreach ($names as $name) {
            $initials .= mb_strtoupper(mb_substr($name, 0, 1));
        }
        return $initials;
    }
}
