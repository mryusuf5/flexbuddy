<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Productcategories extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Products::class, 'category_id');
    }
}
