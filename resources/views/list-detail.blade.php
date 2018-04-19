@include('layouts.header')
    <div class="detail-section">
        <div class="container-fluid">
            <div class="row">
                <div class="package_detail">
                    <img src="{{asset('/images/'.$package->image)}}" alt="">
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
                        <div class="review_box">
                            <div class="form-group row">
                                {{ Form::label('short_description', 'Your Review', array('class'=>'col-12 col-form-label'))}}
                                <div class="col-12">
                                    {{ Form::textarea('short_description', null, array('class'=>'form-control','placeholder'=>'Tell about your experience','rows'=>7))}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('short_description', 'Your overall rating of this listing:', array('class'=>'col-12 col-form-label'))}}
                                <div class="col-12">

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    {{ Form::label('name', 'Name', array('class'=>'col-form-label'))}}
                                    <div class="">
                                        {{ Form::text('name', null, array('class'=>'form-control','placeholder'=>'Name'))}}
                                    </div>
                                </div>
                                <div class="col-6">
                                    {{ Form::label('email', 'Email', array('class'=>'col-form-label'))}}
                                    <div class="">
                                        {{ Form::text('name', null, array('class'=>'form-control','placeholder'=>'Email'))}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    {{ Form::submit('Submit your review', array('class'=>'btn btn-info pull-left'))}}
                                </div>
                            </div>
                        </div>
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
                        <div class="photo_gallery">
                        </div>
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