@extends('app')

    @section('pageHeader')

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>Welcome {{ $name }}</h2>
                <ol class="breadcrumb">
                    <li class="active">
                        <a href="/home">Home</a>
                    </li>
                </ol>
            </div>
        </div>

    @endsection

    @section('pageContent')



    @endsection

@stop
