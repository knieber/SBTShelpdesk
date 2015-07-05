@extends('app')

    @section('pageHeader')

        @include('partials._pageheader', ['header' => 'Welcome' . ' ' . $name, 'pageLocation' => '', 'actionArea' => ''])

    @endsection

    @section('pageContent')



    @endsection

@stop
