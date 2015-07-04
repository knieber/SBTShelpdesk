@extends('app')

    @section('pageHeader')

        @include('partials._pageheader', ['header' => 'Welcome' . ' ' . $name, 'pageLocation' => ''])

    @endsection

    @section('pageContent')



    @endsection

@stop
