@extends('layouts.backend')
@section('controller','Danh Mục Con')
@section('action', 'Danh sách')
@section('content')

<section class="content">
    <div class="box box-info">
        <div class="box-body no-padding">
            <div class="box-header with-border">
                <h3 class="box-title">List</h3>

                <div class="box-tools pull-right">
                        <a href="{{url('admin/sub_category/add')}}" class="btn btn-sm btn-primary pull-right">
                            <i class="fa fa-plus"></i> <span>Add</span>
                        </a>
                </div>
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
                            <th>Description</th>
                            <th style="width: 120px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>
                                {{$item->id}}
                            </td>
                            <td class="table-text">
                                {{$item->name}}
                            </td>
                            <td>{{$item->description}}</td>

                            <!-- we will also add show, edit, and delete buttons -->
                            <td>
                                <div class="btn-group">
                                    <a href="edit/{{$item->id}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm btnOpenerModalConfirmModelDelete" data-form-id="formDeleteModel_1"><i class="fa fa-trash-o"></i></a>
                                </div>
                                <!-- Delete Record Form -->
                                <form id="formDeleteModel_1" action="http://blog.test/admin/users/1" method="POST" style="display: none;" class="hidden form-inline">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
@endsection

