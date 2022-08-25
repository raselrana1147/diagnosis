@extends('layouts.app')
@section('title',config('constant.company_name'))
@section('main')
 <!-- Start Preloader Area -->
 <div class="preloader">
 	<div class="lds-ripple">
 		<div></div>
 		<div></div>
 	</div>
 </div>
 <!-- End Preloader Area -->

 <!-- Start 404 Error -->
 <div class="error-area">
 	<div class="d-table">
 		<div class="d-table-cell">
 			<div class="error-content-wrap">
 				<h1>4 <span>0</span> 4</h1>
 				<h3>Oops! Page Not Found</h3>
 				<p>The page you were looking for could not be found.</p>
 				<a href="{{ route('front_page') }}" class="default-btn btn-two">
 					Return To Home Page
 					<i class="flaticon-right"></i>
 				</a>
 			</div>
 		</div>
 	</div>
 </div>
 <!-- End 404 Error -->

 <!-- Start Go Top Area -->
 <div class="go-top">
 	<i class="bx bx-chevrons-up"></i>
 	<i class="bx bx-chevrons-up bx-fade-up"></i>
 </div>

@endsection