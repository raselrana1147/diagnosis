@extends('layouts.app')
@section('title',config('constant.company_name').' | Report')
@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/common/css/report.css') }}">
@endsection
@section('main')
	<div class="content-wrapper">

	    <!-- Breadcrumb Start -->
	    <div class="breadcrumb-wrap bg-f br-1">
	        <div class="container">
	            <div class="breadcrumb-title">
	                <h2>Patient Report</h2>
	                <ul class="breadcrumb-menu list-style">
	                    <li><a href="{{ route('front_page') }}">Home </a></li>
	                    <li>Report</li>
	                </ul>
	            </div>
	        </div>
	    </div>
	    <!-- Breadcrumb End -->
	  
	    <section class="contact-us-wrap ptb-100">

	        <div class="container">
	        	@if(!is_null($report))
	        	<button class="btn print_report">Print Report</button>
	            <div class="row justify-content-center pb-75 report_area">
	            	
	                <div class="invoice_container">
	                		<div class="invoice_header">
	                			<div class="logo_container">
	                				<img src="{{logo()}}">
	                			</div>
	                			<div class="company_address">
	                				<h2>{{config('constant.company_name')}}.</h2>
	                				<p>
	                					{!!config('constant.company_address')!!}
	                				</p>
	                			</div>
	                		</div>
	                		<div class="customer_container">
	                			<div>
	                				<h2>Patient Detail</h2>
	                				<img src="{{ asset('assets/backend/image/photo/'.$report->patient->photo) }}">
	                				<h4>{{$report->patient->name}}</h4>
	                				<p>Gender: {{$report->patient->gender}}</p>
	                				<p>Age: Age</p>
	                				<p>Phone: {{$report->patient->phone}}</p>
	                				<p>Patient ID: {{$report->patient->patient_number}}</p>
	                				
	                			</div>

	                			<div>
	                				<h2>Report Detail</h2>
	                				<p>Date: {{date('M d, y', strtotime($report->created_at))}}</p>
	                				<p>Report Number: {{$report->report_number}}</p>
	                				<p>Status: {{$report->status}}</p>
	                				<p>Country: {{$report->country->country_name}}</p>
	                				<p>Test Price: {{price_format($report->country->package->price)}}</p>
	                				<p>Agency: {{$report->agency->agency_name}}</p>
	                				<p>Passport: {{$report->patient->passport}}</p>
	                				@if ($report->patient->nid !=null)
	                					<p>NID: {{$report->patient->nid}}</p>
	                				@endif
	                				@if ($report->patient->father_name !=null)
	                					<p>Father Name: {{$report->patient->father_name}}</p>
	                				@endif
	                				@if ($report->patient->mother_name !=null)
	                				   <p>Mother Name: {{$report->patient->mother_name}}</p>
	                				@endif
	                			</div>
	                			<div class="in_details">
	                				<table>
	                					<tr>
	                						<td><img src="" class="qrcode"></td>
	                						
	                					</tr>
	                				</table>
	                			</div>
	                		</div>
	                		<div class="product_container">
	                			<table class="item_table" border="1" cellspacing="0">
	                				<tr>
	                				 
	                				  <th width="30%">Test List</th>
	                				  <th width="10%">Positive Result</th>
	                				  <th width="10%">Negative Result</th>
	                				  <th width="50%">Document</th>
	                				</tr>
	                				
	                				@foreach ($report->testResults as $r_test)
	                				@if ($loop->index==0)
	                				  <tr>
	                				    <td><span class="pr-2">{{$loop->index+1}}. </span> {{$r_test->test->test_name}}</td>
	                				    <td>{{$r_test->positive}}</td>
	                				    <td>{{$r_test->negative}}</td>
	                				    <td rowspan="{{count($report->testResults)+1}}">
	                				      @foreach ($report->documents as $document)
	                				        <img src="{{ asset('assets/backend/image/document/'.$document->report_file) }}" width="200">
	                				      @endforeach
	                				    </td>
	                				  </tr>
	                				  @else
	                				  <tr>
	                				    <td><span class="pr-2">{{$loop->index+1}}. </span> {{$r_test->test->test_name}}</td>
	                				    <td>{{$r_test->positive}}</td>
	                				    <td>{{$r_test->negative}}</td>
	                				  </tr>
	                				@endif
	                				  
	                				@endforeach
	                			</table>
	                		</div>
	                		
	                	</div>
	                	
	            </div>
	            @else
	            <h4 class="text-center">No Data found</h4>
	            @endif
	        </div>
	    </section>
	  
	</div>
	
@endsection

@section('js')
  <script src="{{ asset('assets/common/js/print.js') }}"></script>
  <script>
    $(window).on('load', function () {
         var url="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{url('/')}}"
         $('.qrcode').attr('src', url);
     });
  </script>


   <script> 
       $(document).ready(function(){
            ////===========making printer ================
         $(".print_report").click(function(){
           	
                 var mode = 'iframe';
                 var close = mode == "popup";
                 var options = { mode : mode, popClose : close};
                 $(".report_area").printArea( options );
             
         });
       });
   </script>
@endsection
