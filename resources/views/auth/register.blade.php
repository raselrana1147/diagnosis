@extends('layouts.app')
@section('title',config('constant.company_name').' Sign Up')
@section('main')
    <div class="page-title-area" style="background: url({{banner('city')}});">
        <div class="container">
            <div class="page-title-content">
                <h2>Sign Up</h2>
                <ul>
                    <li>
                        <a href="{{ route('front_page') }}">
                            Home 
                        </a>
                    </li>
                    <li>Log Up</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Log In Area -->
  <section class="user-area-all-style sign-up-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-form-action">
                    <div class="form-heading text-center">
                        <h3 class="form-title">Create an account!</h3>
                        <p class="form-desc">With your social network.</p>
                    </div>
                    <form id="submit_singup" data-action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <button class="default-btn" type="button">
                                    Google
                                    <i class="bx bxl-google"></i>
                                </button>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <button class="default-btn" type="button">
                                    Facebook
                                    <i class="bx bxl-facebook"></i>
                                </button>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <button class="default-btn" type="button">
                                    Twitter
                                    <i class="bx bxl-twitter"></i>
                                </button>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="name" placeholder="Name">
                                    <span class="error_name" style="color: red"></span>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 ">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="email" placeholder="Email">
                                    <span class="error_email" style="color: red"></span>
                                </div>
                            </div>
                          
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="phone" placeholder="Phone">
                                    <span class="error_phone" style="color: red"></span>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" placeholder="Password">
                                    <span class="error_password" style="color: red"></span>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 ">
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">

                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-condition">
                                <div class="agree-label">
                                    <input type="checkbox" name="privacy" value="true">
                                    <label for="chb1">
                                        I agree with Haipe's 
                                        <a href="#">Privacy Policy</a>
                                    </label>

                                </div>
                                <span class="error_privacy" style="color: red"></span>
                               
                            </div>
                            <div class="col-12">
                                <button class="default-btn btn-two submit_button" type="submit" style="float: left;">
                                    Register Account
                                    <i class="flaticon-right"></i>
                                </button>
                            </div>
                            <div class="col-12">
                                <p class="account-desc" style="float: left;">
                                    Already have an account?
                                    <a href="{{ route('login') }}"> Sing In</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection
@section('js')
  <script src="{{ asset('assets/frontend/style/js/auth.js') }}"></script>
@endsection