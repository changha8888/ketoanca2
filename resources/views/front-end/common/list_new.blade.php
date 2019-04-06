<div class="col-12 col-md-6 col-lg-4">
    <!-- Single Featured Post -->
    @foreach($list_news as $item)
    <div class="single-blog-post small-featured-post d-flex">
        <div class="post-thumb">
            <a href="#"><img src="{{url('/uploads/news/'.$item->images)}}" alt=""></a>
        </div>
        <div class="post-data">
            <a href="{{url($item->category->slug)}}" class="post-catagory">{{$item->category->name}}</a>
            <div class="post-meta">
                <a href="{{url('/post-detail/'.$item->slug)}}" class="post-title">
                    <h6>{{$item->name}}</h6>
                </a>
                <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
            </div>
        </div>
    </div>
    @endforeach
</div>