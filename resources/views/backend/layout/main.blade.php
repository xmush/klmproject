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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        @yield('pagecss')
        <title>
        @yield('pagetitle')            
        </title>
    </head>
    <body class="bg-light">
        @if (Session::has('notif.type') && Session::has('notif.msg'))
            <div id="flash_data" data-type="{{Session::get('notif.type')}}" data-msg="{{Session::get('notif.msg')}}"></div>
        @endif
        <nav class="navbar navbar-expand navbar-dark bg-primary">
            <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
            <a class="navbar-brand" href="{{route('admin.dashboard')}}">Admin Dashboard</a>
            
            <div class="navbar-collapse collapse">
                <ul class="navbar-nav ml-auto">
                    {{-- <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-envelope"></i> 5</a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-bell"></i> 3</a></li> --}}
                    @yield('topnav')
                    <li class="nav-item dropdown">
                        <a href="#" id="dd_user" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{auth()->user()->name}}</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                            {{-- <a href="#" class="dropdown-item">Profile</a> --}}
                            @yield('usertopnav')
                            <a href="{{route('logout')}}" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="d-flex">
            <div class="sidebar sidebar-dark bg-dark">
                <ul class="list-unstyled">
                    {{-- <li><a href="#"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a></li> --}}
                    @yield('pagemenu')

                    <li><a href="{{route('admin.fish_point')}}"><i class="fa fa-fw fa-diamond"></i> Fish Points</a></li>
                    {{-- <li><a href="{{route('admin.champion')}}"><i class="fa fa-fw fa-trophy"></i> Fish Champion</a></li> --}}
                    <li><a href="{{route('admin.grade')}}"><i class="fa fa-fw fa-trophy"></i> Grade Champion</a></li>
                    <li><a href="{{route('admin.regular_champion')}}"><i class="fa fa-fw fa-flag"></i> Regular Champion</a></li>
                    <li><a href="{{route('admin.best_in_size')}}"><i class="fa fa-fw fa-sort-amount-desc"></i> Best In Size</a></li>
                    <li><a href="{{route('admin.rekap_payment')}}"><i class="fa fa-fw fa-money"></i> Rekap Pembayaran</a></li>
                    <li><a href="{{route('admin.print_sticker')}}" target="_blank"><i class="fa fa-fw fa-print"></i> Print Fish Sticker</a></li>
                    <li><a href="{{route('admin.setup_user_pass')}}"><i class="fa fa-fw fa-lock"></i> Ganti Password Peserta</a></li>
                    <li><a href="{{route('admin.setup_pass')}}"><i class="fa fa-fw fa-lock"></i> Ganti Password</a></li>
                    <li><a href="{{route('logout')}}"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>

                </ul>
            </div>

            <div class="content p-4">
                
                    <h5 class="mb-4">
                        @yield('pagebreadcrumb')
                    </h5>

                    @yield('pagecontent')
            </div>
        </div>

    <script src="{{asset('/bootadmin/js/jquery.min.js')}}"></script>
    <script src="{{asset('/bootadmin/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/bootadmin/js/datatables.min.js')}}"></script>
    <script src="{{asset('/bootadmin/js/moment.min.js')}}"></script>
    <script src="{{asset('/bootadmin/js/fullcalendar.min.js')}}"></script>
    <script src="{{asset('/bootadmin/js/bootadmin.min.js')}}"></script>

    @yield('pagejs')
    </body>
</html>