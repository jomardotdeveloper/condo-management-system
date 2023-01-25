<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_src',
        'title', 
        'move_in_date',
        'move_out_date',
        'first_name',
        'last_name',
        'middle_name',
        'suffix_name',
        'gender', 
        'birthdate',
        'nationality',
        'contact_no',
        'email',
        'occupation',
        'utility_bond',
        'date_of_ar',
        'electric_reading',
        'water_reading',
        'or_number',
        'remarks',
        'unit_id',
        'residency_status',
        'is_occupant',
        'address',
        'proof_of_identity_src',
        'proof_of_ownership_src',
        'signature_src',
        'spa_name',
        'spa_contact_no',
        'household_name',
        'household_contact_no',
        'broker_name',
        'broker_contact_no',
        'pow_condo',
        'pow_deeds',
        'spa_unit_owner',
        'spa_spa',
        'spa_all',
        'other_health',
        'other_utility',
        'other_cleared',
        'other_paid',
        'other_clearance',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function getFullNameAttribute()
    {

        if($this->suffix_name && $this->middle_name)
        {
            return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name . ' ' . $this->suffix_name;
        }else if($this->suffix_name)
        {
            return $this->first_name . ' ' . $this->last_name . ' ' . $this->suffix_name;
        }else if($this->middle_name)
        {
            return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
        }
        return $this->first_name . ' ' . $this->last_name;
    }

}
