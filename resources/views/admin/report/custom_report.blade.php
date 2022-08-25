@extends('layouts.admin')
@section('title',config('constant.company_name').' Custom Report List')
@section('extra_css')
<link href="{{ asset('assets/backend/style/css/jquery-ui.css') }}" rel = "stylesheet">
<style type="text/css">
  .ui-widget-header{
    border: #ddd solid red !important;
    background: #000 !important
  }
</style>

@endsection
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Custom Report List</h4>
                 </div>
             </div>
         </div>
         
     </div>
 </div>
 <div class="page-body">
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                  
                  <form action="{{ route('admin.generate_report') }}" method="post">
                    @csrf
                      <div class="row">
                          <div class="col-6">
                              <div class="form-group">
                                  <label>Shart Date</label>
                                  <input type="text" class="form-control" name="start_date" id="start_date" required>
                                  
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label>End Date</label>
                                  <input type="text" class="form-control" name="end_date" id="end_date" required>
                              </div>
                          </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Generate Report</button>
                  </form>
              </div>
          </div>
          <!-- end card -->
      </div> 
  </div>
  @if ($reports !=null)
  <div class="row">
      <!-- task, page, download counter  start -->
      <div class="col-xl-3 col-md-6">
          <div class="card bg-dark">
              <div class="card-block">
                  <div class="row align-items-end">
                      <div class="col-12">
                          <h6 class="text-white m-b-0">Total Amount: {{price_format($total_amount)}}</h6>
                      </div>
                  </div>
              </div>
              
          </div>
      </div>
      <div class="col-xl-3 col-md-6">
          <div class="card-block bg-danger">
              <div class="row align-items-end">
                  <div class="col-12">
                      <h6 class="text-white m-b-0">Total Report: {{count($reports)}}</h6>
                  </div>
                   
              </div>
          </div>
      </div>
    
  </div>
     <div class="row">
         <div class="col-sm-12">
             <!-- Zero config.table start -->
             <div class="card">
                 
                 <div class="card-block">
                     <div class="dt-responsive table-responsive">
                         <table id="simpletable" class="table table-striped table-bordered nowrap">
                             <thead>
                             <tr>
                                 <th>Serial</th>
                                 <th>Report ID</th>
                                 <th>Price</th>
                                 <th>Patient ID</th>
                                 <th>Country</th>
                                 <th>Status</th>
                                
                             </tr>
                             </thead>
                             <tbody>
                              @foreach ($reports as $report)
                               <tr>
                                 <td>{{$loop->index+1}}</td>
                                 <td>{{$report->report_number}}</td>
                                 <td>{{price_format($report->country->package->price)}}</td>
                                 <td>{{$report->patient->patient_number}}</td>
                                 <td>{{$report->country->country_name}}</td>
                                 <td>
                                   @if ($report->status=="pending")
                                     <span class="badge badge-info">{{$report->status}}</span>
                                     @elseif($report->status=="processing")
                                     <span class="badge badge-danger">{{$report->status}}</span>
                                     @else
                                     <span class="badge badge-success">{{$report->status}}</span>
                                   @endif
                                   </td>
                               </tr>
                                  {{-- expr --}}
                              @endforeach
                             </tbody>

                         </table>
                     </div>
                 </div>
             </div> 
         </div>
     </div>
       @endif
 </div>
@endsection

@section('extra_js')
<script src = "{{ asset('assets/backend/style/js/jquery-ui.js') }}"></script>
  <script>
    $(document).ready(function(){
          $('#datatable_table').DataTable();

            $( "#start_date" ).datepicker({
                  maxDate: new Date(), 
            });
            $( "#end_date" ).datepicker({
                  maxDate: new Date()    
            });
    });
  </script>
@endsection

