<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("backend.tenants.index", ["tenants" => Tenant::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.tenants.create", ["units" => Unit::all()]);
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
            "contract_of_lease_src" => "required|image",
            "signature_src" => "required|image"
        ]);

        $path = Storage::putFile("public/images", $request->file("image_src"));
        $path = Storage::url($path);
        $validated["image_src"] = $path;

        $path = Storage::putFile("public/images", $request->file("proof_of_identity_src"));
        $path = Storage::url($path);
        $validated["proof_of_identity_src"] = $path;

        $path = Storage::putFile("public/images", $request->file("contract_of_lease_src"));
        $path = Storage::url($path);
        $validated["contract_of_lease_src"] = $path;

        $path = Storage::putFile("public/images", $request->file("signature_src"));
        $path = Storage::url($path);
        $validated["signature_src"] = $path;

        Tenant::create([
            'image_src'=> $validated["image_src"],
            'lease_from' => $request->lease_from,
            'lease_to' => $request->lease_to,
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
            'contract_of_lease_src'=>  $validated["contract_of_lease_src"] ,
            'signature_src'=>  $validated["signature_src"],
            'pre_notarized'=> $request->pre_notarized == "on" ? true : false,
            'pre_resident'=> $request->pre_resident == "on" ? true : false,
            'pre_nbi'=> $request->pre_nbi == "on" ? true : false,
            'spa_spa'=> $request->spa_spa == "on" ? true : false,
            'spa_government'=> $request->spa_government == "on" ? true : false,
            'spa_acr'=> $request->spa_acr == "on" ? true : false,
            'other_health'=> $request->other_health == "on" ? true : false,
            'other_tenant'=> $request->other_tenant == "on" ? true : false,
            'other_cleared'=> $request->other_cleared == "on" ? true : false,
            'other_paid'=> $request->other_paid == "on" ? true : false,
            'other_clearance'=> $request->other_clearance == "on" ? true : false
        ]);
        return redirect()->route('tenants.index')->with(["success" => "Tenant has been created."]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        return view("backend.tenants.show", compact("tenant"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        $units = Unit::all();
        return view("backend.tenants.edit", compact("tenant", "units"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenant $tenant)
    {
        $toValidate = [];

        if($request->file("image_src")){
            $toValidate["image_src"] = "required|image";
        }

        if($request->file("proof_of_identity_src")){
            $toValidate["proof_of_identity_src"] = "required|image";
        }

        if($request->file("contract_of_lease_src")){
            $toValidate["contract_of_lease_src"] = "required|image";
        }

        if($request->file("signature_src")){
            $toValidate["signature_src"] = "required|image";
        }

        $validated = $request->validate($toValidate);


        $toUpdate = [
            'lease_from' => $request->lease_from,
            'lease_to' => $request->lease_to,
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
            'pre_notarized'=> $request->pre_notarized == "on" ? true : false,
            'pre_resident'=> $request->pre_resident == "on" ? true : false,
            'pre_nbi'=> $request->pre_nbi == "on" ? true : false,
            'spa_spa'=> $request->spa_spa == "on" ? true : false,
            'spa_government'=> $request->spa_government == "on" ? true : false,
            'spa_acr'=> $request->spa_acr == "on" ? true : false,
            'other_health'=> $request->other_health == "on" ? true : false,
            'other_tenant'=> $request->other_tenant == "on" ? true : false,
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

        if($request->file("contract_of_lease_src")){
            $path = Storage::putFile("public/images", $request->file("contract_of_lease_src"));
            $path = Storage::url($path);
            $toUpdate["contract_of_lease_src"] = $path;
        }

        if($request->file("signature_src")){
            $path = Storage::putFile("public/images", $request->file("signature_src"));
            $path = Storage::url($path);
            $toUpdate["signature_src"] = $path;
        }


        $tenant->update($toUpdate);
        return redirect()->route('tenants.index')->with(["success" => "Tenant has been updated."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        if($tenant->user_id){
            $user = User::find($tenant->user_id);
            $user->delete();
        }

        $tenant->delete();
        return redirect()->route('tenants.index')->with(["success" => "Tenant has been deleted."]);
    }

    /**
     * Granting Portal Access using this method.
     * 
     * 
     * @ GRANTIING ACCESS TO PORTAL USERS
     * @ SABOG NA
     */

     public function grantAccess(Request $request, Tenant $tenant)
     {
        // dd($tenant->user_id);
         $request->validate([
             "email" => "unique:users|required",
             "password" => "required|confirmed",
         ]);
         $user = User::create([
             "email" => $request->email,
             "password" => Hash::make($request->password),
             "is_portal_user" => true
         ]);
         $tenant->update(["user_id" => $user->id]);
         return redirect()->route('tenants.index')->with(["success" => "Portal access has been granted."]);
     }
}
