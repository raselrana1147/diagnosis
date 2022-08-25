@extends('layouts.app')
@section('title',config('constant.company_name'))
@section('main')
	  <!-- Hero Section Start -->
	 @include('front.files.slider')
	  <!-- Hero Section End -->

	  <!-- Counter Section Start -->
	  @include('front.files.counter')
	
	  <!-- Counter Section End -->

	  <!-- About Section Start -->
	  @include('front.files.about')
	  <!-- About Section End -->

	  <!-- Service Section Start -->
	 @include('front.files.service')
	  <!-- Service Section End -->

	  <!-- Appointment Section Start -->
	 @include('front.files.appointment')
	  <!-- Appointment Section End -->

	  <!-- Why Choose Us Section Start -->
	 @include('front.files.choice')
	  <!-- Why Choose Us Section End -->

	  <!-- Portfolio Section Start -->
	@include('front.files.portfolio')
	  <!-- Portfolio Section End -->

	  <!-- Testimonial Section Start -->
	 @include('front.files.testimonial')
	  <!-- Testimonial Section End -->

	  <!-- Pricing Section Start -->
	  @include('front.files.price')
	  <!-- Pricing Section End -->

	  <!-- Blog Section Start -->
	  @include('front.files.blog')
	  <!-- Blog Section End -->
@endsection
