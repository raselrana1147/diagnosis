@extends('layouts.admin')
@section('title',config('constant.company_name').' Update Country')
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Update Country</h4>
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
                    <form id="submit_form" data-action="{{ route('country.update') }}" method="post">
                      @csrf
                       <input type="hidden" name="id" value="{{$data->id}}">
                         <div class="form-group row">
                             <label class="col-sm-2 col-form-label">Country Name<i class="icofont icofont-info-circle" title="Required"></i></label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" name="country_name" value="{{$data->country_name}}">
                                 <span class="error_country_name text-danger"></span>
                                
                             </div>
                         </div>

                         <div class="form-group row">
                             <label class="col-sm-2 col-form-label">Package<i class="icofont icofont-info-circle" title="Required"></i></label>
                         <div class="col-sm-10">
                                 <select class="form-control" name="package_id">
                                   <option value="">Select Package</option>
                                   @foreach ($packages as $package)
                                     <option value="{{$package->id}}" {{$data->package_id==$package->id ? "selected" : "" }}>{{$package->title}}</option>
                                   @endforeach
                                 </select>
                                 <span class="error_package text-danger"></span>    
                         </div>
                       </div>
                        <div class="form-group row">
                            <label class="col-sm-2"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary m-b-0 submit_button">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
           
        </div>
    </div>
</div>

@endsection

@section('extra_js')
    <script>
      $(document).ready(function(){
                
          $('body').on('submit','#submit_form',function(e){
          
                 e.preventDefault();
                 let formDta = new FormData(this);
                 $(".submit_button").html("Processing...").prop('disabled', true)
                    $.ajax({
                      url: $(this).attr('data-action'),
                      method: "POST",
                      data: formDta,
                      cache: false,
                      contentType: false,
                      processData: false,
                      success:function(data){
                          sweet(data.message,'success')
                          $(".submit_button").text("Save Change").prop('disabled', false)
                          $('.message_section').html('').hide();
                      },

                      error:function(response)
                      {
                         if (response.status === 422) 
                         {
                              
                              if (response.responseJSON.errors.hasOwnProperty('country_name')) {
                                   $('.error_country_name').html(response.responseJSON.errors.country_name)      
                               }else{
                                   $('.error_country_name').html('') 
                               }

                               if (response.responseJSON.errors.hasOwnProperty('package_id')) {
                                    $('.error_package').html(response.responseJSON.errors.package_id)      
                                }else{
                                    $('.error_package').html('') 
                                }

                              $(".submit_button").text("Submit").prop('disabled', false)
                         }
                      }
                    });
              });

      })
  </script>
@endsection
