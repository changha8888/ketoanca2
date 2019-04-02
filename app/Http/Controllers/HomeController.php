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
        // $this->middleware('auth');
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
        $cate_index = Category::where('is_index', 1)->orderBy('created_at', 'DESC')->get();
        $post_large = Post::orderBy('created_at', 'DESC')->first();
        $posts = Post::orderBy('created_at', 'desc')->take(3)->skip(1)->get();
        return view('front-end.index', array_merge($this->common_var(),['posts'=> $posts, 'post_large' => $post_large,'cate_index'=> $cate_index]));
    }
    public function category($slug) {
        $cate = Category::where('slug', $slug)->first();
        if($cate){
            $posts = Post::where('cat_id', $cate->id)->orderBy('created_at', 'DESC')
                ->paginate(10);
            }
        return view('front-end.category.index', array_merge($this->common_var(),['posts'=>$posts]));
    }
    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('front-end.post.index', array_merge($this->common_var(),['post'=>$post]));
    }
}
