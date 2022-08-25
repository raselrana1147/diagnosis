@extends('layouts.admin')
@section('title',config('constant.company_name').' Patient Enroll')
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Patient Enroll</h4>
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
            <!-- Basic Inputs Validation start -->
            <div class="card">
                <div class="card-header">
                    <h5>Fill Up information</h5>
                </div>
                <div class="card-block">
                  <div class="card patient_setion">
                   <div class="card-header">
                      <h4>Patient Detail</h4>
                   </div>
                    <form action="{{route('admin.enroll_store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group row">

                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" placeholder="Patient Name" value="{{old('name')}}">
                                 <span class="error_name text-danger">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="email" class="form-control" placeholder="Email (optional)" value="{{old('email')}}">
                                <span class="error_email text-danger">{{ $errors->first('email') }}</span>
                            </div>
                           
                        </div>
                        <div class="form-group row">

                            <div class="col-sm-6">
                                <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{old('phone')}}">
                                <span class="error_phone text-danger">{{ $errors->first('phone') }}</span>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="nid" class="form-control" placeholder="NID (optional)" value="{{old('nid')}}">
                                <span class="error_nid text-danger">{{ $errors->first('nid') }}</span>
                            </div>
                           
                        </div>
                        <div class="form-group row">

                            <div class="col-sm-6">
                                <input type="text" name="age" class="form-control" placeholder="Age" value="{{old('age')}}">
                                <span class="error_age text-danger">{{ $errors->first('age') }}</span>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" name="passport" class="form-control" placeholder="Passport" value="{{old('passport')}}">
                                 <span class="error_passport text-danger">{{ $errors->first('passport') }}</span>
                            </div>
                          
                           
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <select class="form-control show_test" name="country_id">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                      <option value="{{$country->id}}">{{$country->country_name}}</option>
                                    @endforeach 
                                </select>
                                <span class="error_country_id text-danger">{{ $errors->first('country_id') }}</span>
                            </div>
                            <div class="col-sm-6">
                                
                               <select class="form-control" name="agency_id">
                                   <option value="">Select Agency</option>
                                   @foreach ($agencies as $agency)
                                     <option value="{{$agency->id}}">{{$agency->agency_name}}</option>
                                   @endforeach 
                               </select>
                               <span class="error_agency_id text-danger">{{ $errors->first('agency_id') }}</span>
                        
                            </div>
                           
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="text" name="father_name" class="form-control" placeholder="Father Name (optional)" value="{{old('father_name')}}">
                                 <span class="error_father_name text-danger">{{ $errors->first('father_name') }}</span>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" value="{{old('mother_name')}}" name="mother_name" class="form-control" placeholder="Mother Name">
                                 <span class="error_mother_name text-danger">{{ $errors->first('mother_name') }}</span>
                            </div>
                           
                        </div>

                      

                        <div class="form-group row">
                          <div class="col">
                              <div class="form-radio">
                                @for ($i = 0; $i <count(gender()) ; $i++)
                                <div class="radio radio-inline">
                                    <label>
                                        <input type="radio" name="gender" value="{{gender()[$i]}}">
                                        <i class="helper"></i>{{gender()[$i]}}
                                    </label>
                                </div>
                                @endfor
                              </div>
                              <span class="error_gender text-danger">{{ $errors->first('gender') }}</span>
                          </div>
                           
                            <div class="col-sm-6">
                                <button class="btn btn-success text-white" id="accesscamera" data-toggle="modal" data-target="#photoModal" type="button">
                                    <i class="icofont icofont-camera-alt"></i>  Capture Photo
                                </button>
                                <button type="button" id="close_camera" class="btn btn-danger"><i class="icofont icofont-ui-close"></i> Close Camera</button><br>
                                <span class="error_photoStore text-danger">{{ $errors->first('photoStore') }}</span>
                            </div>
                           
                        </div>
                        <div class="form-group row">

                           <div class="col-sm-6">
                               <input type="hidden" id="photoStore" name="photoStore" value="{{old('photoStore')}}">
                                <div id="preview_image_my" class="d-none"></div>
                           </div>
                           
                            <div class="col-sm-6">
                                
                            </div>
                             
                        </div>
                        
                       <div class="form-group row">
                           <div class="col">
                               <button type="submit" class="btn btn-primary m-b-0 submit_button">Enroll Patient</button>
                           </div>
                       </div>
 
                    </form>
                  </div>
                </div>

            </div>
           
        </div>
    </div>

    <!--Modal-->
    <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Capture Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <div id="my_camera" class="d-block mx-auto rounded overflow-hidden"></div>
                    </div>
                    <div id="results" class="d-none"></div>
                    <form method="post" id="photoForm">
                        <input type="hidden" id="photoStore" name="photoStore" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success mx-auto text-white" id="takephoto">Capture Photo</button>
                    <button type="button" class="btn btn-danger mx-auto text-white d-none" id="retakephoto">Retake</button>
                   {{--  <button type="submit" class="btn btn-warning mx-auto text-white d-none" id="uploadphoto" form="photoForm">Upload</button> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



@section('extra_js')
<script src="{{ asset('assets/backend/plugin/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/backend//plugin/webcamjs/webcam.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugin/main.js') }}"></script>


@endsection
