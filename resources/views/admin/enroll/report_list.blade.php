@extends('layouts.admin')
@section('title',config('constant.company_name').' Report List')
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4> Report List</h4>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <div class="page-body">
     <div class="row">
         <div class="col-sm-12">
             <!-- Zero config.table start -->
             <div class="card">
                 
                 <div class="card-block">
                     <div class="dt-responsive table-responsive">
                         <table id="simpletable" class="table table-striped table-bordered nowrap">
                             <thead>
                             <tr>
                                 <th>Serial</th>
                                 <th>Report ID</th>
                                 <th>Price</th>
                                 <th>Patient ID</th>
                                 <th>Country</th>
                                 <th>Status</th>
                                 <th>Action</th>
                             </tr>
                             </thead>
                         </table>
                     </div>
                 </div>
             </div> 
         </div>
     </div>


             
       <div class="modal fade" id="refund-Modal" tabindex="-1" role="dialog">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h4 class="modal-title">Refund</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                   </div>
                   <div class="modal-body">
                       <form id="submit_form" data-action="{{ route('admin.refund') }}" method="post" >
                         @csrf
                         <input type="hidden" name="report_id" class="set_report_id">
                           <div class="form-group row">
                               <label class="col-sm-2 col-form-label">Amount</label>
                               <div class="col-sm-10">
                                   <input type="number" class="form-control" name="refund" placeholder="Refund Amount" required="">
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
         var table = $("#simpletable").DataTable({
             processing: true,
             responsive: false,
             serverSide: true,
             ordering: false,
             pagingType: "full_numbers",
             ajax: '{{ route('admin.load_report') }}',
             columns: [
                 { data: 'DT_RowIndex',name:'DT_RowIndex' },
                 { data: 'report_number',name:'report_number'},
                 { data: 'price',name:'price'},
                 { data: 'patient',name:'patient'},
                 { data: 'country',name:'country'},
                 { data: 'status',name:'status'},
                 { data: 'action',name:'action' },
             ],

              language : {
                   processing: 'Processing'
               },
              
         });
    </script>
    <script>
        $(document).ready(function(){
              // delete
              $('body').on('click','.delete_item',function(){
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
                          $('#simpletable').DataTable().ajax.reload();
                          
                       }

                    }); 
                  }
                })
              })


              // report status
              $('body').on('change','.report_status',function(){

                  let report_id=$(this).attr('report_id');
                  let status=$(this).val();
                     $.ajax({
                        url:$(this).attr('data-action'),
                        method:'post',
                        data:{report_id:report_id,status:status},
                        success:function(data){
                            sweet(data.message,'success')
                    }
                }); 
            })  

      // refund code
          $('body').on('click','.refund',function(){
                let report_id=$(this).attr('report_id');
                $('.set_report_id').val(report_id);
                     
            })


            $('body').on('submit','#submit_form',function(e){
            
                   e.preventDefault();
                   //let formDta = new FormData(this);
                   $(".submit_button").html("Processing...").prop('disabled', true)
                      $.ajax({
                        url: $(this).attr('data-action'),
                        method: "POST",
                        data:  $(this).serialize(),
                        success:function(data){
                            sweet(data.message,'success')
                            $("#submit_form")[0].reset();
                            $(".submit_button").text("Submit").prop('disabled', false)
                            $('.message_section').html('').hide();
                        },

                        error:function(response)
                        {
                          
                        }
                      });
                });        
            
        })
    </script>
    @endsection
