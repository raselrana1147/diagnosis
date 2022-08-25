<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Admin\TestResult;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Admin\Country;
use App\Models\Admin\Patient;
use App\Models\Admin\Report;
use Illuminate\Support\Str;
use App\Models\Admin\Document;
use App\Models\Admin\Test;
use App\Models\Admin\Agency;
use Image;

class EnrollController extends Controller
{
    //

	function __construct()
	{
	    $this->middleware('auth:admin');
	}

    public function enroll_patient()
    {
    	$countries=Country::latest()->get();
    	$agencies=Agency::latest()->get();
    	return view('admin.enroll.enroll',compact('countries','agencies'));
    }

    public function enroll_store(Request $request)
    {
    	
    	$this->validate($request, [
             'name'        => 'required',
             'email'       => 'nullable',
             'phone'       => 'required',
             'nid'         => 'nullable',
             'passport'    => 'required',
             'age'         => 'required',
             'gender'      => 'required',
             'father_name' => 'nullable',
             'mother_name' => 'nullable',
             'country_id'  => 'required',
             'agency_id'   => 'required',
             'photoStore'  => 'required',

         ]);

    	if ($request->isMethod('post'))
    	  {
    	      DB::beginTransaction();

    	      try{
    	        
    	           //enrollment
    	      		$patient                =new Patient();
    	      		$patient->name          =$request->name;
    	      		$patient->email         =$request->email;
    	      		$patient->phone         =$request->phone;
    	      		$patient->nid           =$request->nid;
                $patient->passport      =$request->passport;
    	      		$patient->age           =$request->age;
    	      		$patient->gender        =$request->gender;
    	      		$patient->father_name   =$request->father_name;
    	      		$patient->mother_name   =$request->mother_name;
                $patient->patient_number="P".mt_rand(100000, 999999);

                    // photo 
                    if (!empty($request->photoStore)) {
                        $encoded_data= $request->photoStore;
                        $binary_data = base64_decode($encoded_data);
                        $photoname   = uniqid().'.jpeg';
                        $result      = file_put_contents(base_path().'/assets/backend/image/photo/'.$photoname, $binary_data);
                        $patient->photo=$photoname;
                    }

                    $patient->save();

                    $report=new Report();
                    $report->patient_id=$patient->id;
                    $report->country_id=$request->country_id;
                    $report->agency_id=$request->agency_id;
                    $report->report_number="RP".mt_rand(100000, 999999);
                    $report->save();

                    $tests=Test::where('country_id',$request->country_id)->get();
                    foreach ($tests as $test) {
                        $test_result=new TestResult();
                        $test_result->report_id=$report->id;
                        $test_result->test_id=$test->id;
                        $test_result->save();
                    }


    	              DB::commit();
                    
                    session()->flash('message','Patient has been enrolled successfully.');
                    return view('admin.enroll.invoice',compact('patient','report'));
    

    	      }catch (QueryException $e){
    	          DB::rollBack();
    	          $error = $e->getMessage();
                  $notification=array('message'=>$error,'alert'=>'danger' ); 
                 return redirect()->back()->with($notification);   
    	      }   
    	  }
    	
    }


    public function report_invoice()
    {
        return view('admin.enroll.invoice');
    }


    public function datatable()
    {
      $datas=Report::orderBy('id','DESC')->get();
      
       return DataTables::of($datas)
       ->addIndexColumn()
       ->editColumn('patient',function(Report $data){
                return '<a class="btn btn-link" href="'.route('admin.patient_detail',$data->patient->id).'">'.$data->patient->patient_number.'</a>';
       })
       ->editColumn('country',function(Report $data){
                return '<a class="btn btn-link" href="'.route('admin.test_detail',$data->country->id).'">'.$data->country->country_name.'</a>';
       })
       ->editColumn('price',function(Report $data){
            return price_format($data->country->package->price);
       })
       ->editColumn('status',function(Report $data){
              $pending = $data->status == 'pending' ? 'selected' : '';
              $processing = $data->status == 'processing' ? 'selected' : '';
              $released = $data->status == 'released' ? 'selected' : '';
            return '<select class="report_status" report_id="'.$data->id.'" data-action="'.route('admin.report_status_change').'">
                   <option value="pending" '.$pending.' >pending</option>
                   <option value="processing" '.$processing.' >processing</option>
                   <option value="released" '.$released.' >released</option>
              </select>';
       })
       ->editColumn('action',function(Report $data){
                return '<a btn-link" href="'.route('admin.upload_document',$data->id).'" class="btn btn-danger btn-sm">

                 <i class="icofont icofont-upload"></i> Upload </a>
                 <a btn-link" href="javascript:;" class="btn btn-dark btn-sm refund" data-toggle="modal" data-target="#refund-Modal" report_id="'.$data->id.'">
                 ৳ Refund </a>

                 <a btn-link" href="'.route('admin.generate_invoice',$data->id).'" class="btn btn-primary btn-sm">
                 <i class="icofont icofont-ui-note"></i>Generate Report</a>
                 ';
       })
      ->rawColumns(['patient','country','price','status','action'])
       ->make(true);
    }

    public function report_list()
    {
      return view('admin.enroll.report_list');
    }


    public function datatable_refund()
    {
      $datas=Report::whereNotIn('refund',[0])->orderBy('id','DESC')->get();
      
       return DataTables::of($datas)
       ->addIndexColumn()
       ->editColumn('patient',function(Report $data){
                return '<a class="btn btn-link" href="'.route('admin.patient_detail',$data->patient->id).'">'.$data->patient->patient_number.'</a>';
       })
       ->editColumn('country',function(Report $data){
                return '<a class="btn btn-link" href="'.route('admin.test_detail',$data->country->id).'">'.$data->country->country_name.'</a>';
       })
       ->editColumn('price',function(Report $data){
            return price_format($data->country->package->price);
       })
       ->editColumn('status',function(Report $data){
              $pending = $data->status == 'pending' ? 'selected' : '';
              $processing = $data->status == 'processing' ? 'selected' : '';
              $released = $data->status == 'released' ? 'selected' : '';
            return '<select class="report_status" report_id="'.$data->id.'" data-action="'.route('admin.report_status_change').'">
                   <option value="pending" '.$pending.' >pending</option>
                   <option value="processing" '.$processing.' >processing</option>
                   <option value="released" '.$released.' >released</option>
              </select>';
       })

       ->editColumn('refund',function(Report $data){
            return price_format($data->refund);
       })
       ->editColumn('action',function(Report $data){
                return '<a btn-link" href="'.route('admin.upload_document',$data->id).'" class="btn btn-danger btn-sm">

                 <i class="icofont icofont-upload"></i> Upload </a>
                 <a btn-link" href="javascript:;" class="btn btn-dark btn-sm refund" data-toggle="modal" data-target="#refund-Modal" report_id="'.$data->id.'">
                 ৳ Refund </a>

                 <a btn-link" href="'.route('admin.generate_invoice',$data->id).'" class="btn btn-primary btn-sm">
                 <i class="icofont icofont-ui-note"></i>Generate Report</a>
                 ';
       })
      ->rawColumns(['patient','country','price','status','refund','action'])
       ->make(true);
    } 
    public function refund_report_list()
    {
      return view('admin.enroll.refund_report_list');
    }

    public function patient_detail($id){
        $data=Patient::findOrFail($id);
        return view('admin.enroll.patient_detail',compact('data'));
    }

    public function test_detail($id){
        $data=Country::findOrFail($id);
        return view('admin.enroll.country_detail',compact('data'));
    }



    public function status_change(Request $request)
    {
        $report=Report::findOrFail($request->report_id);
        $report->status=$request->status;
        $report->save();
      return \response()->json([
          'message' => ' Successfully updated',
          'status_code' => 200
      ], Response::HTTP_OK);
               
    }



    public function generate_report($id)
    {
        $report=Report::findOrFail($id);
        return view('admin.enroll.generate_report',compact('report'));
    }



    public function refund(Request $request)
    {
        $report=Report::findOrFail($request->report_id);
        $report->refund=$request->refund;
        $report->save();
        return \response()->json([
            'message' => ' Successfully refunded',
            'status_code' => 200
        ], Response::HTTP_OK);
    }



  public function update_result(Request $request)
  {

     // dd($request->all());
      if ($request->isMethod('post'))
        {
            DB::beginTransaction();

            try{
              
                 //set result
                 $test_result=TestResult::findOrFail($request->item_id);
                 if ($request->result_type=="positive") {
                   $test_result->positive=$request->result_value;
                  //return "ok";
                 }else {
                    $test_result->negative=$request->result_value;
                  //return "no";
                 }

                    $test_result->save();
                    DB::commit();
                    
                   return \response()->json([
                       'message' => "Successfully updated",
                       'status_code' => 200
                   ], Response::HTTP_OK);
    

            }catch (QueryException $e){
                DB::rollBack();
                $error = $e->getMessage();

                return \response()->json([
                    'error' => $error,
                    'status_code' => 500
                ], Response::HTTP_INTERNAL_SERVER_ERROR);   
            }   
        }
  }


}
