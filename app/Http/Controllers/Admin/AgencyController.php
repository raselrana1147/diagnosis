<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Admin\Agency;

class AgencyController extends Controller
{
    

    function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatable()
    {
    	$datas=Agency::orderBy('id','DESC')->get();
    	
    	 return DataTables::of($datas)
    	 ->addIndexColumn()
    	 ->editColumn('action',function(Agency $data){
    	          return '<a href="'.route('agency.edit',$data->id).'" class="btn btn-success btn-sm">
    	           <i class="icofont icofont-ui-edit"></i>
    	           </a>
    	            <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('agency.delete').'"  item_id="'.$data->id.'">
    	            <i class="icofont icofont-delete-alt"></i>
    	           </a>';
    	 })
    	->rawColumns(['action'])
    	 ->make(true);
    }


    public  function index()
    {
    	return view('admin.agency.index');
    }


    public function create()
    {
    	return view('admin.agency.create');
    }


    public function store(Request $request)
    {

    	$this->validate($request, [
    	     'agency_name' => 'required',
    	 ]);

    	if ($request->isMethod('post'))
    	  {
    	      DB::beginTransaction();

    	      try{
    	          //create
    	          $agency = new Agency();
    	          $agency->agency_name = $request->agency_name;
    	         

    	          $agency->save();
    	          DB::commit();

    	          return \response()->json([
    	              'message' => "Successfully added",
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


    public function edit($id){
        $data=Agency::findOrFail($id);
        return view('admin.agency.edit',compact('data'));
    }


    public function update(Request $request)
    {

         $this->validate($request, [
              'agency_name' => 'required',
          ]);
       if ($request->isMethod('post'))
         {
             DB::beginTransaction();

             try{

                 //update
                $agency =Agency::findOrFail($request->id);
                $agency->agency_name = $request->agency_name;
                

                $agency->save();
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



    public function delete(Request $request){

     $data=Agency::findOrFail($request->item_id)->delete();

     return \response()->json([
         'message' => 'Successfully deleted',
         'status_code' => 200
     ], Response::HTTP_OK);

    }
}
