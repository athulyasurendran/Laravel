{{App\Http\Controllers\FrontController::get_header()}}
    <header class="bg-gradient" id="home">
        <div class="container mt-5">
            <h1>Explore the beauty of Qatar</h1>
            <p class="tagline">Find great places in Qatar to stay, eat, shop, or visit.</p>
        </div>
        <div class="img-holder mt-3 search_control">

            {!! Form::open(['route' => array('search') ,'method' => 'GET' ,'files' => true]) !!}
                <div class="form-group row">
                    <div class="col-12">
                        {{ Form::text('location', null, array('class'=>'input', 'id'=>'searchloc', 'placeholder'=>'What are you looking for?'))}}
                        {{ Form::submit('Search', array('class'=>'button'))}}
                    </div>
                </div>
                <input type="hidden" name="latitude" id="lat">
                <input type="hidden" name="longitude" id="lng">
            {!! Form::close() !!}
        </div>
    </header>

    <div class="client-logos">
        <div class="container text-center">
            <a href="http://www.demo1.webbera.host/listing-category/shopping/">
                <span class="cat__icon"><svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg"><g transform="translate(-14 -12)" fill="none" fill-rule="evenodd"><circle stroke="currentColor" stroke-width="2" cx="24" cy="24" r="24"></circle><path d="M33.333 19.065h-4V17.03c0-2.602-2.18-5.03-4.766-5.03C21.98 12 20 14.428 20 17.03v2.035h-4l-2 14.912h22l-2.667-14.912zm-12-2.033c0-1.998 1.248-3.462 3.234-3.462 1.985 0 3.433 1.464 3.433 3.462v2.033h-6.667v-2.033zm-4 3.388H20v.68c-.36.233-.6.64-.6 1.104 0 .722.58 1.308 1.292 1.308.714 0 1.292-.586 1.292-1.308 0-.486-.262-.91-.65-1.135v-.65H28v.91c-.206.23-.333.537-.333.874 0 .722.578 1.308 1.292 1.308.712 0 1.29-.586 1.29-1.308 0-.59-.386-1.09-.916-1.252v-.532H32l2 12.2H16l1.334-12.2z" fill="currentColor"></path></g></svg></span>            
            <span class="cat__text">Shop</span>
            </a>
            <a href="http://www.demo1.webbera.host/listing-category/shopping/">
                <span class="cat__icon"><svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg"><g transform="translate(-14 -12)" fill="none" fill-rule="evenodd"><circle stroke="currentColor" stroke-width="2" cx="24" cy="24" r="24"></circle><path d="M33.333 19.065h-4V17.03c0-2.602-2.18-5.03-4.766-5.03C21.98 12 20 14.428 20 17.03v2.035h-4l-2 14.912h22l-2.667-14.912zm-12-2.033c0-1.998 1.248-3.462 3.234-3.462 1.985 0 3.433 1.464 3.433 3.462v2.033h-6.667v-2.033zm-4 3.388H20v.68c-.36.233-.6.64-.6 1.104 0 .722.58 1.308 1.292 1.308.714 0 1.292-.586 1.292-1.308 0-.486-.262-.91-.65-1.135v-.65H28v.91c-.206.23-.333.537-.333.874 0 .722.578 1.308 1.292 1.308.712 0 1.29-.586 1.29-1.308 0-.59-.386-1.09-.916-1.252v-.532H32l2 12.2H16l1.334-12.2z" fill="currentColor"></path></g></svg></span>            
            <span class="cat__text">Eat</span>
            </a>
            <a href="http://www.demo1.webbera.host/listing-category/shopping/">
                <span class="cat__icon"><svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg"><g transform="translate(-14 -12)" fill="none" fill-rule="evenodd"><circle stroke="currentColor" stroke-width="2" cx="24" cy="24" r="24"></circle><path d="M33.333 19.065h-4V17.03c0-2.602-2.18-5.03-4.766-5.03C21.98 12 20 14.428 20 17.03v2.035h-4l-2 14.912h22l-2.667-14.912zm-12-2.033c0-1.998 1.248-3.462 3.234-3.462 1.985 0 3.433 1.464 3.433 3.462v2.033h-6.667v-2.033zm-4 3.388H20v.68c-.36.233-.6.64-.6 1.104 0 .722.58 1.308 1.292 1.308.714 0 1.292-.586 1.292-1.308 0-.486-.262-.91-.65-1.135v-.65H28v.91c-.206.23-.333.537-.333.874 0 .722.578 1.308 1.292 1.308.712 0 1.29-.586 1.29-1.308 0-.59-.386-1.09-.916-1.252v-.532H32l2 12.2H16l1.334-12.2z" fill="currentColor"></path></g></svg></span>            
            <span class="cat__text">Stay</span>
            </a>
            <a href="http://www.demo1.webbera.host/listing-category/shopping/">
                <span class="cat__icon"><svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg"><g transform="translate(-14 -12)" fill="none" fill-rule="evenodd"><circle stroke="currentColor" stroke-width="2" cx="24" cy="24" r="24"></circle><path d="M33.333 19.065h-4V17.03c0-2.602-2.18-5.03-4.766-5.03C21.98 12 20 14.428 20 17.03v2.035h-4l-2 14.912h22l-2.667-14.912zm-12-2.033c0-1.998 1.248-3.462 3.234-3.462 1.985 0 3.433 1.464 3.433 3.462v2.033h-6.667v-2.033zm-4 3.388H20v.68c-.36.233-.6.64-.6 1.104 0 .722.58 1.308 1.292 1.308.714 0 1.292-.586 1.292-1.308 0-.486-.262-.91-.65-1.135v-.65H28v.91c-.206.23-.333.537-.333.874 0 .722.578 1.308 1.292 1.308.712 0 1.29-.586 1.29-1.308 0-.59-.386-1.09-.916-1.252v-.532H32l2 12.2H16l1.334-12.2z" fill="currentColor"></path></g></svg></span>            
            <span class="cat__text">Visit</span>
            </a>
            <a href="http://www.demo1.webbera.host/listing-category/shopping/">
                <span class="cat__icon"><svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg"><g transform="translate(-14 -12)" fill="none" fill-rule="evenodd"><circle stroke="currentColor" stroke-width="2" cx="24" cy="24" r="24"></circle><path d="M33.333 19.065h-4V17.03c0-2.602-2.18-5.03-4.766-5.03C21.98 12 20 14.428 20 17.03v2.035h-4l-2 14.912h22l-2.667-14.912zm-12-2.033c0-1.998 1.248-3.462 3.234-3.462 1.985 0 3.433 1.464 3.433 3.462v2.033h-6.667v-2.033zm-4 3.388H20v.68c-.36.233-.6.64-.6 1.104 0 .722.58 1.308 1.292 1.308.714 0 1.292-.586 1.292-1.308 0-.486-.262-.91-.65-1.135v-.65H28v.91c-.206.23-.333.537-.333.874 0 .722.578 1.308 1.292 1.308.712 0 1.29-.586 1.29-1.308 0-.59-.386-1.09-.916-1.252v-.532H32l2 12.2H16l1.334-12.2z" fill="currentColor"></path></g></svg></span>            
            <span class="cat__text">Events</span>
            </a>
            <a href="http://www.demo1.webbera.host/listing-category/shopping/">
                <span class="cat__icon"><svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg"><g transform="translate(-14 -12)" fill="none" fill-rule="evenodd"><circle stroke="currentColor" stroke-width="2" cx="24" cy="24" r="24"></circle><path d="M33.333 19.065h-4V17.03c0-2.602-2.18-5.03-4.766-5.03C21.98 12 20 14.428 20 17.03v2.035h-4l-2 14.912h22l-2.667-14.912zm-12-2.033c0-1.998 1.248-3.462 3.234-3.462 1.985 0 3.433 1.464 3.433 3.462v2.033h-6.667v-2.033zm-4 3.388H20v.68c-.36.233-.6.64-.6 1.104 0 .722.58 1.308 1.292 1.308.714 0 1.292-.586 1.292-1.308 0-.486-.262-.91-.65-1.135v-.65H28v.91c-.206.23-.333.537-.333.874 0 .722.578 1.308 1.292 1.308.712 0 1.29-.586 1.29-1.308 0-.59-.386-1.09-.916-1.252v-.532H32l2 12.2H16l1.334-12.2z" fill="currentColor"></path></g></svg></span>            
            <span class="cat__text">Services</span>
            </a>
            <a href="http://www.demo1.webbera.host/listing-category/shopping/">
                <span class="cat__icon"><svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg"><g transform="translate(-14 -12)" fill="none" fill-rule="evenodd"><circle stroke="currentColor" stroke-width="2" cx="24" cy="24" r="24"></circle><path d="M33.333 19.065h-4V17.03c0-2.602-2.18-5.03-4.766-5.03C21.98 12 20 14.428 20 17.03v2.035h-4l-2 14.912h22l-2.667-14.912zm-12-2.033c0-1.998 1.248-3.462 3.234-3.462 1.985 0 3.433 1.464 3.433 3.462v2.033h-6.667v-2.033zm-4 3.388H20v.68c-.36.233-.6.64-.6 1.104 0 .722.58 1.308 1.292 1.308.714 0 1.292-.586 1.292-1.308 0-.486-.262-.91-.65-1.135v-.65H28v.91c-.206.23-.333.537-.333.874 0 .722.578 1.308 1.292 1.308.712 0 1.29-.586 1.29-1.308 0-.59-.386-1.09-.916-1.252v-.532H32l2 12.2H16l1.334-12.2z" fill="currentColor"></path></g></svg></span>            
            <span class="cat__text">Travel</span>
            </a>
        </div>
    </div>

    <div class="section light-bg" id="features">
        <div class="container">
            <div class="section-title">
                <h3>Features you love</h3>
            </div>

            <div class="row">
                @foreach($packages as $package)
                    <div class="col-6 col-lg-3 package_list">
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
    <!-- // end .section -->
    <div class="section">
        <div class="container">
            <div class="section-title">
                <h3>Best in Qatar</h3>
                <h6>Explore some of the best from around Qatar.</h6>
            </div>
            <div class="row">
                @foreach($packages as $package)
                    <div class="col-6 col-lg-3 package_list">
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
    <!-- // end .section -->

    <div class="section light-bg">
        <div class="container">
            <div class="section-title">
                <h3>Latest Posts</h3>
                <h6>Fresh articles from the blog</h6>
            </div>
            <div class="row">
                @foreach($packages as $package)
                    <div class="col-6 col-lg-3 package_list">
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
    <!-- // end .section -->

    <div class="section" id="gallery">
        <div class="container">
            <div class="section-title">
                <small>GALLERY</small>
                <h3>App Screenshots</h3>
            </div>

            <div class="img-gallery owl-carousel owl-theme">
                <img src="images/screen1.jpg" alt="image">
                <img src="images/screen2.jpg" alt="image">
                <img src="images/screen3.jpg" alt="image">
                <img src="images/screen1.jpg" alt="image">
            </div>

        </div>

    </div>
    <!-- // end .section -->

    <div class="section bg-gradient">
        <div class="container">
            <div class="call-to-action">

                <div class="box-icon"><span class="ti-mobile gradient-fill ti-3x"></span></div>
                <h2>Download Anywhere</h2>
                <p class="tagline">Available for all major mobile and desktop platforms. Rapidiously visualize optimal ROI rather than enterprise-wide methods of empowerment. </p>
                <div class="my-4">

                    <a href="#" class="btn btn-light"><img src="images/appleicon.png" alt="icon"> App Store</a>
                    <a href="#" class="btn btn-light"><img src="images/playicon.png" alt="icon"> Google play</a>
                </div>
                <p class="text-primary"><small><i>*Works on iOS 10.0.5+, Android Kitkat and above. </i></small></p>
            </div>
        </div>

    </div>
    <!-- // end .section -->

    <div class="light-bg py-5" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left">
                    <p class="mb-2"> <span class="ti-location-pin mr-2"></span> 1485 Pacific St, Brooklyn, NY 11216 USA</p>
                    <div class=" d-block d-sm-inline-block">
                        <p class="mb-2">
                            <span class="ti-email mr-2"></span> <a class="mr-4" href="mailto:support@mobileapp.com">support@mobileapp.com</a>
                        </p>
                    </div>
                    <div class="d-block d-sm-inline-block">
                        <p class="mb-0">
                            <span class="ti-headphone-alt mr-2"></span> <a href="tel:51836362800">518-3636-2800</a>
                        </p>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="social-icons">
                        <a href="#"><span class="ti-facebook"></span></a>
                        <a href="#"><span class="ti-twitter-alt"></span></a>
                        <a href="#"><span class="ti-instagram"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    function initMap() {
        var input = document.getElementById('searchloc');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.setComponentRestrictions(
        {'country': ['qa']});
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            var lat = place.geometry.location.lat();
            var lng = place.geometry.location.lng();
            $("#lat").val(lat);
            $("#lng").val(lng)
        });
    }
</script>
    @include('layouts.footer')