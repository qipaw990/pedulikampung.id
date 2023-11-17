<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from wp.alithemes.com/html/evara/evara-frontend/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Aug 2021 15:20:36 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.JPG') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('evara-frontend/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('togler/jtoggler.styles.css') }}">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.css" rel="stylesheet">
</head>

<body>
    <header class="header-area header-style-1 header-height-2">


        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="{{url('/')}}">
                            <h6>Peduli Kampung</h6>
                        </a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="" href="{{ url('/') }}">
                                Peduli Kampung
                            </a>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/blog/1') }}">Tentang Kami</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/blog/2') }}">Visi Misi</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/blog') }}">Blog</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%
                    </p>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">

                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <h4>Peduli Kampung</h4><br><br>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-menu-wrap mobile-header-border">
                    <nav>
                        <ul class="mobile-menu">
                            <li>
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ url('/blog/1') }}">Tentang Kami</a>
                            </li>
                            <li>
                                <a href="{{ url('/blog/2') }}">Visi Misi</a>
                            </li>
                            <li>
                                <a href="{{ url('/blog') }}">Blog</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                </div>
                <div class="mobile-social-icon">

                </div>
            </div>
        </div>
    </div>
    <main class="main">
        @yield('content')
    </main>
    <footer class="main">
        <section class="newsletter p-30 text-white wow fadeIn animated">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 mb-md-3 mb-lg-0">
                        <div class="row align-items-center">
                            <div class="col flex-horizontal-center">
                                <h4 class="font-size-20 mb-0 ml-3">Donasi Sekarang</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-lg-6">
                    <p class="float-md-left font-sm text-muted mb-0">&copy; 2023, <strong class="text-brand">Peduli
                            Kampung</strong></p>
                </div>
                \
            </div>
        </div>
    </footer>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <h5 class="mb-10">Peduli Kampung</h5>
                    <div class="loader">
                        <div class="bar bar1"></div>
                        <div class="bar bar2"></div>
                        <div class="bar bar3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script src="{{asset('evara-frontend/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('evara-frontend/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('evara-frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('evara-frontend/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('evara-frontend/assets/js/plugins/slick.js')}}"></script>
    <script src="{{asset('evara-frontend/assets/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{asset('evara-frontend/assets/js/plugins/wow.js')}}"></script>
    <script src="{{asset('evara-frontend/assets/js/plugins/jquery-ui.js')}}"></script>
    <script src="{{asset('evara-frontend/assets/js/plugins/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('evara-frontend/assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{asset('evara-frontend/assets/js/plugins/select2.min.js')}}"></script>
    <script src="{{asset('evara-frontend/assets/js/plugins/waypoints.js')}}"></script>
    <script src="{{asset('evara-frontend/assets/js/plugins/counterup.js')}}"></script>
    <script src="{{asset('evara-frontend/assets/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('evara-frontend/assets/js/plugins/images-loaded.js')}}"></script>
    <script src="{{asset('evara-frontend/assets/js/plugins/isotope.js')}}"></script>
    <script src="{{asset('evara-frontend/assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{asset('evara-frontend/assets/js/plugins/jquery.vticker-min.js')}}"></script>
    <script src="{{asset('evara-frontend/assets/js/plugins/jquery.theia.sticky.js')}}"></script>
    <script src="{{asset('evara-frontend/assets/js/plugins/jquery.elevatezoom.js')}}"></script>
    <!-- Template  JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('evara-frontend/assets/js/main.js')}}"></script>
    <script src="{{asset('evara-frontend/assets/js/shop.js')}}"></script>
    <script src="{{asset('togler/jtoggler.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>


</body>


<!-- Mirrored from wp.alithemes.com/html/evara/evara-frontend/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Aug 2021 15:25:49 GMT -->

</html>