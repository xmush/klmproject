
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{asset('/bootadmin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/bootadmin/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/bootadmin/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('/bootadmin/css/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('/bootadmin/css/bootadmin.min.css')}}">

    <title>Login | BootAdmin</title>
</head>
<body class="bg-light">

        <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-4">
                <h1 class="text-center mb-4">BootAdmin</h1>
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Password">
                            </div>

                            <div class="form-check mb-3">
                                <label class="form-check-label">
                                    <input type="checkbox" name="remember" class="form-check-input">
                                    Remember Me
                                </label>
                            </div>

                            <div class="row">
                                <div class="col pr-2">
                                    <button type="submit" class="btn btn-block btn-primary">Login</button>
                                </div>
                                <div class="col pl-2">
                                    <a class="btn btn-block btn-link" href="#">Forgot Password</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="{{asset('/bootadmin/js/jquery.min.js')}}"></script>
<script src="{{asset('/bootadmin/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/bootadmin/js/datatables.min.js')}}"></script>
<script src="{{asset('/bootadmin/js/moment.min.js')}}"></script>
<script src="{{asset('/bootadmin/js/fullcalendar.min.js')}}"></script>
<script src="{{asset('/bootadmin/js/bootadmin.min.js')}}"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118868344-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-118868344-1');
</script>


</body>
</html>