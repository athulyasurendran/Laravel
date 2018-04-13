<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->

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

            .nav-menu {
                background: yellowgreen;
                padding: 10px 0;
            }
        </style>
    </head>

<body data-spy="scroll" data-target="#navbar" data-offset="30">
    <div class="nav-menu fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark navbar-expand-lg">
                        <a class="navbar-brand" href="index.html"><img src="http://www.demo1.webbera.host/assets//uploads/2017/03/logo.png" class="img-fluid" alt="logo"></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"> <a class="nav-link active" href="#home">HOME <span class="sr-only">(current)</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#features">What To Do?</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#gallery">Where To Go?</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#pricing">Directory</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#contact">Qatar</a> </li>
                                <li class="nav-item"><a href="#" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Login</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 content_box">
                    <div class="col-xs12 col-sm-4">
                        <select class="form-control">
                            <option value="1">1</option>
                            <option value="1">1</option>
                            <option value="1">1</option>
                            <option value="1">1</option>
                            <option value="1">1</option>
                        </select>
                    </div><br/>
                    <div class="list_items">
                        <div class="row">
                            @foreach($packages as $package)
                                <div class="col-12 col-lg-6">
                                    <div class="list_item">
                                        <img src="{{asset('/images/'.$package->image)}}" alt="dual phone" height="200px">
                                        <div class="description">
                                             <h4 class="card-title">{{$package->title}}</h4>
                                             <h5 class="card-title">{{$package->short_description}}</h5>
                                             <h5><i class="mdi mdi-map-marker"></i>{{$package->location}}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-5 content_box">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- // end .section -->
    <script>
        var list_items =JSON.parse('<?php echo $packages; ?>') ;
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: -34.397, lng: 150.644},
              zoom: 8
            });
            for(var k =0; k <list_items.length; k++){
                var latlng = {lat: list_items[k].lat, lng: list_items[k].lng};
                var marker = new google.maps.Marker({
                  position: latlng,
                  map: map,
                  title: 'Click to zoom'
                });
            }
        }
    </script>
    <script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('js/script.js')}}"></script>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpYrBVXnKTS2H0zulB8P3AY-ZCOtcBMt0&libraries=places&callback=initMap"
async defer></script>

</body>

</html>
