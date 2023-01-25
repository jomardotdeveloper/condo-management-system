<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'position_id',
        'department_id',
        'user_id',
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute()
    {
        if ($this->middle_name == null)
            return $this->first_name . ' ' . $this->last_name;
        else
            return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    }

    
}
