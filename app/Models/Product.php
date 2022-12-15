<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Category;
use App\Models\OrderProduct;
use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'price',
        'description',
        'offer',
        'image',
    ];

    public function category(){
        return $this->hasOne(Category::class , 'id' , 'category_id');
    }

    public function image(){
        return $this->hasMany(Image::class);
    }

    public function productColor(){
        return $this->hasMany(ProductColor::class);
    }

    public function orderproduct(){
        return $this->belongsToMany(OrderProduct::class , 'product_orders');
    }
}
