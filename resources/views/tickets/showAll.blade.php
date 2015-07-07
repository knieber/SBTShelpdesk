@extends('app')

@section('pageHeader')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>All Tickets</h2>
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
