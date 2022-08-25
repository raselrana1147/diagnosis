@extends('layouts.admin')
@section('title',config('constant.company_name').' Country Detail')
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Country Detail</h4>
                 </div>
             </div>
         </div>
         <div class="col-lg-4">
             <div class="page-header-breadcrumb">
                 <a href="javascript:history.back();" class="btn btn-success"><i class="icofont icofont-arrow-left"></i>Go Back</a>
             </div>
         </div>
     </div>
 </div>

  <div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <!-- Dynamic List start -->
            <div class="card">
              <div class="row simple-cards users-card">
                  <div class="col-md-12 col-xl-6 offset-3 ">
                      <div class="card user-card">
                          <div class="card-header-img">
                              <h4>{{$data->country_name}}</h4>
                          </div>
                         <div class="table-responsive p-4">
                             <ul class="list-group">
                                <li class="list-group-item active" style="text-align: left;">Test List</li>
                                @foreach ($data->tests as $test)
                                    <li class="list-group-item" style="text-align: left;"><span class="pr-4">{{$loop->index+1}}. </span>{{$test->test_name}}</li>
                                @endforeach
                                 
                             </ul>
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
 
@endsection
