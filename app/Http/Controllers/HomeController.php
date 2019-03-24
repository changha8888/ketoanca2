<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Redirect to the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function common_var () {
        $cate = Category::all();
        $result = array(
            "cate"=>$cate);
        return $result;
    }
    public function index()
    {
        $cate = Category::all();
        return view('front-end.master', compact('cate'));
    }
    public function category($slug) {
        $data = Post::where('slug', $slug)->get();
        return view('front-end.category.index', array_merge($this->common_var(),['data'=>$data]));
    }
    public function post()
    {
        $id = 22;
        $data = Post::find($id);
        return view('front-end.post.index', compact('data'));
    }
}
