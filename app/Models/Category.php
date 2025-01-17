<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = ['name', 'color'];

    public function moneyReserveTransactions()
    {
        return $this->belongsToMany(MoneyReservesTransaction::class);
    }
}
