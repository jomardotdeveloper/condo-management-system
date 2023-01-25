<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.units.index', [
            'units' => Unit::all(),
            'clusters' => Cluster::all()
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
        Unit::create([
            'unit_number' => $request->unit_number,
            'cluster_id' => $request->cluster_id,
            'unit_tower' => $request->unit_tower,
            'unit_floor' => $request->unit_floor,
            'unit_room' => $request->unit_room,
            'unit_type' => $request->unit_type,
            'floor_area' => $request->floor_area,
            'unit_association_fee' => $request->unit_association_fee,
            'unit_parking_fee' => $request->unit_parking_fee,
            'status' => $request->status,
        ]);
        return redirect()->route('units.index')->with(["success" => "Unit has been created."]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $unit->update([
            'unit_number' => $request->unit_number,
            'cluster_id' => $request->cluster_id,
            'unit_tower' => $request->unit_tower,
            'unit_floor' => $request->unit_floor,
            'unit_room' => $request->unit_room,
            'unit_type' => $request->unit_type,
            'floor_area' => $request->floor_area,
            'unit_association_fee' => $request->unit_association_fee,
            'unit_parking_fee' => $request->unit_parking_fee,
            'status' => $request->status,
        ]);
        return redirect()->route('units.index')->with(["success" => "Unit has been updated."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect()->route('units.index')->with(["success" => "Unit has been deleted."]);
    }
}
