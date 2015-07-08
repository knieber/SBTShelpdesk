@extends('app')

@section('pageHeader')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>All SBTS Tickets</h2>

            <div class="input-group-btn" style="display:inline-block">
                <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">{{ ucwords(strtolower($filter)) }}<span class="caret"></span></button>
                <ul class="dropdown-menu">

                    <li><a href="/helpdesk/campustickets/all">All</a></li>
                    <li><a href="/helpdesk/campustickets/unassigned">Unassigned</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
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
