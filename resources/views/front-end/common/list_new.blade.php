<div class="col-12 col-md-6 col-lg-4" style="margin-top: 15px;">
    <!-- Single Featured Post -->
    @foreach($list_bao_gia as $item)
    <div class="single-blog-post small-featured-post d-flex">
        <div class="post-thumb">
            <a href="#"><img src="{{url('/uploads/news/'.$item->images)}}" alt=""></a>
        </div>
        <div class="post-data">
            <a href="{{url($item->category->slug)}}" class="post-catagory">{{$item->category->name}}</a>
            <div class="post-meta">
                <a href="{{url('/post-detail/'.$item->slug)}}" class="post-title">
                    <h6>{{str_limit($item->name, 70, '...')}}</h6>
                </a>
                <!-- <p class="post-date"><span>{{$item->created_at->format('d/m/y')}}</span></p> -->
            </div>
        </div>
    </div>
    @endforeach
    @foreach($list_news as $item)
    <div class="single-blog-post small-featured-post d-flex">
        <div class="post-thumb">
            <a href="#"><img src="{{url('/uploads/news/'.$item->images)}}" alt=""></a>
        </div>
        <div class="post-data">
            <a href="{{url($item->category->slug)}}" class="post-catagory">{{$item->category->name}}</a>
            <div class="post-meta">
                <a href="{{url('/post-detail/'.$item->slug)}}" class="post-title">
                    <h6>{{str_limit($item->name, 70, '...')}}</h6>
                </a>
                <!-- <p class="post-date"><span>{{$item->created_at->format('d/m/y')}}</span></p> -->
            </div>
        </div>
    </div>
    @endforeach
</div>