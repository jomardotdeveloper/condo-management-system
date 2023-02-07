<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.vendors.index', [
            'vendors' => Vendor::all(),
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
        Vendor::create([
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'contact_no' => $request->contact_no,
            'email' => $request->email,
            'contact_person' => $request->contact_person,
        ]);
        return redirect()->route('vendors.index')->with(["success" => "Vendor has been created."]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        $vendor->update([
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'contact_no' => $request->contact_no,
            'email' => $request->email,
            'contact_person' => $request->contact_person,
        ]);
        return redirect()->route('vendors.index')->with(["success" => "Vendor has been updated."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return redirect()->route('vendors.index')->with(["success" => "Vendor has been deleted."]);
    }
}
