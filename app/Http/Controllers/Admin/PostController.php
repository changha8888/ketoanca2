<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Auth,DateTime,File;
use Toastr;
use Validator;
class PostController extends Controller
{
    public function index() {
        
    	$data = Post::select('id','name', 'intro', 'images', 'cat_id')
    			->orderBy('created_at', 'DESC')
    			->paginate(15);
    	return view('admin.posts.index', compact('data'));
    }
    public function getAdd() {
        $cate = Category::select('id','name','parent_id')->get()->toArray();
    	return view('admin.posts.add', compact('cate'));
    }
    public function postAdd(Request $request) {
    	$this->validate($request,[
                'name' => 'required',
                'content' => 'required',
                'cat_id' => 'required'
            ],[
                'name.required'=> 'Tên không được bỏ trống',
                'content.required'=> 'Nội dung bài viết không được bỏ trống',
                'cat_id.required'=> 'Danh mục bài viết không được bỏ trống',
            ]);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'content' => 'required',
            'cat_id' => 'required'
        ]);
        if($validator->fails()){
             // return back()->withErrors($validator)->withInput();
                    redirect()->back()->withErrors($validator)->withInput();
        }
        $file = $request->file('images');
        $post = new Post;
        $post->name = $request->name;
        $post->intro = $request->intro;
        $post->content = $request->content;
        $post->cat_id = $request->cat_id;
        $post->slug = str_slug($request->name);
        $post->keywords = '1';
        $post->tag = '1';
        $post->is_index = isset($request->is_index) ? 1 : 0;
        if (strlen($file) > 0) {
            $filename = time().'.'.$file->getClientOriginalName();
            $destinationPath = 'uploads/news/';
            $file->move($destinationPath,$filename);
            $post->images = $filename;
        }
        $post->save();
        Toastr::success('Thêm thành công', 'Post', ["positionClass" => "toast-top-right"]);
        return redirect('cks-admin/post/list');
    }
    public function getEdit($id) {
        $cate = Category::select('id','name','parent_id')->get()->toArray();
        $data = Post::find($id);
        return view('admin.posts.edit', compact('data', 'cate'));
    }
    public function postEdit(Request $request, $id) {
        $this->validate($request,[
                'name' => 'required'       
            ],[
                'name.required'=> 'Tên không được bỏ trống',
            ]);
        $file = $request->file('newsImg');
        $post = Post::findOrFail($id);
        $post->name = $request->name;
        $post->intro = $request->intro;
        $post->content = $request->content;
        $post->cat_id = $request->cat_id;
        $post->slug = str_slug($request->name);
        $post->keywords = '1';
        $post->tag = '1';
        $post->is_index = isset($request->is_index) ? 1 : 0;
        if (strlen($file) > 0) {
            $fImageCurrent = $request->images;
            if (file_exists(public_path().'/uploads/news/'.$fImageCurrent)) {
                File::delete(public_path().'/uploads/news/'.$fImageCurrent);
            }

            $filename = time().'.'.$file->getClientOriginalName();
            $destinationPath = 'uploads/news/';
            $file->move($destinationPath,$filename);
            $post->images = $filename;
        }
        $post->save();
        Toastr::success('Sửa thành công', 'Post', ["positionClass" => "toast-top-right"]);
        return redirect('cks-admin/post/list');
    }
    public function delete(Request $request) {
      if($request->id) {
         $data = Post::findOrFail($request->id);
         $data->delete();
         return response()->json(['stt'=> 200]);
      }
   }
}
