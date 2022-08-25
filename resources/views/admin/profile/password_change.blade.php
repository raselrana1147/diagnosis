@extends('layouts.admin')
@section('title',config('constant.company_name').' Change Password')
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Change Password</h4>
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
                    <form id="submit_form" data-action="{{ route('admin.change_password') }}" method="post">
                      @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Old Password <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="old_password" placeholder="Old Password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">New Password <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="new_password" placeholder="New Password">
                                
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Confirm Password <i class="icofont icofont-info-circle" title="Required"></i></label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                
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
                             $("#submit_form")[0].reset();
                             $(".submit_button").text("Svae Changes").prop('disabled', false)
                         }
                         
                      },

                      error:function(response)
                      {
                         
                      }
                    });
              });

      })
  </script>
@endsection
