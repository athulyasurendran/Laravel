@include('layouts.header')
    <br/><div class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 content_box">
                    <div class="col-xs-12 col-sm-4 select_cate">
                        <select class="form-control">
                            <option value="">Any category</option>
                            <option value="1">Arts & Entertainment</option>
                            <option value="2">Art Gallery</option>
                            <option value="3">Movie Theater</option>
                            <option value="4">Museum</option>
                        </select>
                    </div>
                    <div class="list_items right_list">
                        <div class="row result_count">
                            <span>{{sizeof($packages)}} Results</span>
                            <span class="pull-right">Reset</span>
                        </div>
                        <div class="row">
                            @foreach($packages as $package)
                                <div class="col-6 col-lg-6 package_list" id="package_{{$package->id}}">
                                    <div class="list_item">
                                        <img src="{{asset('/images/'.$package->image)}}" alt="dual phone" height="200px">
                                        <div class="description">
                                          <h4 class="card-title">{{$package->title}}</h4>
                                          <h5 class="card-title">{{$package->short_description}}</h5>
                                          <h5><i class="mdi mdi-map-marker"></i>{{$package->location}}</h5>
                                        </div>
                                        <a href="{{route('package-detail', $package->id)}}"><div class="view_more">
                                          <span>View More</span></div></a>
                                      </div>
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


@include('layouts.footer')

     <script>
        
        var list_items =JSON.parse('<?php echo json_encode($packages); ?>') ;
        var map;
        var bounds;
        var marker;
        var infoBubble;
        var markers = [];
        var directionsService;
        var directionsDisplay;

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
            autocomplete.addListener('place_changed', function() {
              var place = autocomplete.getPlace();
              map.setCenter(place.geometry.location);
            });

            bounds = new google.maps.LatLngBounds();
            map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: 25.354826, lng: 51.183884},
              disableDefaultUI: true,
              zoomControl: true,
              zoom: 15,
            });
            for(var k =0; k <list_items.length; k++){
                var latlng = {lat: list_items[k].lat, lng: list_items[k].lng};
                marker = new google.maps.Marker({
                  position: latlng,
                  map: map,
                  title: list_items[k].title,
                  id: 'package_'+list_items[k].id,
                  icon: './images/marker.png'
                });
                createInfoBox(list_items[k]);
                markers.push(marker);
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
                map.setCenter(marker.getPosition())
            }
            if(list_items.length > 1){
              map.fitBounds(bounds);
            }
        }

        function createInfoBox(list_item){
          infoBubble = new InfoBubble({
              map: map,
              content: '<div class="package_list infobox">'+
                            '<div class="list_item">'+
                              '<img src="./images/'+list_item.image+'" alt="dual phone" height="200px">'+
                              '<div class="description">'+
                                ' <h4 class="card-title">'+list_item.title+'</h4>'+
                                  // '<h5 class="card-title">'+list_item.short_description+'</h5>'+
                                  '<h5><i class="mdi mdi-map-marker"></i>'+list_item.location+'</h5>'+
                                  '<button class="btn btn-info" onClick="getDirection('+list_item.lat+', '+list_item.lng+', );">Get directions</button>'+
                            '</div>'+
                          '</div>'+
                        '</div>',
                      position: new google.maps.LatLng(-32.0, 149.0),
                      padding: 0,
                      backgroundColor: '#ffff',
                      borderRadius: 5,
                      arrowSize: 10,
                      borderWidth: 1,
                      borderColor: 'rgb(165, 165, 165)',
                      borderStyle: 'none',
                      disableAutoPan: true,
                      hideCloseButton: true,
                      arrowPosition: 30,
                      arrowStyle: 2,
                      maxWidth: 300,
                      minHeight: 300
                });
        }

        function getDirection(lat, lng){
          directionsService = new google.maps.DirectionsService;
          directionsDisplay = new google.maps.DirectionsRenderer;
          directionsDisplay.setMap(map);
          if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    directionsService.route({
                      origin: {lat: position.coords.latitude, lng: position.coords.longitude},
                      destination: {lat: lat, lng: lng},
                      travelMode: 'DRIVING'
                    }, function(response, status) {
                      if (status === 'OK') {
                        directionsDisplay.setDirections(response);
                      } else {
                        window.alert('Directions request failed due to ' + status);
                      }
                    });
                });
            }else {
                alert("Error");
            }
        }

    </script>

<script>
  $(document).ready(function(){
    $('.package_list').click(function(){
      for(m=0; m<markers.length; m++){
        if(markers[m].id == this.id){
          google.maps.event.trigger(markers[m], 'click');
        }
      }
    });
  });
</script>