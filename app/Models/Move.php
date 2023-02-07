<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Move extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'is_in',
        'quantity',
        'stock_id',
        'remarks',
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
