@extends('app')

    @section('pageHeader')

        @include('partials._pageheader', ['header' => 'My Tickets', 'pageLocation' => 'My Tickets', 'actionArea' => ''])

    @endsection

    @section('pageContent')

        {{ $ticket }}

    @endsection

@stop