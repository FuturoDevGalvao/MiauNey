<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyReservesTransaction extends Model
{
    /** @use HasFactory<\Database\Factories\MoneyReservesTransactionFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'value',
        'operation',
        'money_reserve_id'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function moneyReserve()
    {
        return $this->belongsTo(MoneyReserve::class);
    }
}
