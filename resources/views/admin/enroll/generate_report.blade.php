@extends('layouts.admin')
@section('title',config('constant.company_name').' Generate Report')
@section('extra_css')
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/common/css/report.css') }}">
 <style>
     /*.item_table tr td:last-child {
         border: none;
     }*/
 </style>
@endsection
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Generate Report</h4>
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
                      <div style="width: 100%">
                        <section style="width: 60%;float: left;">
                          <table class="item_table" border="1" cellspacing="0">
                            <tr>
                              <th>Name</th>
                              <th colspan="2">Result</th>
                            </tr>
                            @foreach ($report->testResults as $r_test)
                              <tr>
                                <td><span class="pr-2">{{$loop->index+1}}. </span> {{$r_test->test->test_name}}</td>
                                <td><input type="text" name="positive" class="result-input" value="{{$r_test->positive}}" result_type="positive" item_id="{{$r_test->id}}"></td>
                                <td><input type="text" name="negative" class="result-input" value="{{$r_test->negative}}" result_type="negative" item_id="{{$r_test->id}}"></td>
                              </tr>
                            @endforeach
                          </table>
                        </section>

                        <section style="width: 40%;float: right;">
                          <table class="item_table" border="1" cellspacing="0">
                            <tr>
                              <th>Document {{stop($report)}}</th>
                            </tr>
                            @for ($i = 0; $i <=total_test($report) ; $i++)
                             <tr>
                               @if ($i<stop($report))
                                <td>{{$i}}</td>
                                @elseif($i==stop($report))
                                  <td rowspan="{{stop($report)}}">
                                    <div class="report-file">
                                      @foreach ($report->documents as $document)
                                        <img src="{{ asset('assets/backend/image/document/'.$document->report_file) }}" width="200">
                                      @endforeach
                                    </div>
                                  </td>
                                @endif
                             </tr>
                            @endfor
                          </table>
                        </section>

                        <div class="report-footer">
                            <section style="width: 50%;float: left;">
                                <p>dsfds</p>
                                <p>dsfds</p>
                                <p>dsfds</p>
                                <p>dsfds</p>
                            </section>

                          <section style="width: 50%;float: right">
                                <p>dsfds</p>
                                <p>dsfds</p>
                                <p>dsfds</p>
                                <p>dsfds</p>
                                <p>dsfds</p>
                           </section>
                       </div>

                     </div>


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


         // set test result

         $('body').on('focusout','.result-input',function(e)
        {
            e.preventDefault();
            
             let item_id=$(this).attr('item_id')
             let result_value=$(this).val()
             let result_type=$(this).attr('result_type')
             $.ajax({
               url: '{{ route('admin.update_result') }}',
               method: "POST",
               data: {item_id:item_id,result_value:result_value,result_type:result_type},
               success:function(data){
                   //sweet(data.message,'success')
               },

               
             });
         })


       });
   </script>
@endsection
