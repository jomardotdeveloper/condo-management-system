<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();

        if(auth()->user()->is_portal_user){
            $tickets = auth()->user()->tickets;
        }

        return view("backend.tickets.index", compact("tickets"));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'attachment_src' => null,
            'user_id' => auth()->user()->id
        ];
        if($request->file("attachment_src")){
            $path = Storage::putFile("public/images", $request->file("attachment_src"));
            $path = Storage::url($path);
            $data["attachment_src"] = $path;
        }

        Ticket::create($data);
        return redirect()->route('tickets.index')->with(["success" => "Ticket has been created."]);
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
