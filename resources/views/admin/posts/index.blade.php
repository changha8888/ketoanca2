@extends('layouts.backend')
@section('controller','Bài viết')
@section('action', 'Danh sách')
@section('content')

<section class="content">
    <!-- Default box -->
    <div class="box box-info">
        

        <div class="box-body no-padding">
            <div class="box-header with-border">
                <h3 class="box-title">List</h3>

                <!-- Search -->
                <div class="box-tools pull-right">
                        <a href="{{url('cks-admin/post/add')}}" class="btn btn-sm btn-primary pull-right">
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
                            <th>Danh mục</th>
                            <th>Giới thiệu</th>
                            <th>Ảnh hiển thị</th>
                            <th style="width: 120px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr id="post_{{$item->id}}">
                            <td>
                                {{$item->id}}
                            </td>
                           
                            <td class="table-text">
                                {{str_limit($item->name,  40, '...')}}
                            </td>
                             <td>
                                {{$item->category->name }}
                            </td>
                            <td>{!! str_limit($item->intro, 40, '...') !!}</td>
                            <td>
                                <img src="{{url('uploads/news').'/'.$item->images}}" style="max-height: 50px">
                            </td>

                            <!-- we will also add show, edit, and delete buttons -->
                            <td>
                                <div class="btn-group">
                                    <a href="edit/{{$item->id}}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" id="remove_post" data-id="{{$item->id}}"><i class="glyphicon glyphicon-trash"></i></button>
                                </div>
                                
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
<script src="{{asset('/admin/post.js')}}"></script>
@endpush
@endsection

