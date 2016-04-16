 <!DOCTYPE html>
<html lang="en">

<head>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="{{ asset('/css/stylish-portfolio.css') }}" rel="stylesheet" type="text/css" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="homebackground">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">E-Mail Address</label>

                                        <div class="col-md-7">
                                            <input type="email" class="form-control" name="email" value="">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Password</label>

                                        <div class="col-md-7">
                                            <input type="password" class="form-control" name="password">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember"> Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-btn fa-sign-in"></i>Login
                                            </button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</body>

</html>
