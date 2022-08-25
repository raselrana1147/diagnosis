<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Response;
use App\Models\Admin\Social;

class SocialController extends Controller
{
  function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function datatable()
  {
  	$datas=Social::orderBy('id','DESC')->get();
  	
  	 return DataTables::of($datas)
  	 ->addIndexColumn()
  	 ->editColumn('action',function(Social $data){
  	          return '<a href="'.route('social_edit',$data->id).'" class="btn btn-success btn-sm">
  	           <i class="icofont icofont-ui-edit"></i>
  	           </a>
  	            <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('social_delete').'"  item_id="'.$data->id.'">
  	            <i class="icofont icofont-delete-alt"></i>
  	           </a>';
  	 })
  	->rawColumns(['action'])
  	 ->make(true);
  }


  public  function index()
  {
  	return view('admin.social.index');
  }


  public function create()
  {
  	
  	return view('admin.social.create');
  }


  public function store(Request $request)
  {

  	$this->validate($request, [
  	     'title' => 'nullable',
  	     'url' => 'required',
  	     'icon' => 'required',
  	 ]);

  	if ($request->isMethod('post'))
  	  {
  	      DB::beginTransaction();

  	      try{
  	          //create
  	          $social = new Social();
  	          $social->title = $request->title;
  	          $social->url = $request->url;
  	          $social->icon = $request->icon;
  	        
  	          $social->save();
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

      $data=Social::findOrFail($id);
      return view('admin.social.edit',compact('data'));
  }


  public function update(Request $request)
  {

      $this->validate($request, [
           'title' => 'nullable',
           'url' => 'required',
           'icon' => 'required',
       ]);
     if ($request->isMethod('post'))
       {
           DB::beginTransaction();

           try{

               //update
             $social =Social::findOrFail($request->id);
             $social->title = $request->title;
             $social->url = $request->url;
             $social->icon = $request->icon;
             
             $social->save();
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

   $data=Social::findOrFail($request->item_id)->delete();
   return \response()->json([
       'message' => 'Successfully deleted',
       'status_code' => 200
   ], Response::HTTP_OK);

  }
}
