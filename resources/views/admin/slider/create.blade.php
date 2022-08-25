@extends('layouts.admin')
@section('title',config('constant.company_name').' Create Slider')
@section('extra_css')
<link href="{{ asset('assets/backend/style/css/dropify.css') }}" rel = "stylesheet">
@endsection
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Add New Slider</h4>
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
                    <form id="submit_form" data-action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Image <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control dropify" name="image">
                                <span class="error_image" style="color: red;"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title One <i class="icofont icofont-info-circle" title="Optional"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title_1" placeholder="Title One">
                               <span class="error_title_1" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title Two <i class="icofont icofont-info-circle" title="Optional"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title_2" placeholder="Title two">
                               <span class="error_title_2" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary m-b-0 submit_button">Add  New</button>
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
                          $("#submit_form")[0].reset();
                          $(".submit_button").text("Submit").prop('disabled', false)
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

                               if (response.responseJSON.errors.hasOwnProperty('title_1')) {
                                    $('.error_title_1').html(response.responseJSON.errors.title_1)      
                                }else{
                                    $('.error_title_1').html('') 
                                } 

                                if (response.responseJSON.errors.hasOwnProperty('title_2')) {
                                     $('.error_title_2').html(response.responseJSON.errors.title_2)      
                                 }else{
                                     $('.error_title_2').html('') 
                                 }  


                              $(".submit_button").text("Submit").prop('disabled', false)
                         }
                      }
                    });
              });

      })
  </script>
@endsection
