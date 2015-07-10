@extends('app')

@section('pageHeader')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <div>
            <h2>All Departments</h2>
            <div class="input-group-btn header-filter">
                <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">{{ ucwords(strtolower($filter)) }} Tickets<span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="/helpdesk/alldepartments/all">All Tickets</a></li>
                    <li><a href="/helpdesk/alldepartments/unassigned">Unassigned Tickets</a></li>
                    <li><a href="/helpdesk/alldepartments/open">Open Tickets</a></li>
                    <li><a href="/helpdesk/alldepartments/closed">Closed Tickets</a></li>
                    <li><a href="/helpdesk/alldepartments/started">Started Tickets</a></li>
                    <li><a href="/helpdesk/alldepartments/not_started">Not Started Tickets</a></li>
                    <li class="divider"></li>
                    <li><a href="/tickets">My Tickets</a></li>
                </ul>
            </div>
            </div>

            <ol class="breadcrumb">
                <li>
                    <a href="/home">Home</a>
                </li>
                <li class="active">
                    <strong>All Tickets</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="/tickets/create" class="btn btn-primary">Create Ticket</a>
            </div>
        </div>
    </div>

@endsection

@section('pageContent')

    @include('partials._listTickets')

@endsection

@stop
