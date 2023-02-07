<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Bank;
use App\Models\Entry;
use Illuminate\Http\Request;

class CashflowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.entries.index', [
            'entries' => Entry::all(),
            'banks' => Bank::all(),
            'accounts' => Account::all(),
            'net' => $this->getNet(),
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
        Entry::create([
            'bank_id' => $request->bank_id,
            'account_id' => $request->account_id,
            'amount' => $request->amount,
            'reference' => $request->reference,
        ]);
        return redirect()->route('entries.index')->with(["success" => "Entry has been created."]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entry $entry)
    {
        $entry->update([
            'bank_id' => $request->bank_id,
            'account_id' => $request->account_id,
            'amount' => $request->amount,
            'reference' => $request->reference,
        ]);
        return redirect()->route('entries.index')->with(["success" => "Entry has been updated."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entry $entry)
    {
        $entry->delete();
        return redirect()->route('entries.index')->with(["success" => "Entry has been deleted."]);
    }

    private function getNet(){
        $entries = Entry::all();
        $net = 0;

        foreach ($entries as $entry){
            if($entry->account->is_in)
                $net += $entry->amount;
            else
                $net -= $entry->amount;
        }

        return $net;
    }
}
