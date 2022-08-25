@extends('layouts.app')
@section('title',config('constant.company_name').' | Our Service')
@section('main')
	<div class="content-wrapper">

	  
	  <!-- Breadcrumb Start -->
	  <div class="breadcrumb-wrap bg-f br-2">
	      <div class="container">
	          <div class="breadcrumb-title">
	              <h2>Services</h2>
	              <ul class="breadcrumb-menu list-style">
	                  <li><a href="index.html">Home </a></li>
	                  <li>Services</li>
	              </ul>
	          </div>
	      </div>
	  </div>
	  <!-- Breadcrumb End -->

	  <!-- Service Section Start -->
	  <section class="service-wrap ptb-100">
	      <div class="container">
	          <div class="row justify-content-center">
	          	@foreach ($services as $service)
	          		
	              <div class="col-xl-4 col-lg-6 col-md-6">
	                  <div class="service-card style1">
	                      <div class="service-img">
	                          <img src="{{ asset('assets/backend/image/service/small/'.$service->image) }}" alt="Image">
	                          @if ($service->icon !=null)
	                          	<span class="service-icon">{!!$service->icon!!}</span>
	                          @endif
	                          
	                      </div>
	                      <div class="service-info">
	                          <h3><a href="#">{{$service->title}}</a></h3>
	                          <p>{{$service->description}}</p>
	                         
	                      </div>
	                  </div>
	              </div>

	            @endforeach

	          </div>
	          {{-- <ul class="page-nav list-style">
	              <li><a href="#"><i class="ri-arrow-left-s-line"></i></a></li>
	              <li><a class="active" href="#">1</a></li>
	              <li><a href="#">2</a></li>
	              <li><a href="#">3</a></li>
	              <li><a href="#"><i class="ri-arrow-right-s-line"></i></a></li>
	          </ul> --}}
	      </div>
	  </section>
	  <!-- Service Section End -->
	   
	  
	</div>
	
@endsection


