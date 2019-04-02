@extends('layouts.backend')
@section('controller','Category')
@section('action', 'List')
@section('content')

<section class="content">
    <!-- Default box -->
    <div class="box box-info">
        

        <div class="box-body no-padding">
            <div class="box-header with-border">
                <h3 class="box-title">List</h3>

                <!-- Search -->
                <div class="box-tools pull-right">
                        <a href="{{url('cks-admin/category/add')}}" class="btn btn-sm btn-primary pull-right">
                            <i class="fa fa-plus"></i> <span>Add</span>
                        </a>
                </div>
                <!-- END Search -->
            </div>
           <!--  <div class="padding-5">
                <span class="text-green padding-l-5">Total: 3 items.</span>&nbsp;
            </div> -->
            <div class="table-responsive list-records">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Danh mục cha</th>
                            <th>Hiển thị trang chủ</th>
                            <th style="width: 120px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr id="cat_{{$item->id}}">
                            <td>
                                {{$item->id}}
                            </td>
                            <td class="table-text">
                                {{$item->name}}
                            </td>
                            
                            <td>{{$item->parent['name']}}</td>
                            @if($item->is_index == 1)
                            <td><span class="success"><i class="glyphicon glyphicon-check"></i></span></td>
                            @else
                            <td></td>
                            @endif

                            <!-- we will also add show, edit, and delete buttons -->
                            <td>
                                <div class="btn-group">
                                    <a href="edit/{{$item->id}}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" id="remove_cate" data-id="{{$item->id}}"><i class="glyphicon glyphicon-trash"></i></button>
                                </div>
                                <!-- Delete Record Form -->
                                   
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                {{ $data->links() }}
                </div>
            </div>
        </div>
        <div class="box-footer clearfix">
            <div class="pull-right">
                <div class="no-margin text-center">

                </div>
            </div>
        </div>

    </div>
    <!-- /.box -->

</section>
@push('footer-scripts')
<script src="{{asset('/admin/category.js')}}"></script>
@endpush
@endsection

