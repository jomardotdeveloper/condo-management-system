<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'bank_id',
        'account_id',
        'amount',
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
