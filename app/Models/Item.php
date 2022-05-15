<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'parent_id'];

    public function subcategory()
    {
        return $this->hasMany(\App\Models\Item::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(\App\Models\Item::class, 'parent_id');
    }
}
