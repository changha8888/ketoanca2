@extends('front-end.master')
@section('content')
<div class="col-12 col-md-6 col-lg-8">
<div class="row">
    <!-- Single Featured Post -->
    <div class="col-12 col-lg-7">
        <div class="single-blog-post featured-post">
            <div class="post-thumb">
                <a href="{{url('/post-detail/'.$post_large->slug)}}"><img src="{{url('/uploads/news/'.$post_large->images)}}" alt=""></a>
            </div>
            <div class="post-data">
                <a href="{{url($post_large->category->slug)}}" class="post-catagory">{{$post_large->category->name}}</a>
                <a href="{{url('/post-detail/'.$post_large->slug)}}" class="post-title">
                    <h6>{{$post_large->name}}</h6>
                </a>
                <div class="post-meta">
                    <!-- <p class="post-author">By <a href="#">Christinne Williams</a></p> -->
                    <p class="post-excerp">{{$post_large->intro}}</p>
                    <!-- Post Like & Post Comment -->
                   <!--  <div class="d-flex align-items-center">
                        <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
                        <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-5">
        <!-- Single Featured Post -->
        @foreach($posts as $post)
        <div class="single-blog-post featured-post-2">
            <div class="post-thumb">
                <a href="{{url('/post-detail/'.$post->slug)}}"><img src="{{url('/uploads/news/'.$post->images)}}" alt=""></a>
            </div>
            <div class="post-data">
                <a href="{{url($post->category->slug)}}" class="post-catagory">{{$post->category->name}}</a>
                <div class="post-meta">
                    <a href="{{url('/post-detail/'.$post->slug)}}" class="post-title">
                        <h6>{{$post->name}}</h6>
                    </a>
                    <!-- Post Like & Post Comment -->
                   <!--  <div class="d-flex align-items-center">
                        <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
                        <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                    </div> -->
                </div>
            </div>
        </div>
        @endforeach

        
    </div>
    </div>
</div>
@include('front-end.common.list_new')

@foreach($cate_index as $cat_index)
@php
$post = $cat_index->getPost($cat_index->id);
@endphp
<div class="col-12 col-lg-8">
    <div class="section-heading">
        <h6>{{$cat_index->name}}</h6>
    </div>

    <div class="row">

        <!-- Single Post -->
        @foreach($post as $i)
        <div class="col-12 col-md-6">
            <div class="single-blog-post style-3">
                <div class="post-thumb">
                    <a href="{{url('/post-detail/'.$i->slug)}}"><img src="{{url('/uploads/news/'.$i->images)}}" alt=""></a>
                </div>
                <div class="post-data">
                    <a href="{{url('/post-detail/'.$i->slug)}}" class="post-catagory"></a>
                    <a href="{{url('/post-detail/'.$i->slug)}}" class="post-title">
                        <h6>{{$i->name}}</h6>
                    </a>
                    <!-- <div class="post-meta d-flex align-items-center">
                        <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
                        <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                    </div> -->
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endforeach
@endsection