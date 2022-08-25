<!DOCTYPE html>
<html lang="zxx">
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Link of CSS files -->
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/bootstrap.min.css') }} ">
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/flaticon.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/remixicon.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/odometer.min.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/fancybox.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/aos.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/responsive.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/dark-theme.css')}}">
        <title>@yield('title')</title>
        <link rel="icon" type="image/png" href="{{ asset('assets/frontend/assets/img/favicon.png')}}">
        @yield('css')
    </head>

    <body>

        <!--Preloader starts-->
        <div class="loader js-preloader">
            <div class="absCenter">
                <div class="loaderPill">
                    <div class="loaderPill-anim">
                        <div class="loaderPill-anim-bounce">
                            <div class="loaderPill-anim-flop">
                                <div class="loaderPill-pill"></div>
                            </div>
                        </div>
                    </div>
                    <div class="loaderPill-floor">
                        <div class="loaderPill-floor-shadow"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--Preloader ends-->

        <!-- Theme Switcher Start -->
        <div class="switch-theme-mode">
            <label id="switch" class="switch">
                    <input type="checkbox" onchange="toggleTheme()" id="slider">
                    <span class="slider round"></span>
            </label>
        </div>
        <!-- Theme Switcher End -->

        <!-- Page Wrapper End -->
        <div class="page-wrapper">

            <!-- Header Section Start -->
           @include('front.files.header')
            <!-- Header Section End -->

          @section('main')
          @show

            <!-- Footer Section Start -->
             @include('front.files.footer')
            <!-- Footer Section End -->
        
        </div>
        <!-- Page Wrapper End -->
        
        <!-- Back-to-top button Start -->
         <a href="javascript:void(0)" class="back-to-top bounce"><i class="ri-arrow-up-s-line"></i></a>
        <!-- Back-to-top button End -->

        <!-- Link of JS files -->
        <script src="{{ asset('assets/frontend/assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('assets/frontend/assets/js/form-validator.min.js')}}"></script>
        <script src="{{ asset('assets/frontend/assets/js/contact-form-script.js')}}"></script>
        <script src="{{ asset('assets/frontend/assets/js/aos.js')}}"></script>
        <script src="{{ asset('assets/frontend/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('assets/frontend/assets/js/odometer.min.js')}}"></script>
        <script src="{{ asset('assets/frontend/assets/js/fancybox.js')}}"></script>
        <script src="{{ asset('assets/frontend/assets/js/jquery.appear.js')}}"></script>
        <script src="{{ asset('assets/frontend/assets/js/tweenmax.min.js')}}"></script>
        <script src="{{ asset('assets/frontend/assets/js/main.js')}}"></script>
        @yield('js')
    </body>
</html>