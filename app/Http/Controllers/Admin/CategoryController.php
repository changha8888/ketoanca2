<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Toastr;

class CategoryController extends Controller
{
   public function index() {
      $data = Category::paginate(10);
   	return view('admin.category.index', compact('data'));
   }

   public function getAdd() {
      $cate = Category::select('id','name','parent_id')->get()->toArray();
   	return view('admin.category.add', compact('cate'));
   }
   public function postAdd(Request $request) {
   	$this->validate($request,[
                'name' => 'required'       
            ],[
                'name.required'=> 'Tên không được bỏ trống',
            ]);
   	$cate = new Category;
   	$cate->name = $request->name;
      $cate->parent_id = $request->cate_id;
   	$cate->status = 1;
   	$cate->slug = str_slug($request->name);
      $cate->is_index = isset($request->is_index) ? 1 : 0;
   	$cate->save();
      Toastr::success('Thêm thành công', 'Category', ["positionClass" => "toast-top-right"]);
   	return redirect('cks-admin/category/list');
   }
   public function getEdit($id) {
      $cate = Category::select('id','name','parent_id')->get()->toArray();
      $data = Category::find($id);
      if($data){
         return view('admin.category.edit', compact('cate','data'));
      }
   }
   public function postEdit(Request $request, $id) {
      $this->validate($request,[
                'name' => 'required'       
            ],[
                'name.required'=> 'Tên không được bỏ trống',
            ]);
      $cate = Category::findOrFail($id);
      if($cate) {
         $cate->name = $request->name;
         $cate->parent_id = $request->cate_id;
         $cate->is_index = isset($request->is_index) ? 1 : 0;
         $cate->save();
      }
      Toastr::success('Sửa thành công', 'Category', ["positionClass" => "toast-top-right"]);
      return redirect('cks-admin/category/list');
   }
   public function delete(Request $request) {
      if($request->id) {
         $data = Category::findOrFail($request->id);
         $data->delete();
         return response()->json(['stt'=> 200]);
      }
   }
}
