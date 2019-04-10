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
        $list_news = Post::orderBy('created_at', 'desc')->take(6)->get();
        $result = array(
            "cate"=>$cate, 'list_news' => $list_news);
        return $result;
    }
    public function list_news () {
        $list_news = Post::orderBy('created_at', 'desc')->take(6)->get();
        $result = array(
            "list_news"=>$cate);
        return $result;
    }

    public function index()
    {
        $cate_index = Category::where('is_index', 1)->orderBy('position', 'ASC')->get();
        $post_large = Post::where('is_index', 1)->orderBy('created_at', 'DESC')->first();
        $posts = Post::where('is_index', 1)->orderBy('created_at', 'desc')->take(3)->skip(1)->get();
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
        $cat_id = $post->cat_id;
        $related = Post::where('id', '!=', $post->id)->where('cat_id', '=', $post->cat_id)->take(4)->get();
        return view('front-end.post.index', array_merge($this->common_var(),['post'=>$post, 'related'=> $related]));
    }
}
