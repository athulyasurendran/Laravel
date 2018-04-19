<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/themify-icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css" />

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .nav-menu{
                background: rgba(39, 39, 62, 0.12941176470588237);
                padding: 0;
            }
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .dropbtn {
                background-color: transparent;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
            }

            .dropdown {
                position: relative;
                display: inline-block;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: white;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }

            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            .dropdown-content a:hover {background-color: #d2d0d0;}

            .dropdown:hover .dropdown-content {
                display: block;
            }

            .dropdown:hover .dropbtn {
                background-color: transparent;
            }
        </style>
    </head>
    <!-- <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
            </div>
        </div>
    </body> -->


    <body data-spy="scroll" data-target="#navbar" data-offset="30">
        <div class="nav-menu fixed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-dark navbar-expand-lg">
                            <a class="navbar-brand" href="#">
                                <img src="http://www.demo1.webbera.host/assets//uploads/2017/03/logo.png" class="img-fluid" alt="logo"></a>
                                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                            <div class="collapse navbar-collapse" id="navbar">
                                <ul class="navbar-nav ml-auto"><!-- 
                                    <li class="nav-item"> <a class="nav-link active" href="#home">HOME <span class="sr-only">(current)</span></a> </li> -->
                                    <div class="dropdown">
                                      <button class="dropbtn nav-link">What To Do?</button>
                                      <div class="dropdown-content">
                                        <a href="{{route('list', 'Boat Ride')}}">Boat Ride</a>
                                        <a href="{{route('list', 'Camel Ride')}}">Camel Ride</a>
                                        <a href="{{route('list', 'Ice Skating')}}">Ice Skating</a>
                                        <a href="{{route('list', 'Water Sports')}}">Water Sports</a>
                                      </div>
                                    </div>
                                    <div class="dropdown">
                                      <button class="dropbtn nav-link">Where To Go?</button>
                                      <div class="dropdown-content">
                                        <a href="#">Al Zubarah</a>
                                        <a href="#">Banana Island</a>
                                        <a href="#">Corniche</a>
                                        <a href="#">Katara</a>
                                        <a href="#">MIA</a>
                                        <a href="#">Souq Waqif</a>
                                        <a href="#">The Pearl</a>
                                      </div>
                                    </div>
                                    <div class="dropdown">
                                      <button class="dropbtn nav-link">Directory</button>
                                    </div>
                                    <div class="dropdown">
                                      <button class="dropbtn nav-link">Qatar</button>
                                    </div>
                                    @if (Auth::check())
                                        <li class="dropdown">
                                            <button class="dropbtn nav-link">
                                                <a href="{{ url('/logout') }}">{{ Auth::user()->name }} <span class="caret"></span></a>
                                            </button>
                                        </li>
                                    @else
                                        <div class="dropdown">
                                          <button class="dropbtn nav-link"><a href="{{ url('/login') }}">Login</a></button>
                                        </div>
                                    @endif
                                    
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div> 
