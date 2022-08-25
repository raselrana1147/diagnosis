<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Sign In </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->

    <link rel="icon" href="{{ asset('assets/backend/image/common/logo2.png')}}" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/files\bower_components\bootstrap\css\bootstrap.min.css') }} ">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets.backend/files\assets\icon\themify-icons\themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/files\assets\icon\icofont\css\icofont.css')}}">
    <!-- flag icon framework css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/files\assets\pages\flag-icon\flag-icon.min.css')}}">
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/files\assets\pages\menu-search\css\component.css')}}">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/backend/files\assets\pages\multi-step-sign-up\css\reset.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/backend/files\assets\pages\multi-step-sign-up\css\style.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/files\assets\css\style.css')}}">
</head>

<body class="multi-step-sign-up">

    <!-- Pre-loader end -->
    <form id="msform" data-action="{{ route('login_submit') }}" method="post">
        @csrf
        <fieldset>
            <img class="logo" src="{{ logo()}}" alt="logo.png" style="background-color: black">
            <h2 class="fs-title">Sign up</h2>

            <h3 class="fs-subtitle">Let’s Make a session</h3>
            @if (Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <div class="fs-subtitle" id="message_area" style="display: none"></div>
            
            <div class="input-group">
                <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="input-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
    
            <button type="submit" class="btn btn-primary submit_button">Sign In</button>
        </fieldset>
    </form>
   
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
    <script type="text/javascript" src="{{ asset('assets/backend/files\bower_components\modernizr\js\css-scrollbars.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="{{ asset('assets/backend/files\assets\pages\multi-step-sign-up\js\main.js')}}"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="{{ asset('assets/backend/files\bower_components\i18next\js\i18next.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/backend/files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/backend/files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/backend/files\bower_components\jquery-i18next\js\jquery-i18next.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/backend/files\assets\js\common-pages.js')}}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>

  <script>
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
</script>


  <script>
      $(document).ready(function(){

          $('body').on('submit','#msform',function(e){
        
          e.preventDefault();
          let formDta = new FormData(this);

          $('.submit_button').text("Processing").prop('disabled',true);
           $('#message_area').html('<div class="alert alert-success">Processing...</div>').show();

          $.ajax({
            url: $(this).attr('data-action'),
            method: "POST",
            data: formDta,
            cache: false,
            contentType: false,
            processData: false,
            success:function(response){

              let data=JSON.parse(response);

              if(data.status==200){
                  $('#message_area').html('<div class="alert alert-success">Successfull !!!</div>').show();
                  window.location = data.route
              }else{
                  //toastr.error(data.message);   
                  $('#message_area')
                  .html('<div class="alert alert-danger">Credential Not Match</div>').show();
                   $('.submit_button').text("Sing In").prop('disabled',false);
              }
            },

           
          });
    })
      })
  </script>

</body>

</html>
