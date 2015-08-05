@extends('app')

    @section('pageHeader')

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>My Tickets</h2>

                <div class="input-group-btn header-filter">
                    <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">{{ ucwords(str_replace('_', ' ', strtolower($filter))) }} Tickets<span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="/tickets/filter/all">All Tickets</a></li>
                        <li><a href="/tickets/filter/open">Open Tickets</a></li>
                        <li><a href="/tickets/filter/closed">Closed</a></li>
                        <li><a href="/tickets/filter/started">Started Tickets</a></li>
                        <li><a href="/tickets/filter/not_started">Not Started Tickets</a></li>
                    </ul>
                </div>

                <ol class="breadcrumb">
                    <li>
                        <a href="/home">Home</a>
                    </li>
                    <li class="active">
                        <strong>My Tickets</strong>
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
