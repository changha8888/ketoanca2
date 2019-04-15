@section('title', 'Kế toán, Chữ ký số...')
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
                    <h5>{{$post_large->name}}</h5>
                </a>
                <div class="post-meta">
                    <p class="post-excerp">{{$post_large->intro}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-5">
        @foreach($posts as $k=>$post)
        <div class="single-blog-post featured-post-2">
            @if($k==0)
            <div class="post-thumb">
                <a href="{{url('/post-detail/'.$post->slug)}}"><img src="{{url('/uploads/news/'.$post->images)}}" alt=""></a>
            </div>
            @endif
            <div class="post-data">
                <div class="post-meta">
                    <a href="{{url('/post-detail/'.$post->slug)}}" class="post-title">
                        <h6>{{$post->name}}</h6>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
    </div>
@foreach($cate_index as $cat_index)
@php
$post = $cat_index->getPost($cat_index->id);
@endphp
<div class="col-12">
    <div class="section-heading">
        <h6>{{$cat_index->name}}</h6>
    </div>
    <div class="row">
        @foreach($post as $i)
        <div class="col-12 col-md-6">
            <div class="single-blog-post style-3">
                <div class="post-thumb">
                    <a href="{{url('/post-detail/'.$i->slug)}}"><img src="{{url('/uploads/news/'.$i->images)}}" alt=""></a>
                </div>
                <div class="post-data">
                    <a href="{{url('/post-detail/'.$i->slug)}}" class="post-catagory"></a>
                    <a href="{{url('/post-detail/'.$i->slug)}}" class="post-title">
                        <h6>{{str_limit($i->name, 50, '...')}}</h6>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endforeach
</div>
@include('front-end.common.list_new')
@endsection