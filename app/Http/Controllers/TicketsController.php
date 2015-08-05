<?php

namespace App\Http\Controllers;

use App\Helpers\TicketFilter;
use App\Ticket;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

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

        $departments = \App\Department::all();

        return view('tickets.create', compact('users', 'departments'));
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
     * @param $filter
     * @return \Illuminate\View\View
     */
    public function ticketFilter($filter)
    {
        $ticketFilter = new TicketFilter(null, $filter);

        $tickets = $ticketFilter->myTicketsFilter();

        return view('tickets.showMyTickets', compact('tickets', 'filter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
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

    public function xEditableUpdate()
    {

        $ticketId = Input::get('pk');

        $ticket = Ticket::findOrFail($ticketId);

        $newValue = Input::get('value');

        $ticketColumn = Input::get('name');

        $ticket->$ticketColumn = $newValue;

        if ($ticket->save()) {
            if ($newValue === 'closed') {
                Mail::send('emails.ticketClosed', [], function ($message) {
                    $email = Input::get('email');
                    $message->to($email)->subject('test');
                });
            } elseif ($newValue === 'started') {
                Mail::send('emails.ticketStarted', [], function ($message) {
                    $email = Input::get('email');
                    $message->to($email)->subject('test');
                });
            }
            return Response::json(array('status' => 1));
        } else {
            return Response::json(array('status' => 0));
        }

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
