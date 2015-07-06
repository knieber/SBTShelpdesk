@extends('app')

    @section('pageHeader')

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>Ticket Details</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="/home">Home</a>
                    </li>
                    <li>
                        <a href="/tickets">My Tickets</a>
                    </li>
                    <li class="active">
                        <strong>Ticket Details</strong>
                    </li>
                </ol>
            </div>
            <div class="col-sm-8">
                    <div class="title-action">
                        <a href="{{ $ticket->id }}/edit" class="btn btn-primary">Edit Ticket</a>
                    </div>
            </div>
        </div>

    @endsection

    @section('pageContent')

        <div class="row">
            <div class="col-lg-9">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                        <a href="#" class="btn btn-white btn-xs pull-right">Edit ticket</a>
                                        <h2>Ticket #{{ $ticket->id }}</h2>
                                    </div>
                                    <dl class="dl-horizontal">
                                        <dt>Status:</dt> <dd><span class="label label-primary">Active</span></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">
                                        <dt>Created by:</dt> <dd>{{ $ticket->name }}</dd>
                                    </dl>
                                </div>
                                <div class="col-lg-7" id="cluster_info">
                                    <dl class="dl-horizontal" >

                                        <dt>Last Updated:</dt> <dd>{{ $ticket->updated_at }}</dd>
                                        <dt>Created:</dt> <dd>{{ $ticket->created_at }}</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <dl class="dl-horizontal">
                                        <dt>Details:</dt> <dd>{{ $ticket->desc }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection

@stop