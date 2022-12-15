<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'color_id',
        'price',
        'qty'
    ];

    public function order(){
        return $this->belongsToMany(Order::class , 'share_products');
    }

    public function product(){
        return $this->belongsToMany(Product::class , 'product_orders');
    }
}
