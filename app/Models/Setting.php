<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'email',
        'logo',
        'phone',
        'whatsapp',
        'instagram',
        'facebook',
        'twitter',
        'youtube',
    ];
}
