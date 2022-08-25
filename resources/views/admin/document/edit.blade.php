@extends('layouts.admin')
@section('title',config('constant.company_name').' Update Report Document')
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Update Report Document</h4>
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
                    <form id="submit_form" data-action="{{route('admin.update_document')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="id" value="{{$data->id}}">
                      <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" name="title" class="form-control" placeholder="Title" value="{{$data->title}}">
                             <span class="error_name text-danger"></span>
                        </div>
                     </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="file" name="report_file" class="form-control dropify" data-default-file={{ asset('assets/backend/image/document/'.$data->report_file) }}>
                                 <span class="error_report_file text-danger"></span>
                            </div>
                        </div>
                       <div class="form-group row">
                           <div class="col">
                               <button type="submit" class="btn btn-primary m-b-0 submit_button">Upload Document</button>
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
                      $("#submit_form")[0].reset();
                      $(".submit_button").text("Upload Document").prop('disabled', false)
                      $('.message_section').html('').hide();
                  },
                  error:function(response){
                      if (response.status === 422) 
                      {
                           if (response.responseJSON.errors.hasOwnProperty('title')) {
                                $('.error_title').html(response.responseJSON.errors.title)      
                            }else{
                                $('.error_title').html('') 
                            }

                            if (response.responseJSON.errors.hasOwnProperty('report_file')) {
                                 $('.error_report_file').html(response.responseJSON.errors.report_file)      
                             }else{
                                 $('.error_report_file').html('') 
                             }
                           $(".submit_button").text("Upload Document").prop('disabled', false)
                      }
                  }

                });
          });
      })
  </script>

@endsection
