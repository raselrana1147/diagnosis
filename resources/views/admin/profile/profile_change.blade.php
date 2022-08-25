@extends('layouts.admin')
@section('title',config('constant.company_name').' Update Profile')
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Update Profile</h4>
                 </div>
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
                    <form id="submit_form" data-action="{{ route('admin.change_profile') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="id" value="{{Auth::user()->id}}">
                      <div class="row pb-4">
                       <div class="offset-4">
                          <div class="text-center">
                             <img id="profile_image_path" src="{{Auth::user()->avatar !=null ? asset('assets/backend/image/profile/'.Auth::user()->avatar) :default_image()}}"  class="profile_image" alt="customer image" style="width: 130px;height: 130px;border-radius: 50%"><br>
                             <button type="button" class="btn btn-info btn-sm upload_button mt-2" role="button"><i class="fa fa-upload"></i>Upload</button>
                          </div>
                          <input type="file" id="image_path" name="avatar" class="get_image" style="display: none">
                          
                       </div>
                      </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Name <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" readonly="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Phone <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}">
                                
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="address" value="{{Auth::user()->address}}">
                                
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary m-b-0 submit_button">Save Change</button>
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
                      success:function(response){
                         
                         let data=JSON.parse(response);
                         if (data.status==200) {
                                 sweet(data.message,'success')
                               $("#submit_form")[0].reset();
                               $(".submit_button").text("Svae Changes").prop('disabled', false)
                         }else{

                              sweet(data.message,'error')
                             $(".submit_button").text("Svae Changes").prop('disabled', false)
                         }
                         
                      },

                      error:function(response)
                      {
                         
                      }
                    });
              });


          $('body').on('click','.upload_button',function(){
                $('.get_image').trigger('click')
            })

          $('.get_image').on('change',function(){
              const profile_image_path = document.querySelector('#profile_image_path');
              const image_path = document.querySelector('#image_path').files[0];
              const reader = new FileReader();
              reader.addEventListener("load", function () {
                profile_image_path.src = reader.result;
              }, false);

              if (image_path) {
                reader.readAsDataURL(image_path);
              }
          });


      })
  </script>
@endsection
