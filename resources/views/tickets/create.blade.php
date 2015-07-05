
@extends('app')

    @section('pageHeader')

        @include('partials._pageheader', ['header' => 'Create a Ticket', 'pageLocation' => 'Create A Ticket', 'actionArea' => ''])

    @endsection

    @section('pageContent')
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Create a Ticket <small>sample small text</small></h5>
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
                        <form method="POST" action="/tickets" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group"><label class="col-sm-2 control-label">Your Name</label>

                                <div class="col-sm-10"><input type="text" name="name" class="form-control"></div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Your Email</label>

                                <div class="col-sm-10"><input type="email" name="email" class="form-control"></div>
                            </div>

                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Department</label>

                                <div class="col-sm-10"><select class="form-control m-b" name="department">
                                        <option>Campus Technology</option>
                                        <option>Accounting</option>
                                        <option>Admissions</option>
                                        <option>Academic Records</option>
                                    </select><span class="help-block m-b-none">Please select a department that you feel can best help with your issue.</span>

                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">Describe Your Issue</label>

                                <div class="col-sm-10"><textarea style="height:200px" type="text" name="desc" class="form-control"></textarea></div>
                            </div>

                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-white" type="submit">Cancel</button>
                                    <button class="btn btn-primary" type="submit">Create Ticket</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

    @endsection

@stop
