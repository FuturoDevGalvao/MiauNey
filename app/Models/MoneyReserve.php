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
        'goal',
        'image_path',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function moneyReservesTransactions()
    {
        return $this->hasMany(MoneyReservesTransaction::class);
    }
}
