
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
                <h1 class="text-center mb-4">KLM Project Login</h1>
                <div class="card">
                    <div class="card-body">
                        @if (Session::has('alert'))
                        @if (Session::get('alert.type') == 'danger')
                            <div class="alert alert-danger alert-dismissible" role="alert">
                        @else
                            <div class="alert alert-success alert-dismissible" role="alert">
                        @endif
                            {{Session::get('alert.msg')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        @endif
                        <form action="{{'/login/auth'}}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="name" placeholder="Username">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>

                            <div class="row">
                                <div class="col pr-2">
                                    <button type="submit" class="btn btn-block btn-primary">Login</button>
                                </div>
                                <div class="col pl-2">
                                    <a href="{{route('register')}}" class="btn btn-block btn-secondary">Daftar</a>
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

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-4097235499795154",
    enable_page_level_ads: true
  });
</script>

</body>
</html>