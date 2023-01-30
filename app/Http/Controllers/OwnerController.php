<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.owners.index', [
            'owners' => Owner::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Unit::all());
        return view('backend.owners.create', [
            'units' => Unit::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            "image_src" => "required|image",
            "proof_of_identity_src" => "required|image",
            "proof_of_ownership_src" => "required|image",
            "signature_src" => "required|image"
        ]);

        $path = Storage::putFile("public/images", $request->file("image_src"));
        $path = Storage::url($path);
        $validated["image_src"] = $path;

        $path = Storage::putFile("public/images", $request->file("proof_of_identity_src"));
        $path = Storage::url($path);
        $validated["proof_of_identity_src"] = $path;

        $path = Storage::putFile("public/images", $request->file("proof_of_ownership_src"));
        $path = Storage::url($path);
        $validated["proof_of_ownership_src"] = $path;

        $path = Storage::putFile("public/images", $request->file("signature_src"));
        $path = Storage::url($path);
        $validated["signature_src"] = $path;

        Owner::create([
            'image_src'=> $validated["image_src"],
            'title'=> $request->title, 
            'move_in_date'=> $request->move_in_date,
            'move_out_date'=> $request->move_out_date,
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'middle_name'=> $request->middle_name,
            'suffix_name'=> $request->suffix_name,
            'gender'=> $request->gender, 
            'birthdate'=> $request->birthdate,
            'nationality'=> $request->nationality,
            'contact_no'=> $request->contact_no,
            'email'=> $request->email,
            'occupation'=> $request->occupation,
            'utility_bond'=> $request->utility_bond,
            'date_of_ar'=> $request->date_of_ar,
            'electric_reading'=> $request->electric_reading,
            'water_reading'=> $request->water_reading,
            'or_number'=> $request->or_number,
            'remarks'=> $request->remarks,
            'unit_id'=> $request->unit_id,
            'residency_status'=> $request->residency_status,
            'is_occupant'=> $request->is_occupant == "YES" ? true : false,
            'address'=> $request->address,
            'proof_of_identity_src'=>  $validated["proof_of_identity_src"] ,
            'proof_of_ownership_src'=>  $validated["proof_of_ownership_src"] ,
            'signature_src'=>  $validated["signature_src"],
            'spa_name'=> $request->spa_name,
            'spa_contact_no'=> $request->spa_contact_no,
            'household_name'=> $request->household_name,
            'household_contact_no'=> $request->household_contact_no,
            'broker_name'=> $request->broker_name,
            'broker_contact_no'=> $request->broker_contact_no,
            'pow_condo'=> $request->pow_condo == "on" ? true : false,
            'pow_deeds'=> $request->pow_deeds == "on" ? true : false,
            'spa_unit_owner'=> $request->spa_unit_owner == "on" ? true : false,
            'spa_spa'=> $request->spa_spa == "on" ? true : false,
            'spa_all'=> $request->spa_all == "on" ? true : false,
            'other_health'=> $request->other_health == "on" ? true : false,
            'other_utility'=> $request->other_utility == "on" ? true : false,
            'other_cleared'=> $request->other_cleared == "on" ? true : false,
            'other_paid'=> $request->other_paid == "on" ? true : false,
            'other_clearance'=> $request->other_clearance == "on" ? true : false
        ]);
        return redirect()->route('owners.index')->with(["success" => "Owner has been created."]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        return view('backend.owners.show', [
            'owner' => $owner
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        return view('backend.owners.edit', [
            'owner' => $owner,
            'units' => Unit::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        $toValidate = [];

        if($request->file("image_src")){
            $toValidate["image_src"] = "required|image";
        }

        if($request->file("proof_of_identity_src")){
            $toValidate["proof_of_identity_src"] = "required|image";
        }

        if($request->file("proof_of_ownership_src")){
            $toValidate["proof_of_ownership_src"] = "required|image";
        }

        if($request->file("signature_src")){
            $toValidate["signature_src"] = "required|image";
        }

        $validated = $request->validate($toValidate);


        $toUpdate = [
            'title'=> $request->title, 
            'move_in_date'=> $request->move_in_date,
            'move_out_date'=> $request->move_out_date,
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'middle_name'=> $request->middle_name,
            'suffix_name'=> $request->suffix_name,
            'gender'=> $request->gender, 
            'birthdate'=> $request->birthdate,
            'nationality'=> $request->nationality,
            'contact_no'=> $request->contact_no,
            'email'=> $request->email,
            'occupation'=> $request->occupation,
            'utility_bond'=> $request->utility_bond,
            'date_of_ar'=> $request->date_of_ar,
            'electric_reading'=> $request->electric_reading,
            'water_reading'=> $request->water_reading,
            'or_number'=> $request->or_number,
            'remarks'=> $request->remarks,
            'unit_id'=> $request->unit_id,
            'residency_status'=> $request->residency_status,
            'is_occupant'=> $request->is_occupant == "YES" ? true : false,
            'address'=> $request->address,
            'spa_name'=> $request->spa_name,
            'spa_contact_no'=> $request->spa_contact_no,
            'household_name'=> $request->household_name,
            'household_contact_no'=> $request->household_contact_no,
            'broker_name'=> $request->broker_name,
            'broker_contact_no'=> $request->broker_contact_no,
            'pow_condo'=> $request->pow_condo == "on" ? true : false,
            'pow_deeds'=> $request->pow_deeds == "on" ? true : false,
            'spa_unit_owner'=> $request->spa_unit_owner == "on" ? true : false,
            'spa_spa'=> $request->spa_spa == "on" ? true : false,
            'spa_all'=> $request->spa_all == "on" ? true : false,
            'other_health'=> $request->other_health == "on" ? true : false,
            'other_utility'=> $request->other_utility == "on" ? true : false,
            'other_cleared'=> $request->other_cleared == "on" ? true : false,
            'other_paid'=> $request->other_paid == "on" ? true : false,
            'other_clearance'=> $request->other_clearance == "on" ? true : false
        ];


        if($request->file("image_src")){
            $path = Storage::putFile("public/images", $request->file("image_src"));
            $path = Storage::url($path);
            $toUpdate["image_src"] = $path;
        }

        if($request->file("proof_of_identity_src")){
            $path = Storage::putFile("public/images", $request->file("proof_of_identity_src"));
            $path = Storage::url($path);
            $toUpdate["proof_of_identity_src"] = $path;
        }

        if($request->file("proof_of_ownership_src")){
            $path = Storage::putFile("public/images", $request->file("proof_of_ownership_src"));
            $path = Storage::url($path);
            $toUpdate["proof_of_ownership_src"] = $path;
        }

        if($request->file("signature_src")){
            $path = Storage::putFile("public/images", $request->file("signature_src"));
            $path = Storage::url($path);
            $toUpdate["signature_src"] = $path;
        }


        $owner->update($toUpdate);
        return redirect()->route('owners.index')->with(["success" => "Owner has been updated."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        if($owner->user_id){
            $user = User::find($owner->user_id);
            $user->delete();
        }

        $owner->delete();
        return redirect()->route('owners.index')->with(["success" => "Owner has been deleted."]);
    }


    /**
     * Granting Portal Access using this method.
     * 
     * 
     * @ GRANTIING ACCESS TO PORTAL USERS
     * @ SABOG NA
     */

    public function grantAccess(Request $request, $id)
    {
        $owner = Owner::find($id);
        $owner->update([
            'is_portal_user' => true
        ]);

        return redirect()->route('owners.index');
    }
}
