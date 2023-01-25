<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.employees.index', [
            'employees' => Employee::all(),
            'departments' => Department::all(),
            'positions' => Position::all(),
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
        $request->validate([
            "email" => "unique:users|required",
            "password" => "required|confirmed",
        ]);

        $user = User::create([
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        Employee::create([
            "user_id" => $user->id,
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "middle_name" => $request->middle_name,
            "position_id" => $request->position_id,
            "department_id" => $request->department_id,
        ]);

        return redirect()->route('employees.index')->with(["success" => "Employee has been created."]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $changePasswordIsCheck = $request->is_check_password ? true : false;
        if($changePasswordIsCheck) {
            $request->validate([
                "email" => "unique:users,email," . $employee->user->id,
                "password" => "required|confirmed",
            ]);
            $employee->user->update([
                "email" => $request->email,
                "password" => Hash::make($request->password),
            ]);
        } else {
            $request->validate([
                "email" => "unique:users,email," . $employee->user->id,
            ]);
            $employee->user->update([
                "email" => $request->email
            ]);
        }

        $employee->update([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "middle_name" => $request->middle_name,
            "position_id" => $request->position_id,
            "department_id" => $request->department_id,
        ]);

        return redirect()->route('employees.index')->with(["success" => "Employee has been updated."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->user->delete();
        return redirect()->route('employees.index')->with(["success" => "Employee has been deleted."]);
    }
}
