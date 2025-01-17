<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /** @use HasFactory<\Database\Factories\InvoiceFactory> */
    use HasFactory;

    protected $fillable = [
        'value',
        'limit',
        'due_date',
        'paid',
        'credit_card_id'
    ];


    public function creditCard()
    {
        return $this->belongsTo(CreditCard::class);
    }
}
