@extends('front-end.master')
@section('content')
<div class="col-12 col-lg-8">
<div class="blog-posts-area">
    @foreach($posts as $post)
    <div class="single-blog-post featured-post mb-30">
        <div class="post-thumb">
            <a href="{{url('/post-detail/'.$post->slug)}}"><img src="{{url('/uploads/news/'.$post->images)}}" alt=""></a>
        </div>
        <div class="post-data">
            <a href="#" class="post-catagory">Finance</a>
            <a href="#" class="post-title">
                <h6>{{$post->name}}</h6>
            </a>
            <div class="post-meta">
                <p class="post-author">By <a href="#">Christinne Williams</a></p>
                <p class="post-excerp">{{$post->intro}}</p>
                <!-- Post Like & Post Comment -->
                <div class="d-flex align-items-center">
                    <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
                    <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <nav aria-label="Page navigation example">
        <ul class="pagination mt-50">
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">10</a></li>
        </ul>
    </nav>
</div>

</div>
@endsection