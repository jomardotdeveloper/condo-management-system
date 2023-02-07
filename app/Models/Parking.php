<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_id',
        'vehicle',
        'remarks',
        'area_sqm',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    
}
