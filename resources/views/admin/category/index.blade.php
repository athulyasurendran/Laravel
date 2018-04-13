@extends('admin.layout.admin')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Category</h4>
            <p class="text-muted m-b-30 font-13">
                include filtering in your FooTable.
            </p>

            <div class="mb-3">
                <div class="row">
                    <div class="col-9 text-sm-center form-inline">
                        <div class="form-group mr-2">
                            <select id="demo-foo-filter-status" class="custom-select">
                                <option value="">Show all</option>
                                <option value="active">Active</option>
                                <option value="disabled">Disabled</option>
                                <option value="suspended">Suspended</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input id="demo-foo-search" type="text" placeholder="Search" class="form-control" autocomplete="on">
                        </div>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-info waves-light waves-effect pull-right" href="{{route('category.create')}}"><i class="mdi mdi-plus"></i> Add Category</a>
                    </div>
                </div>
            </div>
            <table id="demo-foo-filtering" class="table table-striped table-bordered toggle-circle m-b-0" data-page-size="15">
                <thead>
                    <tr>
                        <th data-toggle="true">Category Name</th>
                        <th data-hide="phone">Sort order</th>
                        
                        <th data-hide="phone, tablet">Status</th>
                        <th >Action</th>
                    </tr>
                </thead>
                
                <tfoot>
                    <tr class="active">
                        <td colspan="5">
                            <div class="text-right">
                                <ul class="pagination pagination-split justify-content-end footable-pagination m-t-10 m-b-0"></ul>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
@section('jsfiles')
<script src="{{ asset('plugins/footable/js/footable.all.min.js')}}"></script>
<!--FooTable Example-->
<script src="{{ asset('admin/pages/jquery.footable.js')}}"></script>
@endsection
@section('cssfiles')
<link href="{{ asset('plugins/footable/css/footable.core.css')}}" rel="stylesheet">
@endsection
