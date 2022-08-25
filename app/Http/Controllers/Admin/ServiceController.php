<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Service;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Image;

class ServiceController extends Controller
{
    

    function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatable()
    {
    	$datas=Service::orderBy('id','DESC')->get();
    	
    	 return DataTables::of($datas)
    	 ->addIndexColumn()
    	  ->editColumn('image',function(Service $data){
	           $url=$data->image ? asset("assets/backend/image/service/small/".$data->image) 
	           :asset("assets/backend/image/".default_image());
	           return '<img src='.$url.' border="0" width="120" height="50" class="img-rounded" />';         
    	   })
	  	  
    	 ->editColumn('action',function(Service $data){
    	          return '<a href="'.route('service.edit',$data->id).'" class="btn btn-success btn-sm">
    	           <i class="icofont icofont-ui-edit"></i>
    	           </a>
    	            <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('service.delete').'"  item_id="'.$data->id.'">
    	            <i class="icofont icofont-delete-alt"></i>
    	           </a>';
    	 })
    	->rawColumns(['image','action'])
    	 ->make(true);
    }


    public  function index()
    {
    	return view('admin.service.index');
    }


    public function create()
    {
    	return view('admin.service.create');
    }


    public function store(Request $request)
    {

    	$this->validate($request, [
    	     'image' => 'required',
             'title' => 'required',
             'description' => 'required',
             'icon' => 'nullable',
    	 ]);

    	if ($request->isMethod('post'))
    	  {
    	      DB::beginTransaction();

    	      try{

    	          //create Service

    	          $service = new Service();

    	          $service->title = $request->title;
    	          $service->description = $request->description;
    	          $service->icon = $request->icon;
    	          if($request->hasFile('image')){

    	                  $image=$request->image;
    	            
    	                  $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
    	                  $original_image_path = base_path().'/assets/backend/image/service/original/'.$image_name;
    	                  $large_image_path = base_path().'/assets/backend/image/service/large/'.$image_name;
    	                  $medium_image_path = base_path().'/assets/backend/image/service/medium/'.$image_name;
    	                  $small_image_path = base_path().'/assets/backend/image/service/small/'.$image_name;

    	                  //Resize Image
    	                  Image::make($image)->save($original_image_path);
    	                  Image::make($image)->resize(1920,680)->save($large_image_path);
    	                  Image::make($image)->resize(1920,1080)->save($medium_image_path);
    	                  Image::make($image)->resize(650,450)->save($small_image_path);
    	                  $service->image = $image_name;
    	              
    	          }

    	          $service->save();

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
        $data=Service::findOrFail($id);
        return view('admin.service.edit',compact('data'));
    }


    public function update(Request $request)
    {

	$this->validate($request, [
    	    
             'title' => 'required',
             'description' => 'required',
             'icon' => 'nullable',
    	 ]);

       if ($request->isMethod('post'))
         {
             DB::beginTransaction();

             try{

                 //update service
                 $service =Service::findOrFail($request->id);

                 $service->title = $request->title;
                 $service->description = $request->description;
                 $service->icon = $request->icon;
                 
                 if($request->hasFile('image')){

                         // delete current image

                       if (File::exists(base_path('/assets/backend/image/service/small/'.$service->image))) 
                         {
                           File::delete(base_path('/assets/backend/image/service/small/'.$service->image));
                         }
                         if (File::exists(base_path('/assets/backend/image/service/medium/'.$service->image))) 
                         {
                           File::delete(base_path('/assets/backend/image/service/medium/'.$service->image));
                         }

                         if (File::exists(base_path('/assets/backend/image/service/large/'.$service->image)))
                          {
                            File::delete(base_path('/assets/backend/image/service/large/'.$service->image));
                          }

                          if (File::exists(base_path('/assets/backend/image/service/original/'.$service->image)))
                          {
                             File::delete(base_path('/assets/backend/image/service/original/'.$service->image));
                          }
                         // upload new image
                         $image=$request->image;
                         $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
                         $original_image_path = base_path().'/assets/backend/image/service/original/'.$image_name;
                         $large_image_path = base_path().'/assets/backend/image/service/large/'.$image_name;
                         $medium_image_path = base_path().'/assets/backend/image/service/medium/'.$image_name;
                         $small_image_path = base_path().'/assets/backend/image/service/small/'.$image_name;

                         //Resize Image
                        Image::make($image)->save($original_image_path);
                        Image::make($image)->resize(1920,680)->save($large_image_path);
                        Image::make($image)->resize(1920,1080)->save($medium_image_path);
                        Image::make($image)->resize(650,450)->save($small_image_path);
                        $service->image = $image_name;
                     
                 }

                 $service->save();

                 DB::commit();

                 return \response()->json([
                     'message' => 'Data updated successfully',
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

     $data=Service::findOrFail($request->item_id);

     if (File::exists(base_path('/assets/backend/image/service/small/'.$data->image))) 
       {
         File::delete(base_path('/assets/backend/image/service/small/'.$data->image));
       }
       if (File::exists(base_path('/assets/backend/image/service/medium/'.$data->image))) 
       {
         File::delete(base_path('/assets/backend/image/service/medium/'.$data->image));
       }

       if (File::exists(base_path('/assets/backend/image/service/large/'.$data->image)))
        {
          File::delete(base_path('/assets/backend/image/service/large/'.$data->image));
        }

        if (File::exists(base_path('/assets/backend/image/service/original/'.$data->image)))
        {
           File::delete(base_path('/assets/backend/image/service/original/'.$data->image));
        }
     $data->delete();
     $notification=['alert'=>'success','message'=>'Successfully Delete','status'=>200];

     return \response()->json([
         'message' => 'Successfully deleted',
         'status_code' => 200
     ], Response::HTTP_OK);

    }
}
