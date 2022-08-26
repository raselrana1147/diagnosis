@extends('layouts.admin')
@section('title',config('constant.company_name').' Contact List')
@section('main')
 <div class="page-header">
     <div class="row align-items-end">
         <div class="col-lg-8">
             <div class="page-header-title">
                 <div class="d-inline">
                     <h4>Contact List</h4>
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
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Phone</th>
                                 <th>Subject</th>
                                 <th>Message</th>
                                 
                             </tr>
                             </thead>
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
         var table = $("#simpletable").DataTable({
             processing: true,
             responsive: false,
             serverSide: true,
             ordering: false,
             pagingType: "full_numbers",
             ajax: '{{ route('admin.load_contact') }}',
             columns: [
                 { data: 'DT_RowIndex',name:'DT_RowIndex' },
                 { data: 'name',name:'name'},
                 { data: 'email',name:'email'},
                 { data: 'phone',name:'phone' },
                 { data: 'subject',name:'subject' },
                 { data: 'message',name:'message' },
             ],

              language : {
                   processing: 'Processing'
               },
              
         });
    </script>
 
    @endsection
