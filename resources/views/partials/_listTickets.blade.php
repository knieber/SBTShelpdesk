<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Tickets </h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
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
                        <th>Creator </th>
                        <th>Email </th>
                        <th>Department </th>
                        <th>Assignee</th>
                        <th>Created At</th>
                        <th>Action</th>
                        <th>Assign To</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tickets as $ticket)
                        <tr>


                            <td>{{ $ticket->id }}</td>
                            <td>{{ $ticket->desc }}</td>
                            <td>{{ $ticket->name }}</td>
                            <td>{{ $ticket->email }}</td>
                            <td>{{ $ticket->department }}</td>
                            <td>
                                @if(isset($ticket->user->first_name))
                                {{ $ticket->user->first_name . ' ' . $ticket->user->last_name }}
                                @endif
                            </td>
                            <td>{{ $ticket->created_at }}</td>
                            <td><a href="{{ action('TicketsController@show', [$ticket->id]) }}">View</a></td>
                            <td>
                                <form action="/tickets/{{ $ticket->id }}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input name="_method" type="hidden" value="PUT">
                                    <select class="form-control" name="user_id" onchange="this.form.submit()">

                                        {{ $users = \App\User::all() }}

                                        <option disabled selected></option>

                                            @foreach($users as $user)
                                                <option value={{ $user->id }}>{{ $user->first_name . ' ' . $user->last_name }}</option>
                                            @endforeach

                                    </select>

                                </form>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>