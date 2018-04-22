@extends('admin.layout.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            @php
                $show=1;
                $img='admin/images/small/default.jpg';
                $icon='admin/images/small/default.jpg';                
                $order=0;
            @endphp
            @if(isset($saved_package) && isset($saved_package->id) && $saved_package->id >0)
                <h4 class="m-t-0 header-title">Edit Package</h4>
            
                @else
                    <h4 class="m-t-0 header-title">Add Package</h4>
                @php
                    
                @endphp
                @endif
            <p class="text-muted m-b-30 font-14">

            </p>
            <div class="mb-3">
                <div class="row">

                    <div class="offset-9 col-3">
                        <a class="btn btn-secondary waves-light waves-effect pull-right" href="{{route('package.index')}}"><i class="mdi mdi-keyboard-backspace"></i> Back</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        @if(count($errors))
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <br/>
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(isset($saved_package) && isset($saved_package->id) && $saved_package->id >0)
                            {!! Form::model($saved_package,['route' => ['package.update', $saved_package->id] ,'method' => 'PATCH' ,'files' => true]) !!}
                        @else
                            {!! Form::open(['route' => 'package.store' ,'method' => 'post' ,'files' => true]) !!}
                        @endif
                        
                            <div class="form-group row">
                                {{ Form::label('title', 'Name', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                    {{ Form::text('title', null, array('class'=>'form-control','placeholder'=>'Name'))}}
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('description', 'Description', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                    {{ Form::textarea('description', null, array('class'=>'form-control summernote','placeholder'=>'Description'))}}
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('location', 'Location', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                    {{ Form::text('location', null, array('class'=>'form-control','placeholder'=>'Location', 'id'=>'locationinput'))}}
                                    <span class="text-danger">{{ $errors->first('location') }}</span>
                                </div>
                            </div>
                            <div class="">
                                <div class="col-10">
                                    {{ Form::hidden('lat', null, array('class'=>'form-control', 'id'=>'lat'))}}
                                </div>
                            </div>
                            <div class="">
                                <div class="col-10">
                                    {{ Form::hidden('lng', null, array('class'=>'form-control', 'id'=>'lng'))}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('phone', 'Phone', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                     {{ Form::number('phone', null, array('class'=>'form-control','placeholder'=>'Phone'))}}
                                     <span class="text-danger">{{ $errors->first('phone') }}</span>
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                {{ Form::label('type', 'Type', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                    {{ Form::text('type', null, array('class'=>'form-control','placeholder'=>'Type'))}}
                                    <span class="text-danger">{{ $errors->first('type') }}</span>
                                </div>
                            </div>-->
                            <div class="form-group row">
                                {{ Form::label('company_tagline', 'Company Tagline', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                     {{ Form::text('company_tagline', null, array('class'=>'form-control','placeholder'=>'Company Tagline'))}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('company_email', 'Company Mail', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                     {{ Form::text('company_email', null, array('class'=>'form-control','placeholder'=>'Company Mail'))}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('company_website', 'Company Website', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                     {{ Form::text('company_website', null, array('class'=>'form-control','placeholder'=>'Company Website'))}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('company_facebbok', 'Facebook', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                     {{ Form::text('company_facebbok', null, array('class'=>'form-control','placeholder'=>'Facebook'))}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('company_twitter', 'Twitter', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                     {{ Form::text('company_twitter', null, array('class'=>'form-control','placeholder'=>'Twitter'))}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('company_insta', 'Instagram', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                     {{ Form::text('company_insta', null, array('class'=>'form-control','placeholder'=>'Instagram'))}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('rating', 'Rate', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                     {{ Form::text('rating', null, array('class'=>'form-control','placeholder'=>'Rate'))}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('image', 'Background Image', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="{{ asset($img)}}" alt="image" />
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        <div>
                                            <button type="button" class="btn btn-custom btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                {{ Form::file('image', array('class'=>'btn-light'))}}
                                            </button>
                                        </div>
                                    </div>
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('profileImage', 'Profile Image', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="{{ asset($img)}}" alt="image" />
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        <div>
                                            <button type="button" class="btn btn-custom btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                {{ Form::file('profileimage', array('class'=>'btn-light'))}}
                                            </button>
                                        </div>
                                    </div>
                                    <span class="text-danger">{{ $errors->first('profileimage') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-2 col-10 ">
                                    {{ Form::submit('Add', array('class'=>'btn btn-info pull-right'))}}
                                </div>
                            </div>
                            
                        {!! Form::close() !!}
                    </div>
                </div>
                
            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>
<!-- end row -->
@endsection
@section('jsfiles')
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{ asset('plugins/select2/js/select2.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
<script type="text/javascript">
   (function ($) {
        var input = document.getElementById('locationinput');
        console.log(input);
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            var lat = place.geometry.location.lat();
            var lng = place.geometry.location.lng();
            $("#lat").val(lat);
            $("#lng").val(lng);
        });

        $('.summernote').summernote({
            height: 150,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false                 // set focus to editable area after initializing summernote
        });
   })(jQuery)
</script>
@endsection
@section('cssfiles')
<link href="{{ asset('plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
<link href="{{ asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{ asset('plugins/bootstrap-fileupload/bootstrap-fileupload.css')}}" rel="stylesheet">
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpYrBVXnKTS2H0zulB8P3AY-ZCOtcBMt0&libraries=places"
async defer></script>

@endsection