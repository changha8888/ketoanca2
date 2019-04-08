@extends('front-end.master')
@section('content')
<div class="col-12 col-lg-8">
@if(count($posts) > 0)
<div class="blog-posts-area">
    @foreach($posts as $post)
    <div class="single-blog-post featured-post mb-30">
        <div class="post-thumb">
            <a href="{{url('/post-detail/'.$post->slug)}}"><img src="{{url('/uploads/news/'.$post->images)}}" alt=""></a>
        </div>
        <div class="post-data">
            <a href="#" class="post-catagory">{{$post->category->name}}</a>
            <a href="#" class="post-title">
                <h6>{{$post->name}}</h6>
            </a>
            <div class="post-meta">
                <p class="post-excerp">{{$post->intro}}</p>
                <!-- Post Like & Post Comment -->
                <!-- <div class="d-flex align-items-center">
                    <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
                    <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                </div> -->
            </div>
        </div>
    </div>
    @endforeach
    {{$posts->links('front-end.pagination')}}
    
</div>
@else
<div class="blog-posts-area">
   <p>Hiện chưa có bài viết nào</p>
</div>
@endif
</div>
@include('front-end.common.list_new')
@endsection