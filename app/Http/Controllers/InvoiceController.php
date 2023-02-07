<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Invoice;
use App\Models\Owner;
use App\Models\Setting;
use App\Models\Tenant;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.invoices.index', [
            'invoices' => Invoice::all(),
            'accounts' => Account::where('is_in', true)->get()->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.invoices.create', [
            'owners' => Owner::all(),
            'tenants' => Tenant::all(),
            'monthly_due' => Setting::where('key', 'monthly_due')->first()->value,
            'electricity' => Setting::where('key', 'electricity')->first()->value,
            'water' => Setting::where('key', 'water')->first()->value,
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
        $is_unit_owner = str_contains( $request->customer, 'o_');
        $customer_id = $is_unit_owner ? str_replace('o_', '', $request->customer) : str_replace('t_', '', $request->customer);
        $user = $is_unit_owner ? Owner::find($customer_id) : Tenant::find($customer_id);
        $monthly = Setting::where('key', 'monthly_due')->first()->value;
        $electricity =  Setting::where('key', 'electricity')->first()->value;
        $water =  Setting::where('key', 'water')->first()->value;



        $invoice = Invoice::create([
            'date_deadline' => $request->date_deadline,
            'customer_id' => $customer_id,
            'is_unit_owner' => $is_unit_owner,
            'user_id' => $user ? $user->id : null,
        ]);

        $invoice->lines()->create([
            'label' => 'Monthly Due',
            'amount' => $monthly,
        ]);

        $invoice->lines()->create([
            'label' => 'Electricity',
            'amount' => $electricity,
        ]);

        $invoice->lines()->create([
            'label' => 'Water',
            'amount' => $water,
        ]);

        return redirect()->route('invoices.index')->with(["success" => "Invoice has been created."]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
