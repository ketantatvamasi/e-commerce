<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'image'];
    public function item()
    {
        return $this->belongsTo('App\Product');
    }
}
