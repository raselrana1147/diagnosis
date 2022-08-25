<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Admin\Country;

class CountryController extends Controller
{
  function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function datatable()
  {
  	$datas=Country::orderBy('id','DESC')->get();
  	
  	 return DataTables::of($datas)
  	 ->addIndexColumn()
  	 ->editColumn('package',function(Country $data){
  	          return $data->package->title;
  	 })
  	 ->editColumn('action',function(Country $data){
  	          return '<a href="'.route('country.edit',$data->id).'" class="btn btn-success btn-sm">
  	           <i class="icofont icofont-ui-edit"></i>
  	           </a>
  	            <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('country.delete').'"  item_id="'.$data->id.'">
  	            <i class="icofont icofont-delete-alt"></i>
  	           </a>';
  	 })
  	->rawColumns(['package','action'])
  	 ->make(true);
  }


  public  function index()
  {
  	return view('admin.country.index');
  }


  public function create()
  {
  	$packages=DB::table('packages')->get();
  	return view('admin.country.create',compact('packages'));
  }


  public function store(Request $request)
  {

  	$this->validate($request, [
  	     'country_name' => 'required',
  	     'package_id' => 'required',
  	 ]);

  	if ($request->isMethod('post'))
  	  {
  	      DB::beginTransaction();

  	      try{
  	          //create
  	          $country = new Country();
  	          $country->country_name = $request->country_name;
  	          $country->package_id = $request->package_id;
  	        
  	          $country->save();
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
  	  $packages=DB::table('packages')->get();
      $data=Country::findOrFail($id);
      return view('admin.country.edit',compact('data','packages'));
  }


  public function update(Request $request)
  {

       $this->validate($request, [
            'country_name' => 'required',
            'package_id' => 'required',
        ]);
     if ($request->isMethod('post'))
       {
           DB::beginTransaction();

           try{

               //update
              $country =Country::findOrFail($request->id);
              $country->country_name = $request->country_name;
              $country->package_id = $request->package_id;
              
              $country->save();
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

   $data=Country::findOrFail($request->item_id)->delete();
   return \response()->json([
       'message' => 'Successfully deleted',
       'status_code' => 200
   ], Response::HTTP_OK);

  }
}
