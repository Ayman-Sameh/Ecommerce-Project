<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'product_qty',
        'product_color',
    ];

    protected function product()
    {
        return $this->belongsTo(Product::class, 'product_id' , 'id');
    }

    protected function colorproduct()
    {
        return $this->belongsTo(ProductColor::class, 'product_color' , 'id');
    }
}
