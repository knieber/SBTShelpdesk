<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\Helpers\HelpDeskView;
use App\Ticket;

class HelpDeskController extends Controller
{
    public function allTicketsView($filter)
    {
        $helpDeskView = new HelpDeskView(null, $filter);

        $tickets = $helpDeskView->allViewFilter();

        return view('helpdeskviews.all', compact('tickets', 'filter'));
    }

    public function departmentView($department, $filter)
    {
        $helpDeskView = new HelpDeskView($department, $filter);

        $tickets = $helpDeskView->departmentViewFilter();

        return view('helpdeskviews.department', compact('department', 'tickets', 'filter'));
    }

}
