<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $tickets = \Auth::user()->tickets;

        return view('tickets.showMyTickets', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $users = \App\User::all();

        return view('tickets.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\CreateTicket $request)
    {
        $ticket = new Ticket($request->all());

        $ticket->save();

        return redirect('tickets');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

        $ticket = Ticket::findOrFail($id);

        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function showAll()
    {
        $tickets = Ticket::all();

        return view('tickets.showAll', compact('tickets'));
    }

    public function unassigned()
    {
        $tickets = Ticket::where('user_id', null)->get();

        return view('tickets.unassigned', compact('tickets'));
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($ticketId, Request $request)
    {
        $ticket = Ticket::findOrFail($ticketId);

        $ticket->update($request->all());

        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
