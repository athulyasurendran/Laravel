@extends('admin.layout.admin')
@section('content')

<!-- Start Page content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="company-card card-box">
                    <div class="text-center mt-5">
                        <h3 class="m-b-30"> <a class="btn btn-info waves-light waves-effect" href="{{route('package.create')}}"><i class="mdi mdi-plus"></i> Add Package</a></h3>
                    </div>

                    <div id="company-1" class="text-center"></div>

                </div>
            </div><!-- end col -->
            @php
            $show=1;
            $icon='admin/images/small/default.jpg';
            $order=0;
            @endphp
            @foreach($packages as $package)

            <div class="col-md-6 col-lg-3">
                <div class="company-card card-box">
                    <!-- <img src="{{ asset($icon)}}" alt="image" class="company-logo" /> -->
                    <a href="{{ URL::route('package.edit', $package->id) }}" class="pull-right">
                        <i class="mdi mdi-lead-pencil" ></i>
                    </a>
                    <div > <!--  class="company-detail"-->
                        <h4 class="mb-1">{{$package->title}}</h4>
                        <p>{!!$package->short_description !!}</p>

                    </div>

                    <div class="mt-4">
                        <div class="row">

                        </div>
                    </div>


                    <div id="company-2" class="text-center"></div>

                </div>
            </div><!-- end col -->
            @endforeach


        </div>
        <!-- end row -->

    </div> <!-- container -->

</div> <!-- content -->



@endsection
@section('jsfiles')
<script src="{{ asset('plugins/footable/js/footable.all.min.js')}}"></script>
<!--FooTable Example-->
<script src="{{ asset('admin/pages/jquery.footable.js')}}"></script>

@endsection
@section('cssfiles')
<link href="{{ asset('plugins/footable/css/footable.core.css')}}" rel="stylesheet">
@endsection
