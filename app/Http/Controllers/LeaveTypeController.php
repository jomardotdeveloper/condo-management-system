<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.leave-types.index',['types' => LeaveType::all()]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LeaveType::create(['name' => $request->name, 'description' => $request->description]);
        return redirect()->route('leave-types.index')->with(["success" => "Leave type has been created."]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeaveType $leave_type)
    {
        $leave_type->update(['name' => $request->name, 'description' => $request->description]);
        return redirect()->route('leave-types.index')->with(["success" => "Leave type has been updated."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveType $leave_type)
    {
        $leave_type->delete();
        return redirect()->route('leave-types.index')->with(["success" => "Leave type has been deleted."]);
    }
}
