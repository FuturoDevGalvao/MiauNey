<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyReserve extends Model
{
    /** @use HasFactory<\Database\Factories\MoneyReserveFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'balance',
        'image_path',
        'user_id'
    ];
}
