<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Tickets </h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th>#</th>
                        <th>Details </th>
                        <th>Creator </th>
                        <th>Creator Email </th>
                        <th>Intended Department </th>
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
                            <td>{{ substr($ticket->desc,0,50) . '...' }}</td>
                            <td>{{ $ticket->name }}</td>
                            <td>{{ $ticket->email }}</td>
                            <td>
                                <?php
                                    $departmentCategories = \App\Department::all();
                                ?>

                                <form action="/tickets/{{ $ticket->id }}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input name="_method" type="hidden" value="PUT">
                                    <select class="form-control" style="height: 25px" name="department_id" onchange="this.form.submit()">

                                        @foreach($departmentCategories as $departmentCategory)

                                            @if($departmentCategory->id == $ticket->department->id)
                                                <option selected="selected" value="{{ $departmentCategory->id }}"> {{ $departmentCategory->department }}</option>
                                            @else
                                            <option value="{{ $departmentCategory->id }}"> {{ $departmentCategory->department }} </option>
                                            @endif

                                        @endforeach
                                    </select>

                                </form>
                            </td>
                            <td>
                                @if(isset($ticket->user->first_name))
                                <a href="/profile/{{ $ticket->user->username }}">{{ $ticket->user->first_name . ' ' . $ticket->user->last_name }}</a>
                                @endif
                            </td>
                            <td>{{ $ticket->created_at }}</td>
                            <td><a href="{{ action('TicketsController@show', [$ticket->id]) }}">View</a></td>
                            <td>
                                <form action="/tickets/{{ $ticket->id }}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input name="_method" type="hidden" value="PUT">
                                    <select class="form-control" style="height: 25px" name="user_id" onchange="this.form.submit()">

                                        <?php
                                            $users = \App\User::all();
                                        ?>

                                        <option disabled selected></option>
                                            @foreach($departmentCategories as $departmentCategory)
                                                <optgroup label="{{ $departmentCategory->department }}">

                                                    @foreach($departmentCategory->users as $user)
                                                        <option value={{ $user->id }}>{{ $user->first_name . ' ' . $user->last_name }}</option>
                                                    @endforeach

                                                </optgroup>
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