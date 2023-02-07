<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'amount',
        'payment_method',
        'payment_reference',
        'payment_status',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function getPaymentNumberAttribute()
    {
        $id = strval($this->id);
        return "PAY" . str_pad($id, 4, "0", STR_PAD_LEFT);
    }
}
