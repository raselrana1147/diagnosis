<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/backend/image/common/logo2.png')}} " type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/files\bower_components\bootstrap\css\bootstrap.min.css')}}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/files\assets\icon\feather\css\feather.css')}}">

    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/files\assets\pages\data-table\css\buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/files\assets\css\style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/files\assets\css\jquery.mCustomScrollbar.css')}}">
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/files\assets\icon\icofont\css\icofont.css')}}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/files\assets\icon\icofont\css\icofont.css')}}">
    <link href="{{ asset('assets/backend/style/css/dropify.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/style/css/custom.css')}}">
    @yield('extra_css')
</head>

<body>
    <!-- Pre-loader start -->

   @include('admin.files.loader')
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

          @include('admin.files.header')
            <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                     @include('admin.files.sidebar')
                    <div class="pcoded-content">
                        @if (Session::has('message'))
                         <div class="alert alert-success background-success text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                           {{Session::get('message')}}
                       </div>
                        @endif
                         <div class="alert alert-success message_section d-none"></div>
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                   @section('main')
                                   @show
                                </div>
                                <div id="styleSelector">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('assets/backend/files\bower_components\jquery\js\jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/backend/files\bower_components\jquery-ui\js\jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/backend/files\bower_components\popper.js\js\popper.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/backend/files\bower_components\bootstrap\js\bootstrap.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('assets/backend/files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js')}}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('assets/backend/files\bower_components\modernizr\js\modernizr.js')}}"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="{{ asset('assets/backend/files\bower_components\chart.js\js\Chart.js')}}"></script>
    <!-- amchart js -->
    <script src="{{ asset('assets/backend/files\assets\pages\widget\amchart\amcharts.js')}}"></script>
    <script src="{{ asset('assets/backend/files\assets\pages\widget\amchart\serial.js')}}"></script>
    <script src="{{ asset('assets/backend/files\assets\pages\widget\amchart\light.js')}}"></script>
    <script src="{{ asset('assets/backend/files\assets\js\jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/backend/files\assets\js\SmoothScroll.js')}}"></script>
    <script src="{{ asset('assets/backend/files\assets\js\pcoded.min.js')}}"></script>
    <!-- custom js -->
    <script src="{{ asset('assets/backend/files\assets\js\vartical-layout.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/backend/files\assets\pages\dashboard\custom-dashboard.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/backend/files\assets\js\script.min.js')}}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<!-- data-table js -->
<script src="{{ asset('assets/backend/files\bower_components\datatables.net\js\jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/backend/files\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('assets/backend/files\assets\pages\data-table\js\jszip.min.js')}}"></script>
<script src="{{ asset('assets/backend/files\assets\pages\data-table\js\pdfmake.min.js')}}"></script>
<script src="{{ asset('assets/backend/files\assets\pages\data-table\js\vfs_fonts.js')}}"></script>
<script src="{{ asset('assets/backend/files\bower_components\datatables.net-buttons\js\buttons.print.min.js')}}"></script>
<script src="{{ asset('assets/backend/files\bower_components\datatables.net-buttons\js\buttons.html5.min.js')}}"></script>
<script src="{{ asset('assets/backend/files\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/backend/files\bower_components\datatables.net-responsive\js\dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('assets/backend/files\bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js')}}"></script>
<!-- Custom js -->
<script src="{{ asset('assets/backend/files\assets\pages\data-table\js\data-table-custom.js')}}"></script>
<script src="{{ asset('assets/backend/style/js/dropify.js')}}"></script>
<script src="{{ asset('assets/backend/style/js/dropify.more.js')}}"></script>
 <script src="{{ asset('assets/backend/style/js/sweet-alert.js')}}"></script>
 <script src="{{ asset('assets/backend/style/js/sweet-custom.js')}}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
  <script>
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
</script>

@yield('extra_js')
</body>

</html>
