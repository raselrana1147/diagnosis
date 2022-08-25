@extends('layouts.app')
@section('title',config('constant.company_name').' | Our Terms Condition')
@section('main')
	<div class="content-wrapper">

		<div class="breadcrumb-wrap bg-f br-1">
		    <div class="container">
		        <div class="breadcrumb-title">
		            <h2>Pricing Plan</h2>
		            <ul class="breadcrumb-menu list-style">
		                <li><a href="index.html">Home </a></li>
		                <li>Pricing Plan</li>
		            </ul>
		        </div>
		    </div>
		</div>
		<!-- Breadcrumb End -->

		<!-- Pricing Section Start -->
		<section class="pricing-wrap pt-100 pb-75">
		    <div class="container">
		        <div class="row justify-content-center">
		        	@foreach ($countries as $country)
		        	
		            <div class="col-xl-4 col-lg-6 col-md-6">
		                <div class="pricing-card">
		                    <div class="pricing-header">
		                        <div class="pricing-header-left">
		                            <h5>{{$country->country_name}}</h5>
		                            <h2>{{price_format($country->package->price)}}<span></span></h2>
		                        </div>
		                        <div class="pricing-header-right">
		                        <i class="flaticon-home"></i>
		                        </div>
		                    </div>
		                    <ul class="pricing-features list-style">
		                    	@foreach ($country->tests as $test)
		                    		<li class="checked">{{$test->test_name}} <i class="ri-check-line"></i></li>
		                    	@endforeach
		                    </ul>
		                    <a href="#" class="btn style2">{{$country->package->title}}</a>
		                </div>
		            </div>
		           	{{-- expr --}}
		           @endforeach
		        </div>
		    </div>
		</section>
	   
	  
	</div>
	
@endsection


