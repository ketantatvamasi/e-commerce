<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Woman_product_image extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','image'];
}
