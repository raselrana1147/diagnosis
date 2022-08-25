<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Admin\Test;

class TestController extends Controller
{
    

    function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatable()
    {
    	$datas=Test::orderBy('id','DESC')->get();
    	
    	 return DataTables::of($datas)
    	 ->addIndexColumn()
    	 ->editColumn('country',function(Test $data){
    	          return $data->country->country_name;
    	 })
    	 ->editColumn('action',function(Test $data){
    	          return '<a href="'.route('test.edit',$data->id).'" class="btn btn-success btn-sm">
    	           <i class="icofont icofont-ui-edit"></i>
    	           </a>
    	            <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('test.delete').'"  item_id="'.$data->id.'">
    	            <i class="icofont icofont-delete-alt"></i>
    	           </a>';
    	 })
    	->rawColumns(['country','action'])
    	 ->make(true);
    }


    public  function index()
    {
    	return view('admin.test.index');
    }


    public function create()
    {
    	$countries=DB::table('countries')->get();
    	return view('admin.test.create',compact('countries'));
    }


    public function store(Request $request)
    {

    	$this->validate($request, [
    	     'test_name' => 'required',
    	     'country_id' => 'required',
    	 ]);

    	if ($request->isMethod('post'))
    	  {
    	      DB::beginTransaction();

    	      try{
    	          //create
    	          $test = new Test();
    	          $test->test_name = $request->test_name;
    	          $test->country_id = $request->country_id;
    	        
    	          $test->save();
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
    	$countries=DB::table('countries')->get();
        $data=Test::findOrFail($id);
        return view('admin.test.edit',compact('data','countries'));
    }


    public function update(Request $request)
    {

         $this->validate($request, [
              'test_name' => 'required',
              'country_id' => 'required',
          ]);
       if ($request->isMethod('post'))
         {
             DB::beginTransaction();

             try{

                 //update
                $test =Test::findOrFail($request->id);
                $test->test_name = $request->test_name;
                $test->country_id = $request->country_id;
                
                $test->save();
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

     $data=Test::findOrFail($request->item_id)->delete();
     return \response()->json([
         'message' => 'Successfully deleted',
         'status_code' => 200
     ], Response::HTTP_OK);
    }

}
