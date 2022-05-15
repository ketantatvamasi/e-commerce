<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping_address extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name', 'last_name', 'address', 'address2','city','country_id','postal_code','user_id'
    ];
}
