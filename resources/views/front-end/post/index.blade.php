@extends('front-end.master')
@section('title', $post->name)
@section('content')
<div class="col-12 col-lg-8">
    <div class="blog-posts-area">

        <!-- Single Featured Post -->
        <div class="single-blog-post featured-post single-post">
            <!-- <div class="post-thumb">
                <a href="#"><img src="{{url('/uploads/news/'.$post->images)}}" alt=""></a>
            </div> -->
            <div class="post-data">
                <a href="{{url($post->category->slug)}}" class="post-catagory">{{$post->category->name}}</a>
                <a href="{{url('/post-detail/'.$post->slug)}}" class="post-title">
                    <h6>{{$post->name}}</h6>
                </a>
                <div class="post-meta">
                    {!! $post->content !!}
                    <div class="newspaper-post-like d-flex align-items-center justify-content-between">
                        <!-- Tags -->
                        <!-- Post Like & Post Comment -->
                        
                    </div>
                </div>
            </div>
        </div>


        <div class="section-heading">
            <h6>Bài viết cùng chuyên mục</h6>
        </div>

        <div class="row">
            <!-- Single Post -->
            @foreach($related as $item)
            <div class="col-12 col-md-6">
                <div class="single-blog-post style-3 mb-80">
                    <div class="post-thumb">
                        <a href="#"><img src="{{url('/uploads/news/'.$item->images)}}" alt=""></a>
                    </div>
                    <div class="post-data">
                        <a href="#" class="post-catagory">{{$item->category->name}}</a>
                        <a href="#" class="post-title">
                            <h6>{{$item->name}}</h6>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        
    </div>
</div>
@include('front-end.common.list_new')
@endsection