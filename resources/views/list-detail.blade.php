@include('layouts.header')
    <div class="detail-section">
        <div class="container-fluid">
            <div class="row">
                <div class="package_detail">
                    <img src="http://www.demo1.webbera.host/assets//uploads/2017/03/BANANA_Principale-1500x876.jpg" alt="">
                    <div class="details">
                        <h5>{{$package->title}}</h5>
                        <h6>{{$package->short_description}}</h6>
                    </div>
                </div>
            </div>
            <div class="row second_description">
                <div class="col-md-8 detail_desc">
                    <div class="description">
                        <h6>Banana Island, a 20-minute luxury ferry ride from Doha, Banana Island Resort features 800-metre private beach,</h6>
                    </div><br/><br/>
                    <div class="description">
                        <h6>Rate and write a review</h6>
                    </div>
                </div>
                <div class="col-md-4 map_handler">
                    <div class="map_div">
                        <div id="map-container">
                        </div>
                        <h5>Banana Island Doha QA</h5>
                        <a href="">Get directions</a>
                    </div><br/><br/>
                    <div class="map_div">
                        <h4> Write a review </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- // end .section -->
    <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map-container'), {
              center: {lat: -34.397, lng: 150.644},
              zoom: 8
            });
            var latlng = {lat: -34.397, lng: 150.644};
            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                title: 'Click to zoom'
            });
        }
    </script>
@include('layouts.footer')