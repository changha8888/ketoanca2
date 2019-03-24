<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\SubCategory;
use Toastr;

class SubCategoryController extends Controller
{
    //
    public function index() {
    	$data = SubCategory::all();
    	return view('admin.sub_category.index', compact('data'));
    }
    public function getAdd() {
    	$cate = Category::select('id', 'name')->get();
    	return view('admin.sub_category.add', compact('cate'));
    }
    public function postAdd(Request $request) {
    	$sub = new SubCategory;
    	$this->validate($request,[
                'name' => 'required',
                'cate_id' => 'required'       
            ],[
                'name.required'=> 'Tên không được bỏ trống',
                'cate_id.required' => 'Cần chọn danh mục cha'
            ]);
    	$sub->name = $request->name;
    	$sub->cat_id = $request->cate_id;
    	$sub->description = $request->description;
    	$sub->status = 1;
   		$sub->slug = 1;
   		$sub->save();
   		 Toastr::success('Thêm thành công', 'Danh mục con', ["positionClass" => "toast-top-right"]);
   		return redirect('admin/sub_category/list');
    }
    public function getEdit($id) {
    	$data = SubCategory::find($id);
    	$cate = Category::select('id', 'name')->get();
    	return view('admin/sub_category/edit', compact('data', 'cate'));
    }
    public function postEdit(Request $request, $id) {
    	$data = SubCategory::find($id);
    	if($data) {
    		$data->name = $request->name;
    		$data->cat_id = $request->cate_id;
    		$data->description = $request->description;
    		$data->save();
    		Toastr::success('Sửa thành công', 'Danh mục con', ["positionClass" => "toast-top-right"]);
   		return redirect('admin/sub_category/list');
    	}
    }
}
