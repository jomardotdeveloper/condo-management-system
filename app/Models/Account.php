<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_in',
    ];

    public function getTotalAttribute()
    {
        $total = 0;
        foreach ($this->entries as $entry) {
            $total += $entry->amount;
        }
        return $total;
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }


}
