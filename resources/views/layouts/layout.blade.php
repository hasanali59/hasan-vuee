<!DOCTYPE html>
<html lang="en">
<head>
    <title>Right Attitude CRM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link href="/assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link type="text/css" href="/assets/css/argon.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    <style>
        .card>.card-header{
            background-color: #641E16;
            border-color: #641E16;
            color: white;
        }
        .btn-info{
            background-color: #641E16;
            border-color: #641E16;
        }
        .btn-info:focus {
            background-color: #641E16;
            border-color: #641E16;
        }
        .navbar-inverse {
            background-color: #641E16;
            border-color: #641E16;
            border-radius: 0;
        }
        .table thead th{
            vertical-align: middle;
            padding: 10px;
            font-size: 14px;
        }

        tr{
            font-size: 14px;
        }

        .bg-default{
            background-color: #641E16 !important;
        }
    </style>
</head>
<body>

{{--<nav class="navbar navbar-inverse">--}}
    {{--<div class="container-fluid">--}}
        {{--<div class="navbar-header">--}}
            {{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
            {{--</button>--}}
            {{--<a class="navbar-brand" href="#">Right Attitude CRM</a>--}}
        {{--</div>--}}

        {{--<div class="collapse navbar-collapse" id="myNavbar">--}}
        {{--<ul class="nav navbar-nav">--}}
            {{--<li><a href="/dashboard">Dashboard</a></li>--}}
            {{--<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Sales Team <span class="caret"></span></a>--}}
                {{--<ul class="dropdown-menu">--}}
                    {{--<li><a href="/account">Account</a></li>--}}
                    {{--<li><a href="/activity">Activity</a></li>--}}
                    {{--<li><a href="/contatc">Contact</a></li>--}}
                    {{--<li><a href="/opportunity">Opportunity</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Operation Team <span class="caret"></span></a>--}}
                {{--<ul class="dropdown-menu">--}}
                    {{--<li><a href="#">Enrollment Report</a></li>--}}
                    {{--<li><a href="#">Enrollment Request</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Accounting Team <span class="caret"></span></a>--}}
                {{--<ul class="dropdown-menu">--}}
                    {{--<li><a href="#">Account Revenue</a></li>--}}
                    {{--<li><a href="#">Invoice</a></li>--}}
                    {{--<li><a href="#">Quote</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Marketing Team <span class="caret"></span></a>--}}
                {{--<ul class="dropdown-menu">--}}
                    {{--<li><a href="#">Webinar</a></li>--}}
                    {{--<li><a href="#">Promotion</a></li>--}}
                    {{--<li><a href="#">Email Campaign</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}

        {{--</ul>--}}
        {{--<ul class="nav navbar-nav navbar-right">--}}
            {{--<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> {{Session::get('user.name')}} <span class="caret"></span></a>--}}
                {{--<ul class="dropdown-menu">--}}
                    {{--<li><a href="/profile"><span class="glyphicon glyphicon-user"></span> Profile</a></li>--}}
                    {{--<li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</nav>--}}

<nav class="navbar navbar-expand-lg navbar-dark bg-default">
    {{--<div class="container">--}}
        <a class="navbar-brand" href="#">Right Attitude CRM</a>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">Dashboard</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Sales Team
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/account">Account</a>
                    <a class="dropdown-item" href="/activity">Activity</a>
                    <a class="dropdown-item" href="/contact">Contact</a>
                    <a class="dropdown-item" href="/opportunity">Opportunity</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Operation Team
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Enrollment Report</a>
                    <a class="dropdown-item" href="#">Enrollment Request</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Accounting Team
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Account Revenue</a>
                    <a class="dropdown-item" href="#">Invoice</a>
                    <a class="dropdown-item" href="#">Quote</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Marketing Team
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Webinar</a>
                    <a class="dropdown-item" href="#">Promotion</a>
                    <a class="dropdown-item" href="#">Email Campaign</a>
                </div>
            </li>
        </ul>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-default">
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="index.html">
                            <img src="assets/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

            <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-settings-gear-65"></i>
                        <span class="nav-link-inner--text d-lg-none">Settings</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                        <div class="dropdown-item">Welcome <b>{{Session::get('user.name')}}</b></div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/profile">Profile</a>
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </li>
            </ul>

        </div>
    {{--</div>--}}
</nav>

@yield('content')
<!-- Core -->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/popper/popper.min.js"></script>
<script src="/assets/vendor/bootstrap/bootstrap.min.js"></script>

<!-- Theme JS -->
<script src="/assets/js/argon.min.js"></script>
</body>
</html>

