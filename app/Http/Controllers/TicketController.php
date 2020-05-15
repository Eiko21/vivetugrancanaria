<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ticket;
use App\Activity;

class TicketController extends Controller
{
    /**
     * Display a listing of the tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_client=Auth::user()->id;
        $tickets=Ticket::all()->where('clientid',$current_client);
        if($tickets->count()>0){
            foreach($tickets as $ticket){
                $ticket->activity = Activity::findOrFail($ticket->activityid);
            }    
        }       
        return view('client.indextickets', compact('tickets'));
    }

    /**
     * Show the form for creating a new ticket.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $activityid)
    {
        $activity=Activity::findOrFail($activityid);
        $quantity=$request->quantity;
        $total=($activity->price)*$quantity;
        return view('client.storeticket', compact('activity','quantity','total'));
    }

    /**
     * Store a newly created ticket in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $activityid)
    {
        $ticket = new Ticket;
        $ticket->price=(float)$request->total;
        $ticket->quantity=$request->quantity;
        $ticket->clientid=Auth::user()->id;
        $ticket->activityid=$activityid;

        $ticket->save();
        return redirect(route('indextickets'));
    }

    /**
     * Display the specified ticket.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified ticket.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified ticket in storage.
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
     * Remove the specified ticket from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
