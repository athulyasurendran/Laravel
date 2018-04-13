@extends('admin.layout.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            @php
                $show=1;
                $img='admin/images/small/default.jpg';
                $order=0;
            @endphp
            @if(isset($saved_category) && isset($saved_category->id) && $saved_category->id >0)
                <h4 class="m-t-0 header-title">Edit Category</h4>
                @php
                    $show=$saved_category->top;
                    $order=$saved_category->order;
                    if ($saved_category->image && $saved_category->image !='' && file_exists( public_path() . '/images/' . $saved_category->image)) {
                        $img = 'images/' . $saved_category->image ;
                    } 
                    
                @endphp

                @else
                    <h4 class="m-t-0 header-title">Add Category</h4>
                @php
                    
                @endphp
                @endif
            <p class="text-muted m-b-30 font-14">

            </p>
            <div class="mb-3">
                <div class="row">

                    <div class="offset-9 col-3">
                        <a class="btn btn-secondary waves-light waves-effect pull-right" href="{{route('category.index')}}"><i class="mdi mdi-keyboard-backspace"></i> Back</a>
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
                        @if(isset($saved_category) && isset($saved_category->id) && $saved_category->id >0)
                            {!! Form::model($saved_category,['route' => ['category.update', $saved_category->id] ,'method' => 'PATCH' ,'files' => true]) !!}
                        @else
                            {!! Form::open(['route' => 'category.store' ,'method' => 'post' ,'files' => true]) !!}
                        @endif
                        
                            <div class="form-group row">
                                {{ Form::label('name', 'Name', array('class'=>'col-2 col-form-label'))}}
                                <div class="col-10">
                                    {{ Form::text('name', null, array('class'=>'form-control','placeholder'=>'Category Name'))}}
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
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
       
        $('input[name="name"]').change(function (){
            $('input[name="slug"]').val(slugify($('input[name="name"]').val()));
        })
        $('.summernote').summernote({
            height: 150,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false                 // set focus to editable area after initializing summernote
        });
        $(".select2").select2();
   })(jQuery)
</script>
@endsection
@section('cssfiles')
<link href="{{ asset('plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
<link href="{{ asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{ asset('plugins/bootstrap-fileupload/bootstrap-fileupload.css')}}" rel="stylesheet">
@endsection
<!--<script src="../plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script src="../plugins/dropzone/dropzone.js"></script

        <link href="../plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />
        <link href="../plugins/dropzone/dropzone.css" rel="stylesheet" type="text/css" />>-->
