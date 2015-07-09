<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PublicTicketsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $departments = \App\Department::all();

        return view('publicTicket', compact('departments'));
    }

    /**
     * @param Requests\CreateTicket $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createTicket(Requests\CreateTicket $request)
    {
        $ticket = new Ticket($request->all());

        $ticket->save();

        return redirect('/create');
    }
}
