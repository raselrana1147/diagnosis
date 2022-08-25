@extends('layouts.admin')
@section('title',config('constant.company_name').' Update Test')
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Update Test</h4>
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
                    <form id="submit_form" data-action="{{ route('test.update') }}" method="post">
                      @csrf
                       <input type="hidden" name="id" value="{{$data->id}}">
                        
                         <div class="form-group row">
                             <label class="col-sm-2 col-form-label">Test Name<i class="icofont icofont-info-circle" title="Required"></i></label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" name="test_name" placeholder="Test name" value="{{$data->test_name}}">
                                 <span class="error_test_name text-danger"></span>
                                
                             </div>
                         </div>

                         <div class="form-group row">
                             <label class="col-sm-2 col-form-label">Country<i class="icofont icofont-info-circle" title="Required"></i></label>
                         <div class="col-sm-10">
                                 <select class="form-control" name="country_id">
                                   <option value="">Select Country</option>
                                   @foreach ($countries as $country)
                                     <option value="{{$country->id}}" {{$country->id==$data->country_id ? "selected" : ""}}>{{$country->country_name}}</option>
                                   @endforeach
                                 </select>
                                 <span class="error_country text-danger"></span>    
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
                              
                              if (response.responseJSON.errors.hasOwnProperty('test_name')) {
                                   $('.error_test_name').html(response.responseJSON.errors.test_name)      
                               }else{
                                   $('.error_test_name').html('') 
                               }

                               if (response.responseJSON.errors.hasOwnProperty('country_id')) {
                                    $('.error_country').html(response.responseJSON.errors.country_id)      
                                }else{
                                    $('.error_country').html('') 
                                }

                              $(".submit_button").text("Save Changes").prop('disabled', false)
                         }
                      }
                    });
              });

      })
  </script>
@endsection
