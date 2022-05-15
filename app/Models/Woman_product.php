<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Woman_product extends Model
{
    use HasFactory;
    protected $fillable = ['product_name','decription','mrp_price','saleing_price','category_id','subcategory_id','brand_id'];
}
