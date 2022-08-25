@extends('layouts.admin')
@section('title',config('constant.company_name').' Patient Detail')
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Patient Detail</h4>
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
                              <img class="img-fluid img-radius" src="{{ asset('assets/backend/image/photo/'.$data->photo) }}" alt="card-img" width="200" height="170">
                              <h4>{{$data->patient_number}}</h4>
                              
                          </div>
                         <div class="table-responsive p-4">
                             <table class="table m-0">
                                 <tbody>
                                     <tr>
                                         <th scope="row">Name</th>
                                         <td>{{$data->name}}</td>
                                     </tr>
                                     <tr>
                                         <th scope="row">Phone</th>
                                         <td>{{$data->phone}}</td>
                                     </tr>
                                     @if ($data->email !=null)
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>{{$data->email}}</td>
                                        </tr>
                                     @endif

                                     @if ($data->nid !=null)
                                        <tr>
                                            <th scope="row">NID</th>
                                            <td>{{$data->nid}}</td>
                                        </tr>
                                     @endif
                                     
                                     <tr>
                                         <th scope="row">Age</th>
                                         <td>{{$data->age}}</td>
                                     </tr>

                                     <tr>
                                         <th scope="row">Gender</th>
                                         <td>{{$data->gender}}</td>
                                     </tr>
                                     @if ($data->father_name !=null)
                                        <tr>
                                            <th scope="row">Father Name</th>
                                            <td>{{$data->father_name}}</td>
                                        </tr>
                                     @endif

                                     @if ($data->mother_name !=null)
                                        <tr>
                                            <th scope="row">Mother Name</th>
                                            <td>{{$data->mother_name}}</td>
                                        </tr>
                                     @endif
                                 </tbody>
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
 
@endsection
