@extends('layouts.admin')
@section('title',config('constant.company_name').' Invoice Detail')
@section('extra_css')
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/common/css/report.css') }}">
@endsection
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Patient Testing Details</h4>
                 </div>
             </div>
         </div>
         <div class="col-lg-4">
             <div class="page-header-breadcrumb">
                 <button class="btn btn-success print_report"><i class="icofont icofont-print"></i>Print Report
             </div>
         </div>
     </div>
 </div>

  <div class="page-body">
    <div class="row">
      <div class="container">
          <!-- Main content starts -->
          <div>
             <div class="card">
               <div class="report_area">
               <div class="invoice_container">
                   <div class="invoice_header">
                     <div class="logo_container">
                       <img src="{{logo()}}">
                     </div>
                     <div class="company_address">
                       <h2>{{config('constant.company_name')}}.</h2>
                       <p>
                         ATTN: Dennis Menees, CEO <br>
                         Global Co. <br>
                         90210 Broadway Blvd. <br>
                         Nashville, TN 37011-5678
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
                          <td></td>
                          <td></td>
                          <td rowspan="{{count($report->testResults)+1}}"></td>
                        </tr>
                        @else
                        <tr>
                          <td><span class="pr-2">{{$loop->index+1}}. </span> {{$r_test->test->test_name}}</td>
                          <td></td>
                          <td></td>
                        </tr>
                      @endif   
                      @endforeach
                     </table>
                   </div>
                   
                 </div>
             </div>
             </div>
              
          </div>
      </div>
       
    </div>
</div>

@endsection

@section('extra_js')
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
