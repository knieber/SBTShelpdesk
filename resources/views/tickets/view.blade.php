@extends('app')

    @section('pageHeader')

        @include('partials._pageheader', ['header' => 'My Tickets', 'pageLocation' => 'My Tickets', 'actionArea' => 'Create Ticket'])

    @endsection

    @section('pageContent')

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tickets </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>

                                    <th>#</th>
                                    <th>Desc </th>
                                    <th>Name </th>
                                    <th>Email </th>
                                    <th>Department </th>
                                    <th>Completed </th>
                                    <th>Task</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tickets as $ticket)
                                <tr>


                                    <td>{{ $ticket->id }}</td>
                                    <td>{{ $ticket->desc }}</td>
                                    <td>{{ $ticket->creator }}</td>
                                    <td>{{ $ticket->email }}</td>
                                    <td>{{ $ticket->department }}</td>
                                    <td><span class="pie">0.52/1.561</span></td>
                                    <td>20%</td>
                                    <td>{{ $ticket->created_at }}</td>
                                    <td><a href="{{ action('TicketsController@show', [$ticket->id]) }}">View</a></td>
                                </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

    @endsection

@stop
