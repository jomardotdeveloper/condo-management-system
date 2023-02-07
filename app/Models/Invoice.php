<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_deadline',
        'customer_id',
        'is_unit_owner',
        'user_id',
    ];


    public function getCustomerAttribute()
    {
        if($this->is_unit_owner) {
            return Owner::find($this->customer_id);
        } else {
            return Tenant::find($this->customer_id);
        }
    }

    public function lines()
    {
        return $this->hasMany(InvoiceLine::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAmountAttribute()
    {
        $amount = 0;
        foreach($this->lines as $line) {
            $amount += $line->amount;
        }
        return $amount;
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    

    public function getInvoiceNumberAttribute()
    {
        $id = strval($this->id);
        return "INV" . str_pad($id, 4, "0", STR_PAD_LEFT);
    }

}
