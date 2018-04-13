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
                @php
                    $show=$saved_package->show_front;
                    $order=$saved_package->order;
                    if ($saved_package->image && $saved_package->image !='' && file_exists( public_path() . '/images/' . $saved_package->image)) {
                        $img = 'images/' . $saved_package->image ;
                    } 
                     if ($saved_package->icon && $saved_package->icon !='' && file_exists( public_path() . '/images/' . $saved_package->icon)) {
                        $icon = 'images/' . $saved_package->icon ;
                    } 
                @endphp

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
                                {{ Form::label('title', 'Title', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                    {{ Form::text('title', null, array('class'=>'form-control','placeholder'=>'Title'))}}
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('type', 'Type', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                    {{ Form::text('type', null, array('class'=>'form-control','placeholder'=>'Type'))}}
                                    <span class="text-danger">{{ $errors->first('type') }}</span>
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
                                {{ Form::label('short_description', 'Short Description', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                    {{ Form::textarea('short_description', null, array('class'=>'form-control','placeholder'=>'Short Description','rows'=>3))}}
                                </div>
                            </div>
                           <div class="form-group row">
                                {{ Form::label('description', 'Description', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                    {{ Form::textarea('description', null, array('class'=>'form-control summernote','placeholder'=>'Description'))}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('email', 'Mail', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                     {{ Form::text('email', null, array('class'=>'form-control','placeholder'=>'Mail'))}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('phone', 'Phone', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                     {{ Form::number('phone', null, array('class'=>'form-control','placeholder'=>'Phone'))}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('image', 'Image', array('class'=>'col-2 col-form-label'))}}
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
                           <!--   <div class="form-group row">
                                {{ Form::label('show_front', 'Show in Front', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                    <div class="radio radio-success form-check-inline">
                                        {{ Form::radio('show_front', 1, 1==$show, ['class' => '','id'=>'show']) }} 
                                        <label for="show_front"> Yes </label>
                                    </div>
                                    <div class="radio radio-danger form-check-inline">
                                        {{ Form::radio('show_front', 0, 0==$show, ['class' => '','id'=>'hide']) }} 
                                        <label for="hide"> No </label>
                                    </div>
                                </div>
                            </div>
                        
                        
                            <div class="form-group row">
                                {{ Form::label('icon', 'Icon', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="{{ asset($icon)}}" alt="image" />
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        <div>
                                            <button type="button" class="btn btn-custom btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select Icon</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                {{ Form::file('icon', array('class'=>'btn-light'))}}
                                            </button>
                                        </div>
                                    </div>
                                    <span class="text-danger">{{ $errors->first('icon') }}</span>
                                </div>
                            </div> -->
                        
                        
<!--                            -->
                            <!-- <div class="form-group row">
                                {{ Form::label('order', 'Sort Order', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                    {{ Form::number('order', $order, array('class'=>'form-control','placeholder'=>'Sort Order'))}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('meta_title', 'Meta Tag Title', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                    {{ Form::text('meta_title', null, array('class'=>'form-control','placeholder'=>'Meta Title'))}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('meta_description', 'Meta Tag description', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                    {{ Form::textarea('meta_description', null, array('class'=>'form-control','placeholder'=>'Meta Tag description','rows'=>3))}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('meta_keywords', 'Meta Tag keywords', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                    {{ Form::textarea('meta_keywords', null, array('class'=>'form-control','placeholder'=>'Meta Tag keywords','rows'=>3))}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('status', 'Status', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                    <div class="radio radio-success form-check-inline">
                                        {{ Form::radio('status', 1, 1==1, ['class' => '','id'=>'st-active']) }} 
                                        <label for="st-active"> Active </label>
                                    </div>
                                    <div class="radio radio-danger form-check-inline">
                                        {{ Form::radio('status', 0, 0==1, ['class' => '','id'=>'st-inactive']) }} 
                                        <label for="st-inactive"> No </label>
                                    </div>
                                </div>
                            </div> -->
                            
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
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            var lat = place.geometry.location.lat();
            var lng = place.geometry.location.lat();
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