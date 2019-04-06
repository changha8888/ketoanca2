<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Ketoanca2</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('/newspaper/img/core-img/favicon.ico')}}">


    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{asset('/newspaper/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/ads.css')}}">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <div class="adfloat" id="divBannerFloatLeft">
         <p><a href="" target="_blank"><img src="/newspaper/img/ads/left.png" alt=""></a>
         </p>
        </div>
        <div class="adfloat" id="divBannerFloatRight">
         <p><a href="" target="_blank"><img src="/newspaper/img/ads/right.png" alt=""></a>
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
                                <a href="index.html"><img src="/img/core-img/Free_Sample_By_Wix.jpg" alt="" style="max-width: 261px; max-height: 49px"></a>
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
                            <a href="index.html"><img src="/img/core-img/changha.png" alt=""></a>
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
                                <ul>
                                    <li class=""><a href="{{url('/')}}">Home</a></li>
                                    @foreach($cate as $item)
                                    <li class=""><a href="{{url($item->slug)}}">{{$item->name}}</a></li>
                                    @endforeach
                                    <!-- <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="catagories-post.html">Catagories</a></li>
                                            <li><a href="single-post.html">Single Articles</a></li>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="#">Dropdown</a>
                                                <ul class="dropdown">
                                                    <li><a href="index.html">Home</a></li>
                                                    <li><a href="catagories-post.html">Catagories</a></li>
                                                    <li><a href="single-post.html">Single Articles</a></li>
                                                    <li><a href="about.html">About Us</a></li>
                                                    <li><a href="contact.html">Contact</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li> -->
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
                                <a href="index.html"><img src="/img/core-img/Free_Sample_By_Wix.jpg" style="max-width: 261px; max-height: 49px" alt=""></a>
                            </div>
                            <!-- List -->
                            <ul class="list">
                                <li><a href="">ketoanca2@gmail.com</a></li>
                                <li><a href="">0982350930</a></li>
                                <li><a href="https://ketoanca2.vn">ketoanca2.vn</a></li>
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