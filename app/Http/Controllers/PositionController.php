<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.positions.index',['positions' => Position::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Position::create(['name' => $request->name]);
        return redirect()->route('positions.index')->with(["success" => "Position has been created."]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        $position->update(['name' => $request->name]);
        return redirect()->route('positions.index')->with(["success" => "Position has been updated."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('positions.index')->with(["success" => "Position has been deleted."]);
    }
}
