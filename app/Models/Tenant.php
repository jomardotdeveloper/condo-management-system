<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'lease_from',
        'occupant_type',
        'lease_to',
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
        'contract_of_lease_src',
        'signature_src',
        'pre_notarized',
        'pre_resident',
        'pre_nbi',
        'spa_spa',
        'spa_government',
        'spa_acr',
        'other_health',
        'other_tenant',
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

        if($this->pre_notarized){
            array_push($requirements, "Notarized Contract of Lease for Tenant");
        }

        if($this->pre_resident){
            array_push($requirements, "Resident's Information Sheet");
        }

        if($this->pre_nbi){
            array_push($requirements, "NBI and Police Clearance of All Occupants");
        }

        if($this->spa_spa){
            array_push($requirements, "SPA from Owner far Authorized Representative-Applicant");
        }

        if($this->spa_government){
            array_push($requirements, "2 Government ID of the SPA");
        }

        if($this->spa_acr){
            array_push($requirements, "ACR, Passport, and VISA for Foreign Occupants");
        }

        if($this->other_health){
            array_push($requirements, "Health Certificate of All Occupants");
        }

        if($this->other_tenant){
            array_push($requirements, "Tenant Bond");
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

        if(!$this->pre_notarized){
            array_push($requirements, "Notarized Contract of Lease for Tenant");
        }

        if(!$this->pre_resident){
            array_push($requirements, "Resident's Information Sheet");
        }

        if(!$this->pre_nbi){
            array_push($requirements, "NBI and Police Clearance of All Occupants");
        }

        if(!$this->spa_spa){
            array_push($requirements, "SPA from Owner far Authorized Representative-Applicant");
        }

        if(!$this->spa_government){
            array_push($requirements, "2 Government ID of the SPA");
        }

        if(!$this->spa_acr){
            array_push($requirements, "ACR, Passport, and VISA for Foreign Occupants");
        }

        if(!$this->other_health){
            array_push($requirements, "Health Certificate of All Occupants");
        }

        if(!$this->other_tenant){
            array_push($requirements, "Tenant Bond");
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
