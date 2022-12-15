<?php

namespace App\Models;

use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'offer',
        'ordered_at',
        'name',
        'email',
        'phone',
        'address',
        'notes',
    ];

    public function user(){
        return $this->hasOne(User::class , 'id' , 'user_id');
    }

    public function orderproduct(){
        return $this->belongsToMany(OrderProduct::class , 'share_products');
    }
}
