<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'vendor_id',
        'location',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function moves()
    {
        return $this->hasMany(Move::class);
    }

    public function getQuantityAttribute()
    {
        $moves = $this->moves;
        $quantity = 0;
        foreach ($moves as $move) {
            if ($move->is_in) {
                $quantity += $move->quantity;
            } else {
                $quantity -= $move->quantity;
            }
        }
        return $quantity;
    }
}
