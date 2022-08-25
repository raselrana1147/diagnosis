@extends('layouts.admin')
@section('title',config('constant.company_name').' Upload Report Document')
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Upload Report Document</h4>
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
                    <form id="submit_form" data-action="{{route('admin.store_document')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="report_id" value="{{$id}}">
                      <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" name="title" class="form-control" placeholder="Title">
                             <span class="error_name text-danger"></span>
                        </div>
                     </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="file" name="report_file" class="form-control dropify" >
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

        <div class="col-sm-12">
            <!-- Basic Inputs Validation start -->
            <div class="card">
                <div class="card-header">
                    <h5>Fill Up information</h5>
                </div>
                <div class="card-block">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Report_ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($documents as $document)
                                <tr class="table_row{{$document->id}}">
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$document->report->report_number}}</td>
                                    <td>{{$document->title}}</td>
                                    <td><img src="{{ asset('assets/backend/image/document/'.$document->report_file) }}" style="width: 140px;height: 80px"></td>
                                    <td>
                                      <a href="{{ route('admin.edit_document',$document->id) }}" class="btn btn-success btn-sm"><i class="icofont icofont-ui-edit"></i></a>
                                      <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="{{ route('delete_document') }}" item_id="{{$document->id}}"><i class="icofont icofont-delete-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tfoot>
                        </table>
                    </div>
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
                      location.reload();
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

            
        $('body').on('click','.delete_item',function()
        {
          let item_id=$(this).attr('item_id');
          Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes Delete'
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                 url:$(this).attr('data-action'),
                 method:'post',
                 data:{item_id:item_id},
                 success:function(data){
                   sweet(data.message,'success')
                    $('.table_row'+item_id).hide()
                    
                 }

              }); 
            }
          })
        })
          
      })
  </script>

@endsection
