<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\Helpers\TicketFilter;
use App\Ticket;

class HelpDeskController extends Controller
{
    public function allTicketsView($filter)
    {
        $ticketFilter = new TicketFilter(null, $filter);

        $tickets = $ticketFilter->allViewFilter();

        return view('helpdeskviews.all', compact('tickets', 'filter'));
    }

    public function departmentView($department_code, $filter)
    {
        $ticketFilter = new TicketFilter($department_code, $filter);

        $tickets = $ticketFilter->departmentViewFilter();

        $department = \App\Department::where('department_code', $department_code)->first();

        return view('helpdeskviews.department', compact('department', 'tickets', 'filter'));
    }
}
