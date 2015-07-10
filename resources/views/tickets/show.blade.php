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
                                        <h2>Ticket #{{ $ticket->id }}</h2>
                                    </div>
                                    <dl class="dl-horizontal">

                                        @if($ticket->status === 'open')
                                            <dt>Status:</dt>

                                            {{--<dd><span class="label label-primary">{{ ucwords(strtolower($ticket->status)) }}</span></dd>--}}

                                            <dd><a href="#" id="status" status="{{ $ticket->status }}" data-type="select" data-pk="{{ $ticket->id }}" data-url="/tickets/ajax" data-title="Select status">{{ ucwords(strtolower($ticket->status)) }}</a></dd>
                                            <meta name="_token" content="{{ csrf_token() }}" />
                                        @else
                                            <dt>Status:</dt>
                                            {{--<dd><span class="label label-danger">{{ ucwords(strtolower($ticket->status)) }}</span></dd>--}}

                                            <dd><a href="#" id="status" status="{{ $ticket->status }}" data-type="select" data-pk="{{ $ticket->id }}" data-url="/tickets/ajax" data-title="Select status">{{ ucwords(strtolower($ticket->status)) }}</a></dd>
                                            <meta name="_token" content="{{ csrf_token() }}" />
                                        @endif

                                    </dl>

                                    @unless($ticket->status === 'closed')
                                        <dl class="dl-horizontal">
                                            @if($ticket->activity === 'started')
                                                <dt>Activity:</dt> <dd><span class="label label-primary">{{ ucwords(str_replace('_', ' ', strtolower($ticket->activity))) }}</span></dd>
                                            @else
                                                <dt>Activity:</dt> <dd><span class="label label-danger">{{ ucwords(str_replace('_', ' ', strtolower($ticket->activity))) }}</span></dd>
                                            @endif
                                        </dl>
                                    @endunless

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <dl class="dl-horizontal">
                                        <dt>Created by:</dt> <dd>{{ $ticket->name }}</dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Creator Email:</dt><dd>{{ $ticket->email }}</dd>
                                    </dl>
                                </div>
                                <div class="col-lg-6" id="cluster_info">
                                    <dl class="dl-horizontal" >
                                        <dt>Created On:</dt> <dd>{{ $ticket->created_at }}</dd>
                                    </dl>
                                    <dl class="dl-horizontal" >
                                        <dt>Last Updated:</dt> <dd>{{ $ticket->updated_at }}</dd>
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

    @section('javascript_content')
        <script type="text/javascript">

            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                    }
                });

                $.fn.editable.defaults.mode = 'inline';

                $.fn.editable.defaults.ajaxOptions = {type: "PUT"};

                $('#status').editable({

                    value: $('#status').attr('status'),
                    source: [
                        {value: 'open', text: 'Open'},
                        {value: 'closed', text: 'Closed'},
                    ],
                    send:'always',
                });

            });

        </script>
    @endsection

@stop