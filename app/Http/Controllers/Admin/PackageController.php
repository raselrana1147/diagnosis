<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Admin\Package;

class PackageController extends Controller
{
    
	function __construct()
	{
	    $this->middleware('auth:admin');
	}

	public function datatable()
	{
		$datas=Package::orderBy('id','DESC')->get();
		
		 return DataTables::of($datas)
		 ->addIndexColumn()
		 ->editColumn('action',function(Package $data){
		          return '<a href="'.route('package.edit',$data->id).'" class="btn btn-success btn-sm">
		           <i class="icofont icofont-ui-edit"></i>
		           </a>
		            <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('package.delete').'"  item_id="'.$data->id.'">
		            <i class="icofont icofont-delete-alt"></i>
		           </a>';
		 })
		->rawColumns(['action'])
		 ->make(true);
	}


	public  function index()
	{
		return view('admin.package.index');
	}


	public function create()
	{
		return view('admin.package.create');
	}


	public function store(Request $request)
	{

		$this->validate($request, [
		     'title' => 'required',
		     'price' => 'required',
		 ]);

		if ($request->isMethod('post'))
		  {
		      DB::beginTransaction();

		      try{
		          //create
		          $package = new Package();
		          $package->title = $request->title;
		          $package->price = $request->price;
		          if ($request->has('previous_price')) 
		          {
		          	$package->previous_price = $request->previous_price;
		          }

		          $package->save();
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
	    $data=Package::findOrFail($id);
	    return view('admin.package.edit',compact('data'));
	}


	public function update(Request $request)
	{

	     $this->validate($request, [
	          'title' => 'required',
	          'price' => 'required',
	      ]);
	   if ($request->isMethod('post'))
	     {
	         DB::beginTransaction();

	         try{

	             //update
	            $package =Package::findOrFail($request->id);
	            $package->title = $request->title;
	            $package->price = $request->price;
	            if ($request->has('previous_price')) 
	            {
	            	$package->previous_price = $request->previous_price;
	            }

	            $package->save();
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

	 $data=Package::findOrFail($request->item_id)->delete();

	 return \response()->json([
	     'message' => 'Successfully deleted',
	     'status_code' => 200
	 ], Response::HTTP_OK);

	}
}
