@extends('layouts.admin')
@section('title','Admin Dashboard')
@section('main')
 <div class="page-body">

   <div class="row">
       <!-- task, page, download counter  start -->
       <div class="col-xl-3 col-md-6">
           <div class="card bg-c-yellow update-card">
               <div class="card-block">
                   <div class="row align-items-end">
                       <div class="col-8">
                           <h4 class="text-white">{{$total_report}}</h4>
                           <h6 class="text-white m-b-0">Total Reports</h6>
                       </div>
                        <div class="col-4 text-right">
                           <canvas id="update-chart-4" height="50"></canvas>
                       </div>
                   </div>
               </div>
               
           </div>
       </div>
       <div class="col-xl-3 col-md-6">
           <div class="card bg-c-green update-card">
               <div class="card-block">
                   <div class="row align-items-end">
                       <div class="col-8">
                           <h4 class="text-white">{{$refund_report}}</h4>
                           <h6 class="text-white m-b-0">Refund Report</h6>
                       </div>
                        <div class="col-4 text-right">
                           <canvas id="update-chart-4" height="50"></canvas>
                       </div>
                   </div>
               </div>
               
           </div>
       </div>
       <div class="col-xl-3 col-md-6">
           <div class="card bg-c-pink update-card">
               <div class="card-block">
                   <div class="row align-items-end">
                       <div class="col-8">
                           <h4 class="text-white">{{$total_package}}</h4>
                           <h6 class="text-white m-b-0">Total packages</h6>
                       </div>
                       <div class="col-4 text-right">
                           <canvas id="update-chart-3" height="50"></canvas>
                       </div>
                   </div>
               </div>
               
           </div>
       </div>
       <div class="col-xl-3 col-md-6">
           <div class="card bg-c-lite-green update-card">
               <div class="card-block">
                   <div class="row align-items-end">
                       <div class="col-8">
                           <h4 class="text-white">{{$total_country}}</h4>
                           <h6 class="text-white m-b-0">Total Countries</h6>
                       </div>
                       <div class="col-4 text-right">
                           <canvas id="update-chart-4" height="50"></canvas>
                       </div>
                   </div>
               </div>
               
           </div>
       </div>
  
   </div>

    </div>
</div>
@endsection