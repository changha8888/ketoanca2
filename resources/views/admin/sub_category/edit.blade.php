@extends('layouts.backend')
@section('controller','Category')
@section('action', 'Edit')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        	@if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        <strong>{{$err}}</strong><br>
                    @endforeach
                </div>
            @endif
            <!-- Edit Form -->
            <div class="box box-info" id="wrap-edit-box">

                <form class="form" role="form" method="POST" action="{{$data->id}}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <input type="hidden" name="_redirect_back" value="http://blog.test/admin/users">

                    <div class="box-header with-border">
                        <h3 class="box-title">Edit</h3>

                        <div class="box-tools">
                            <a href="{{url('admin/category/add')}}" class="btn btn-sm btn-primary margin-r-5 margin-l-5">
                                <i class="fa fa-plus"></i> <span>Add</span>
                            </a>
                            <button type="submit" class="btn btn-sm btn-info margin-r-5 margin-l-5">
                                <i class="fa fa-save"></i> <span>Save</span>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <div class="col-md-7">
                            <div class="col-md-12">
                                <div class="form-group margin-b-5 margin-t-5">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{$data->name}}" required="">

                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="col-md-12">
                                <div class="form-group margin-b-5 margin-t-5">
                                    <label for="name">Danh mục cha</label>
                                    <select class="form-control" name="cate_id">
                                        @foreach($cate as $item)
                                        @if($data->cat_id == $item->id)
                                        <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                        @endif
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                        
                        <div class="col-md-7">
                            <div class="col-md-12">
                                <div class="form-group margin-b-5 margin-t-5">
                                    <label for="name">Description</label>
                                    <textarea class="form-control" rows="5" name="description" >{{$data->description}}</textarea>

                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                        
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer clearfix">
                        <!-- Edit Button -->
                        <div class="col-xs-6">
                            <div class="text-center margin-b-5 margin-t-5">
                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-save"></i> <span>Save</span>
                                </button>
                            </div>
                        </div>
                        <!-- /.col-xs-6 -->
                        <div class="col-xs-6">
                            <div class="text-center margin-b-5 margin-t-5">
                                <a href="http://blog.test/admin/users" class="btn btn-default">
                                    <i class="fa fa-ban"></i> <span>Cancel</span>
                                </a>
                            </div>
                        </div>
                        <!-- /.col-xs-6 -->
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
            <!-- /End Edit Form -->
        </div>
    </div>
    <!-- /.row -->

</section>
@endsection