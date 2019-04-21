<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>@yield('title')</title> 

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta property="og:type" content="article" /> 
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:image" content="@yield('seo_image')" >
    <meta property="og:description" content="@yield('seo_description')" >
    <meta property="og:url" content="@yield('seo_url')" />

    <!-- Favicon -->
    <link rel="icon" href="{{asset('/img/logo/logo3.jpg')}}">


    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{asset('/newspaper/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/ads.css')}}">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90626056-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-90626056-2');
    </script>


</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <div class="adfloat" id="divBannerFloatLeft">
         <p><a href="https://ketoanca2.vn/post-detail/bao-gia-hoa-don-dien-tu" target="_blank"><img src="/newspaper/img/ads/left.png" alt=""></a>
         </p>
        </div>
        <div class="adfloat" id="divBannerFloatRight">
         <p><a href="https://ketoanca2.vn/post-detail/bao-gia-chu-ky-so-ca2" target="_blank"><img src="/newspaper/img/ads/right.png" alt=""></a>
         </p>
    </div>
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="/"><img src="/images/chukyso-ca.png" alt="" ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="newspaper-main-menu" id="stickyMenu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="newspaperNav">

                        <!-- Logo -->
                        <div class="logo">
                            <!-- <a href="/"><img src="/img/logo/logo3.jpg" alt=""></a> -->
                        </div>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul class="dropdown">
                                    <li class=""><a href="{{url('/')}}">Home</a></li>
                                    @foreach($cate as $item)
                                    @php
                                        $cat_childs = \App\Category::where('parent_id', '=', $item->id)->get();
                                    @endphp
                                    @if($item->parent_id == 0)
                                    @if(count($cat_childs) > 0)
                                    <li class=""><a href="{{url($item->slug)}}">{{$item->name}}</a>
                                        <ul class="dropdown">
                                            @foreach($cat_childs as $c_child)
                                                <li><a href="{{url($c_child['slug'])}}">{{$c_child['name']}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @else
                                    <li class=""><a href="{{url($item->slug)}}">{{$item->name}}</a></li>
                                    @endif
                                    @endif
                                    
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    

    <!-- ##### Featured Post Area Start ##### -->
    <div class="featured-post-area">
        <div class="container">
            <div class="row">
                    @yield('content')
                

                
            </div>
        </div>
    </div>
    <!-- ##### Featured Post Area End ##### -->

    <!-- ##### Popular News Area Start ##### -->

    <!-- ##### Popular News Area End ##### -->

    

    

    <!-- ##### Footer Add Area Start ##### -->
    <div class="footer-add-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-add">
                        <a href="#"><img src="/img/bg-img/footer-add.gif" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Footer Add Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">

        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row">

                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="footer-widget-area mt-80">
                            <!-- Footer Logo -->
                            <div class="footer-logo">
                                <a href=""><img src="/img/logo/logo1.jpg" style="max-width: 300px; max-height: 80px" alt=""></a>
                            </div>
                            <!-- List -->
                            <ul class="list">
                                <li><a href="">Chi nhánh Hà Nội</a></li>
                                <li><a href="">Địa chỉ: Tòa nhà Hanel, số 2 Chùa Bộc, quận Đống Đa, Hà Nội</a></li>
                                <li><a href="https://ketoanca2.vn">Số điện thoại: 0896635969</a></li>
                            </ul>
                           
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="footer-widget-area mt-80">
                            <div class="footer-logo">
                                <a href=""><img src="/img/logo/logo2.png" style="max-width: 300px; max-height: 80px" alt=""></a>
                            </div>

                            <ul class="list">
                                <li><a href="">Chi nhánh TP Hồ Chí Minh</a></li>
                                <li><a href="">Địa chỉ: 96/106 Đường Trục, Phường 13, quận Bình Thạnh, TP HCM</a></li>
                                <li><a href="https://ketoanca2.vn">Số điện thoại: 0973276799</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{asset('/newspaper/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('/newspaper/js/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('/newspaper/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->
    <script src="{{asset('/newspaper/js/plugins/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('/newspaper/js/active.js')}}"></script>
    <script src="{{asset('/js/ads.js')}}"></script>
</body>

</html>