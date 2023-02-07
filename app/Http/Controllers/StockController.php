<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Stock;
use App\Models\Vendor;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.stocks.index', [
            'stocks' => Stock::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.stocks.create', [
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
        $stock = Stock::create([
            'name' => $request->name,
            'vendor_id' => $request->vendor_id,
            'location' => $request->location,
        ]);

        $stock->moves()->create([
            'is_in' => true,
            'quantity' => $request->quantity,
            'remarks' => "Initial Stock",
        ]);

        return redirect()->route('stocks.index')->with(["success" => "Stock has been created."]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        return view('backend.stocks.show', [
            'stock' => $stock,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        return view('backend.stocks.edit', [
            'stock' => $stock,
            'vendors' => Vendor::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $stock->update([
            'name' => $request->name,
            'vendor_id' => $request->vendor_id,
            'location' => $request->location,
        ]);

        if($request->is_check_adjust == "on"){
            $stock->moves()->create([
                'is_in' => $request->move == "IN" ? true : false,
                'quantity' => $request->quantity,
                'remarks' => $request->remarks,
            ]);
        }

        return redirect()->route('stocks.index')->with(["success" => "Stock has been updated."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stocks.index')->with(["success" => "Stock has been deleted."]);
    }
}
