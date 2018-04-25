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
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                        <td>{{$category->name}}</td>
                        <td>{{$category->order}}</td>
                        <td><span class="badge label-table {{$category->status=='1' ? 'badge-success' :'badge-danger'}}">{{$category->status=='1' ? 'Active' :'Inactive'}}</span></td>
                        <td class="text-right"><a href="{{ URL::route('category.edit', $category->id) }}" >
                                <button class="btn btn-info waves-effect waves-light btn-sm "  data-toggle="tooltip" data-placement="left" title="" data-original-title="Edit">
                                    <i class="mdi mdi-lead-pencil" ></i>
                                </button></a>
                        </td>
                    </tr>
                            @foreach($category['children'] as $child)
                            <tr>
                                <td>{{$category->name}} -> {{$child->name}}</td>
                                <td>{{$child->order}}</td>
                                <td><span class="badge label-table {{$child->status=='1' ? 'badge-success' :'badge-danger'}}">{{$child->status=='1' ? 'Active' :'Inactive'}}</span></td>
                                <td class="text-right" ><a href="{{ URL::route('category.edit', $child->id) }}" >
                                        <button class="btn btn-info waves-effect waves-light btn-sm "  data-toggle="tooltip" data-placement="left" title="" data-original-title="Edit">
                                            <i class="mdi mdi-lead-pencil" ></i>
                                        </button></a>
                                </td>
                            </tr>
                                @foreach($child['children'] as $child2)
                                <tr>
                                    <td>{{$category->name}} -> {{$child->name}} -> {{$child2->name}}</td>
                                    <td>{{$child2->order}}</td>
                                    <td><span class="badge label-table {{$child2->status=='1' ? 'badge-success' :'badge-danger'}}">{{$child2->status=='1' ? 'Active' :'Inactive'}}</span></td>
                                    <td class="text-right"><a href="{{ URL::route('category.edit', $child2->id) }}" >
                                            <button class="btn btn-info waves-effect waves-light btn-sm "  data-toggle="tooltip" data-placement="left" title="" data-original-title="Edit">
                                                <i class="mdi mdi-lead-pencil" ></i>
                                            </button></a>
                                    </td>
                                </tr>
                                @endforeach
                            @endforeach
                        
                    @endforeach
                    
                    
                </tbody>
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
