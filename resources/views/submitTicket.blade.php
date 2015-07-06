<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login 2</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="loginColumns animated fadeInDown">
    <h3>Welcome to the SBTS Helpdesk</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="ibox-content">

                <form method="POST" action="/create" class="m-t">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                            <input type="text" name="name" placeholder="Your Name" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" placeholder="Your Email" class="form-control">
                    </div>

                    <div class="form-group">

                       <select class="form-control m-b" name="department">
                                <option value="" disable selected>Select a Department</option>
                                <option>Campus Technology</option>
                                <option>Accounting</option>
                                <option>Admissions</option>
                                <option>Academic Records</option>
                            </select><span class="help-block m-b-none">Please select a department that you feel can best help with your issue.</span>


                    </div>

                    <div class="form-group">


                        <textarea style="height:200px" type="text" placeholder="Describe Your Issue" name="desc" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary block full-width m-b">Create Ticket</button>
                    <button class="btn btn-primary block full-width m-b btn-white" type="submit">Cancel</button>

                    <p class="text-muted text-center"><small>Are you apart of the SBTS Helpdesk?</small></p>
                    <a class="btn btn-sm btn-white btn-block" href="/auth/login">Login</a>
                </form>
                <p class="m-t">
                    <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
                </p>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            The Southern Baptist Theological Seminary
        </div>
        <div class="col-md-6 text-right">
            <small>© 2014-2015</small>
        </div>
    </div>
</div>

</body>

</html>
