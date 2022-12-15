<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductColor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'product_id',
      ];
      
      
      protected function product(){
        return $this->hasOne(Product::class , 'id' , 'product_id');
      }
}
