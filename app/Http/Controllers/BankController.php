<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.banks.index',['banks' => Bank::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bank::create(['name' => $request->name, 'account_no' => $request->account_no, 'account_name' => $request->account_name]);
        return redirect()->route('banks.index')->with(["success" => "Bank has been created."]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        $bank->update(['name' => $request->name, 'account_no' => $request->account_no, 'account_name' => $request->account_name]);
        return redirect()->route('banks.index')->with(["success" => "Bank has been updated."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();
        return redirect()->route('banks.index')->with(["success" => "Bank has been deleted."]);
    }
}
