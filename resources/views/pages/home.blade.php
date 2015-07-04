@extends('app')

    @section('pageHeader')

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Welcome {{ $name }}</h2>
                <ol class="breadcrumb">
                    <li class="active">
                        <a href="/"><strong>Home</strong></a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

    @endsection

    @section('pageContent')



    @endsection

@stop
