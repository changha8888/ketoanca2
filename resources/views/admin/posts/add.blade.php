@extends('layouts.backend')
@section('controller','Bài viết')
@section('action', 'Thêm mới')
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

                <form class="form" role="form" method="POST" action="add" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-header with-border">
                        <h3 class="box-title">Add new</h3>

                        <div class="box-tools">
                            <a href="{{url('cks-admin/post/add')}}" class="btn btn-sm btn-primary margin-r-5 margin-l-5">
                                <i class="fa fa-plus"></i> <span>Add</span>
                            </a>
                            <button type="submit" class="btn btn-sm btn-info margin-r-5 margin-l-5">
                                <i class="fa fa-save"></i> <span>Save</span>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                            <div class="form-group" style="margin-top: 10px">
                                    <label for="name">Danh mục cha</label>
                                    <select name="cat_id" class="form-control" required="">
                                        <option value="">--- ROOT ---</option>
                                        <?php menuMulti ($cate,0,$str="—") ?>
                                    </select>
                                    <!-- /.form-group -->
                            </div>
                            <div class="form-group">
                                <label for="name" class="">Tiêu đề *</label>
                                <div class="">
                                    <input type="text" class="form-control" name="name" placeholder="title" value="{{old('name')}}" required="">
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="name" class="">Giới thiệu</label>
                                <div class="">
                                    <input type="text" class="form-control" name="intro" placeholder="Intro" value="{{old('intro')}}" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="">Bài viết nổi bật</label>
                                <div class="">
                                    <input type="checkbox" name="is_index" value="1" >
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputFile">Ảnh bài viết</label>
                              <input type="file" id="exampleInputFile" name="images" value="{{old('images')}}">
                            </div>

                            <div class="form-group">
                                    <label for="name">Nội dung</label>
                                    <textarea class="form-control" id="summary-ckeditor" name="content" required="" value="{{old('content')}}"></textarea>

                                <!-- /.form-group -->
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
                                <a href="{{url('cks-admin/post/list')}}" class="btn btn-default">
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
@push('footer-scripts')
<script src="{{asset('admin/post.js')}}"></script>
@endpush
@endsection