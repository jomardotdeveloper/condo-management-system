<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use Illuminate\Http\Request;

class ClusterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clusters = Cluster::all();
        return view('backend.clusters.index', compact('clusters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cluster::create([
            'name' => $request->name,
            'unit_towers' => $request->unit_towers,
            'reading_day' => $request->reading_day,
            'due_date' => $request->due_date
        ]);
        return redirect()->route('clusters.index')->with(["success" => "Cluster has been created."]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cluster $cluster)
    {
        $cluster->update([
            'name' => $request->name,
            'unit_towers' => $request->unit_towers,
            'reading_day' => $request->reading_day,
            'due_date' => $request->due_date
        ]);
        return redirect()->route('clusters.index')->with(["success" => "Cluster has been updated."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cluster $cluster)
    {
        $cluster->delete();
        return redirect()->route('clusters.index')->with(["success" => "Cluster has been deleted."]);
    }
}
