@extends('layouts.app')
@section('title',config('constant.company_name').'Sign In')
@section('main')
    <div class="page-title-area" style="background: url({{banner('city')}});">
        <div class="container">
            <div class="page-title-content">
                <h2>Log In</h2>
                <ul>
                    <li>
                        <a href="{{ route('front_page') }}">
                            Home 
                        </a>
                    </li>
                    <li>Log In</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Log In Area -->
    <section class="user-area-all-style log-in-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-form-action">
                        <div class="form-heading text-center">
                            <h3 class="form-title">Login to your account!</h3>
                            <p class="form-desc">With your social network.</p>
                        </div>
                        <form action="{{ route('login') }}" method="post">
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
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="email" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="password" placeholder="Password">
                                    </div>
                                </div>
                                
                               
                                <div class="col-12">
                                    <button class="default-btn btn-two" type="submit" style="float: left;">
                                        Log In Now
                                        <i class="flaticon-right"></i>
                                    </button>
                                </div>
                                <div class="col-12">
                                    <p class="account-desc" style="float: left;">
                                        Not a member?
                                        <a href="{{ route('register') }}">Register</a>

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