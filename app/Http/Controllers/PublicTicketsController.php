<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PublicTicketsController extends Controller
{
    public function index()
    {
        return view('submitTicket');
    }

    public function createTicket(Requests\CreateTicket $request)
    {
        $ticket = new Ticket($request->all());

        $ticket->save();

        return redirect('/create');
    }
}
