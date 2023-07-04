<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    public function orderProducts()
    {
        return $this->hasMany(order_products::class, "order_id");
    }
}
