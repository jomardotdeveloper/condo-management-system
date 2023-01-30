<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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

    public function getSubmittedRequirementsAttribute()
    {
        $requirements = [];

        if($this->pow_condo){
            array_push($requirements, "Condominium Certificate of Title");
        }

        if($this->pow_deeds){
            array_push($requirements, "Deed/s of Absolute Sale");
        }

        if($this->spa_unit_owner){
            array_push($requirements, "SPA from Unit Owner");
        }

        if($this->spa_spa){
            array_push($requirements, "2 Government ID of the SPA");
        }

        if($this->spa_all){
            array_push($requirements, "2 Government ID of All Occupants");
        }

        if($this->other_health){
            array_push($requirements, "Health Certificate of All Occupants");
        }

        if($this->other_utility){
            array_push($requirements, "Utility Deposit for Owner");
        }

        if($this->other_cleared){
            array_push($requirements, "Cleared Accounts");
        }

        if($this->other_paid){
            array_push($requirements, "Paid Utility Bills (current)");
        }

        if($this->other_clearance){
            array_push($requirements, "Clearance From Security");
        }


        return $requirements;
    }


    public function getRemainingRequirementsAttribute()
    {
        $requirements = [];

        if(!$this->pow_condo){
            array_push($requirements, "Condominium Certificate of Title");
        }

        if(!$this->pow_deeds){
            array_push($requirements, "Deed/s of Absolute Sale");
        }

        if(!$this->spa_unit_owner){
            array_push($requirements, "SPA from Unit Owner");
        }

        if(!$this->spa_spa){
            array_push($requirements, "2 Government ID of the SPA");
        }

        if(!$this->spa_all){
            array_push($requirements, "2 Government ID of All Occupants");
        }

        if(!$this->other_health){
            array_push($requirements, "Health Certificate of All Occupants");
        }

        if(!$this->other_utility){
            array_push($requirements, "Utility Deposit for Owner");
        }

        if(!$this->other_cleared){
            array_push($requirements, "Cleared Accounts");
        }

        if(!$this->other_paid){
            array_push($requirements, "Paid Utility Bills (current)");
        }

        if(!$this->other_clearance){
            array_push($requirements, "Clearance From Security");
        }


        return $requirements;
    }

    public function getHasPortalAttribute(){
        if($this->user)
            return true;
        else
            return false;
    }

}
