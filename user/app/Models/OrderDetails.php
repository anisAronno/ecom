<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable=['order_id', 'product_name', 'product_amount', 'unit_price', 'total_price'];
    use HasFactory;
}
