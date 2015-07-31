@extends('app')

    @section('pageHeader')

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>
                    @if($user->first_name === \Auth::user()->first_name)
                        My
                    @else
                        {{ $user->first_name }}'s
                    @endif

                    Profile

                </h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="/home">Home</a>
                    </li>
                    <li>
                        <a href="">App View</a>
                    </li>
                    <li class="active">
                        <strong>Profile</strong>
                    </li>
                </ol>
            </div>
            <div class="col-sm-8">
                    <div class="title-action">
                        <a href="/{profile}/edit" class="btn btn-primary">Edit Profile</a>
                    </div>
            </div>
        </div>

    @endsection

    @section('pageContent')

        <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Profile Detail</h5>
                        </div>
                        <div>
                            <div class="ibox-content no-padding border-left-right">
                            </div>
                            <div class="ibox-content profile-content">
                                <h4><strong>{{ $user->first_name }} {{ $user->last_name }}</strong></h4>
                                <p><strong>Department:</strong> {{ $user->department->department }}</p>
                                <p><strong>Position title:</strong> {{ $user->position }}</p>
                                <p><i class="fa fa-map-marker"></i> {{ $user->address }}</p>

                                <h5>
                                    About me
                                </h5>
                                <p>
                                    {{ $user->bio }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Activites</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div>
                                <div class="feed-activity-list">

                                    <div class="feed-element">
                                        <a href="#" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/a1.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right text-navy">1m ago</small>
                                            <strong>Kyle Nieber</strong> closed a <strong>ticket</strong>. <br>
                                            <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                                        </div>
                                    </div>

                                    <div class="feed-element">
                                        <a href="#" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/profile.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right">5m ago</small>
                                            <strong>Mary Nieber</strong> started a ticket <br>
                                            <small class="text-muted">Today 5:60 pm - 12.06.2014</small>

                                        </div>
                                    </div>

                                </div>

                                <button class="btn btn-primary btn-block m"><i class="fa fa-arrow-down"></i> Show More</button>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    @endsection



@stop