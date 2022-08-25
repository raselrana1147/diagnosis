@extends('layouts.admin')
@section('title',config('constant.company_name').' Update Service')
@section('extra_css')
<link href="{{ asset('assets/backend/style/css/dropify.css') }}" rel = "stylesheet">
@endsection
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Update Service</h4>
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
                    <form id="submit_form" data-action="{{ route('service.update') }}" method="post" enctype="multipart/form-data">
                      @csrf
                       <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Image <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control dropify" name="image"  data-default-file="{{ asset('assets/backend/image/service/small/'.$data->image) }}">
                                <span class="error_image" style="color: red;"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title <i class="icofont icofont-info-circle" title="Optional"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" value="{{$data->title}}">
                               <span class="error_title" style="color: red;"></span>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Short Description <i class="icofont icofont-info-circle" title="required"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="description" value="{{$data->description}}">
                               <span class="error_description" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Icon <i class="icofont icofont-info-circle" title="Optional"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="icon" value="{{$data->icon}}">
                               <span class="error_icon" style="color: red;"></span>
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
<script src="{{ asset('assets/backend/style/js/dropify.js') }}"></script>
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
                             if (response.responseJSON.errors.hasOwnProperty('image')) {
                                  $('.error_image').html(response.responseJSON.errors.image)      
                              }else{
                                  $('.error_image').html('') 
                              }

                              if (response.responseJSON.errors.hasOwnProperty('title')) {
                                   $('.error_title').html(response.responseJSON.errors.title)      
                               }else{
                                   $('.error_title').html('') 
                               } 

                               if (response.responseJSON.errors.hasOwnProperty('description')) {
                                    $('.error_description').html(response.responseJSON.errors.description)      
                                }else{
                                    $('.error_description').html('') 
                                }

                                if (response.responseJSON.errors.hasOwnProperty('icon')) {
                                    $('.error_icon').html(response.responseJSON.errors.icon)      
                                }else{
                                    $('.error_icon').html('') 
                                }  

                              $(".submit_button").text("Submit").prop('disabled', false)
                         }
                      }
                    });
              });

      })
  </script>
@endsection
