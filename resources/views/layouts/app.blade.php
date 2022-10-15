<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
</html>


<!doctype html>
<html lang="en">

<head>
    <title>IAA - Billing System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Library - Backend developer possition task">
    <meta name="author" content="Erick Lyimo, eric.lyimo29@gmail.com">
    <meta name="csrf-token" content="{{csrf_token()}}" />

    <link rel="icon" href="{{asset('app/images/favicon.png')}}" type="image/x-icon">

    <link rel="stylesheet" href="{{asset('app/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/main.css')}}">
    

    <style>
        .demo-card label{ display: block; position: relative;}
        .demo-card .col-lg-4{ margin-bottom: 30px;}
    </style>
</head>

<body data-theme="light" class="font-ubuntu">
<div id="wrapper" class="theme-green">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="{{asset('app/images/favicon.png')}}" width="48" height="48" alt="ICAS"></div>
            <p>Please wait...</p>
        </div>
    </div>

    <!-- Top navbar div start -->
    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-brand">
                <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-bars"></i></button>
                <button type="button" class="btn-toggle-fullwidth"><i class="fa fa-bars"></i></button>
                <a href="{{route('home')}}">Library</a>
            </div>

            <div class="navbar-right">
                <form id="navbar-search" class="navbar-form search-form">
                    <input value="" class="form-control" placeholder="Search here..." type="text">
                    <button type="button" class="btn btn-default"><i class="fa fa-magnifier"></i></button>
                </form>

                <div id="navbar-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ route('logout') }}" class="icon-menu"><i class="fa fa-power-off"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- main left menu -->
    <div id="left-sidebar" class="sidebar">
        <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-arrow-left"></i></button>
        <div class="sidebar-scroll">
            <div class="user-account">
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{Auth::user()->name}}</strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account">
                        <li><a href="#"><i class="fa fa-user"></i>My Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}"><i class="fa fa-power-off"></i>Logout</a></li>
                    </ul>
                </div>
            </div>

            <!-- Tab panes -->
            <div class="tab-content padding-0">
                <div class="tab-pane active" id="menu">
                    <nav id="left-sidebar-nav" class="sidebar-nav">
                        <ul class="metismenu li_animation_delay">
                            @include('includes.nav')
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div id="main-content">

            @include('includes.alert.error')
            @include('includes.alert.errors')
            @include('includes.alert.success')
            @yield('content')

        </div>

    </div>

</div>
    <script src="{{asset('app/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('app/js/pages/tables/jquery-datatable.js')}}"></script>
    <script src="{{asset('app/bundles/libscripts.bundle.js')}}"></script>
    <script src="{{asset('app/bundles/mainscripts.bundle.js')}}"></script>
    <script src="{{asset('app/bundles/datatablescripts.bundle.js')}}"></script>
    <script src="{{asset('app/bundles/vendorscripts.bundle.js')}}"></script>
</body>
</html>