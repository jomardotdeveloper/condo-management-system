<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit_towers',
        'reading_day',
        'due_date'
    ];

    public function getUnitTowersArrAttribute()
    {
        if($this->unit_towers == null)
            return [];
        return explode(',', $this->unit_towers);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
