<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LeaveApprover;
use App\Models\User;
use Illuminate\Http\Request;

class LeaveApproverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = [];
        $existing = [];

        foreach (LeaveApprover::all() as $approver) {
            array_push($existing, $approver->user_id);
        }

        foreach (Employee::all() as $employee) {
            if (!in_array($employee->user->id, $existing)) {
                array_push($users, $employee->user);
            }
        }

        return view('backend.leave-approvers.index', ["approvers" => LeaveApprover::all(), 'users' => $users]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LeaveApprover::create($request->all());

        return redirect()->route('leave-approvers.index')
            ->with('success', 'Leave approver created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveApprover $leaveApprover)
    {
        $leaveApprover->delete();

        return redirect()->route('leave-approvers.index')
            ->with('success', 'Leave approver deleted successfully');
    }
}
