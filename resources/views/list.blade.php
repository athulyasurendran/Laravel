@include('layouts.header')
    <br/><div class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 content_box">
                    <div class="col-xs-12 col-sm-4 select_cate">
                        <select class="form-control">
                            <option value="1">Any category</option>
                            <option value="1">1</option>
                            <option value="1">1</option>
                            <option value="1">1</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                    <div class="list_items">
                        <div class="row result_count">
                            <span>{{sizeof($packages)}} Results</span>
                            <span class="pull-right">Reset</span>
                        </div>
                        <div class="row">
                            @foreach($packages as $package)
                                <div class="col-6 col-lg-6 package_list" id="package_{{$package->id}}">
                                    <a href="{{route('package-detail')}}">
                                        <div class="list_item">
                                            <img src="{{asset('/images/'.$package->image)}}" alt="dual phone" height="200px">
                                            <div class="description">
                                                 <h4 class="card-title">{{$package->title}}</h4>
                                                 <h5 class="card-title">{{$package->short_description}}</h5>
                                                 <h5><i class="mdi mdi-map-marker"></i>{{$package->location}}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-5 content_box content_map">
                    <input type="text" placeholder="Search location" class="form-control" id="pac-input">
                    <a href="#" onClick="findMe()" class="findme  js-find-me"></a>
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>

     <script>
        var list_items =JSON.parse('<?php echo $packages; ?>') ;
        var map;
        var bounds;
        var marker;
        var infoBubble;

        function findMe(){
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var homeMarker = new google.maps.Marker({
                      position: {lat: position.coords.latitude, lng: position.coords.longitude},
                      map: map,
                      title: "Home",
                      //icon: 'http://gaganr.in/wp-content/uploads/2016/02/128-128-258ce7d245cb4130fc4961f3e0c58060.png'
                    });
                    map.setCenter(homeMarker.getPosition())
                });
            }else {
                // Browser doesn't support Geolocation
                alert("Error");
            }
        }
        function initMap() {
            var input = document.getElementById('pac-input');
            var autocomplete = new google.maps.places.Autocomplete(input);

            bounds = new google.maps.LatLngBounds();
            
            map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: 25.354826, lng: 51.183884},
              zoom: 8,
              disableDefaultUI: true,
              zoomControl: true,
            });
            for(var k =0; k <list_items.length; k++){
                var latlng = {lat: list_items[k].lat, lng: list_items[k].lng};
                marker = new google.maps.Marker({
                  position: latlng,
                  map: map,
                  title: list_items[k].title,
                  id: 'package_'+list_items[k].id,
                  icon: 'http://gaganr.in/wp-content/uploads/2016/02/128-128-258ce7d245cb4130fc4961f3e0c58060.png'
                });
                infoBubble = new InfoBubble({
                      map: map,
                      content: '<div class="package_list">'+
                                    '<a href="">'+
                                        '<div class="list_item">'+
                                            '<img src="http://www.demo1.webbera.host/assets//uploads/2017/03/BANANA_Principale-1500x876-450x263.jpg" alt="dual phone" height="200px">'+
                                            '<div class="description">'+
                                                ' <h4 class="card-title">'+list_items[k].title+'</h4>'+
                                                 '<h5 class="card-title">'+list_items[k].short_description+'</h5>'+
                                                 '<h5><i class="mdi mdi-map-marker"></i>'+list_items[k].location+'</h5>'+
                                            '</div>'+
                                        '</div>'+
                                    '</a>'+
                                '</div>',
                      position: new google.maps.LatLng(-32.0, 149.0),
                      shadowStyle: 1,
                      padding: 0,
                      backgroundColor: 'rgb(57,57,57)',
                      borderRadius: 5,
                      arrowSize: 10,
                      borderWidth: 1,
                      borderColor: 'rgb(165, 165, 165)',
                      borderStyle: 'none',
                      disableAutoPan: true,
                      hideCloseButton: true,
                      arrowPosition: 30,
                      backgroundClassName: 'transparent',
                      arrowStyle: 2,
                      maxWidth: 300
                });

                marker.addListener('click', function() {
                  if($( ".package_list" ).hasClass( "active" )){
                    $( ".package_list" ).removeClass( "active" );
                    $("#"+this.id).addClass("active");
                  }else{
                    $("#"+this.id).addClass("active");
                  }
                  map.setCenter(this.getPosition());
                  infoBubble.open(map, this);
                });

                bounds.extend(latlng);
            }
            map.fitBounds(bounds);
        }

    </script>
@include('layouts.footer')