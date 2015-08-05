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
                        <a href="/tickets/filter/all">My Tickets</a>
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
                                <div class="m-b-md" style="padding-left: 15px">
                                    <h2>Ticket #{{ $ticket->id }}</h2>
                                </div>
                                <div class="col-lg-6">
                                    <dl class="dl-horizontal">
                                        <dt>Status:</dt>
                                        <dd id="status-display" >
                                            @if($ticket->status === 'open')
                                                <span href="#" id="status" status="{{ $ticket->status }}" data-type="select" data-pk="{{ $ticket->id }}" class="btn btn-sm btn-primary" data-url="/tickets/ajax" data-title="Select Status">{{ ucwords(strtolower($ticket->status)) }} | <span class="fa fa-chevron-down"></span></span>
                                            @else
                                                <span href="#" id="status" status="{{ $ticket->status }}" data-type="select" data-pk="{{ $ticket->id }}" data-url="/tickets/ajax" class="btn btn-sm btn-danger" data-title="Select Status">{{ ucwords(strtolower($ticket->status)) }} | <span class="fa fa-chevron-down"></span></span>
                                            @endif
                                            <meta name="_token" content="{{ csrf_token() }}" />
                                        </dd>
                                    </dl>
                                    <dl id="activity-display" class="dl-horizontal" @unless($ticket->status === 'open') style="display: none" @endunless>
                                        <dt>Activity:</dt>
                                        <dd>
                                            @if($ticket->activity === 'started')
                                                <span id="activity" activity="{{ $ticket->activity }}" data-type="select" data-pk="{{$ticket->id}}" class="btn btn-sm btn-primary" data-url="/tickets/ajax" data-title="Select Activity Status">{{ ucwords(str_replace('_', ' ', strtolower($ticket->activity))) }}</span>
                                            @else
                                                <span id="activity" activity="{{ $ticket->activity }}" data-type="select" data-pk="{{$ticket->id}}" class="btn btn-sm btn-danger" data-url="/tickets/ajax" data-title="Select Activity Status">{{ ucwords(str_replace('_', ' ', strtolower($ticket->activity))) }}</span>
                                            @endif
                                            <meta name="_token" content="{{ csrf_token() }}" />
                                        </dd>
                                    </dl>
                                </div>
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">
                                        <dt>Assignee:</dt>
                                        <dd>
                                            <form action="/tickets/{{ $ticket->id }}" method="POST">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input name="_method" type="hidden" value="PUT">
                                                <select class="form-control" style="height: 25px" name="user_id" onchange="this.form.submit()">

                                                    <?php
                                                        $users = \App\User::all();
                                                        $departmentCategories = \App\Department::all();
                                                    ?>

                                                    <option disabled selected></option>
                                                    @foreach($departmentCategories as $departmentCategory)
                                                        <optgroup label="{{ $departmentCategory->department }}">

                                                            @foreach($departmentCategory->users as $user)

                                                                @if($ticket->user)

                                                                    @if($user->id === $ticket->user->id)
                                                                        <option selected="selected" value="{{ $user->id }}"> {{ $user->first_name . ' ' . $user->last_name }}</option>
                                                                    @else
                                                                        <option value="{{ $user->id }}">{{ $user->first_name . ' ' . $user->last_name }}</option>
                                                                    @endif

                                                                 @else
                                                                    <option value="{{ $user->id }}">{{ $user->first_name . ' ' . $user->last_name }}</option>

                                                                @endif

                                                            @endforeach

                                                        </optgroup>
                                                    @endforeach

                                                </select>

                                            </form>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Intended Department:</dt>
                                        <dd>
                                            <form action="/tickets/{{ $ticket->id }}" method="POST">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input name="_method" type="hidden" value="PUT">
                                                <select class="form-control" style="height: 25px" name="department_id" onchange="this.form.submit()">

                                                    @foreach($departmentCategories as $departmentCategory)

                                                        @if($ticket->department)

                                                            @if($departmentCategory->id == $ticket->department->id)
                                                                <option selected="selected" value="{{ $departmentCategory->id }}"> {{ $departmentCategory->department }}</option>
                                                            @else
                                                                <option value="{{ $departmentCategory->id }}"> {{ $departmentCategory->department }} </option>
                                                            @endif

                                                         @else
                                                            <option value="{{ $departmentCategory->id }}"> {{ $departmentCategory->department }} </option>

                                                        @endif

                                                    @endforeach
                                                </select>

                                            </form>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <dl class="dl-horizontal">
                                        <dt>Created by:</dt> <dd id="name">{{ $ticket->name }}</dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Creator Email:</dt><dd id="email">{{ $ticket->email }}</dd>
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
                    success: function(response, newValue) {
                        if(newValue === 'open') {
                            $('#status').removeClass('btn-danger').addClass('btn-primary');
                            $('#activity-display').show();
                        } else if (newValue === 'closed') {
                            $('#status').removeClass('btn-primary').addClass('btn-danger');
                            $('#activity-display').hide();
                        }
                    },
                    params: {
                      email: $('#email').text()
                    },
                    highlight: null
                });

                $('#activity').editable({

                    value: $('#activity').attr('activity'),
                    source: [
                        {value: 'started', text: 'Started'},
                        {value: 'not_started', text: 'Not Started'},
                    ],
                    send:'always',
                    success: function(response, newValue) {
                        if(newValue === 'started') {
                            $('#activity').removeClass('btn-danger').addClass('btn-primary');
                        } else if (newValue === 'not_started') {
                            $('#activity').removeClass('btn-primary').addClass('btn-danger')
                        }
                    },
                    highlight: null
                });

            });

        </script>
    @endsection

@stop