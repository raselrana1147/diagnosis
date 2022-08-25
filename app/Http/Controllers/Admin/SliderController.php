<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Slider;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Image;

class SliderController extends Controller
{
    
    function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatable()
    {
    	$datas=Slider::orderBy('id','DESC')->get();
    	
    	 return DataTables::of($datas)
    	 ->addIndexColumn()
    	  ->editColumn('image',function(Slider $data){
	           $url=$data->image ? asset("assets/backend/image/slider/small/".$data->image) 
	           :asset("assets/backend/image/".default_image());
	           return '<img src='.$url.' border="0" width="120" height="50" class="img-rounded" />';         
    	   })
	  	  
    	 ->editColumn('action',function(Slider $data){
    	          return '<a href="'.route('slider.edit',$data->id).'" class="btn btn-success btn-sm">
    	           <i class="icofont icofont-ui-edit"></i>
    	           </a>
    	            <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('slider.delete').'"  item_id="'.$data->id.'">
    	            <i class="icofont icofont-delete-alt"></i>
    	           </a>';
    	 })
    	->rawColumns(['image','action'])
    	 ->make(true);
    }


    public  function index()
    {
    	return view('admin.slider.index');
    }


    public function create()
    {
    	return view('admin.slider.create');
    }


    public function store(Request $request)
    {

    	$this->validate($request, [
    	     'image' => 'required',
             'title_1' => 'required',
             'title_2' => 'required',
    	 ]);

    	if ($request->isMethod('post'))
    	  {
    	      DB::beginTransaction();

    	      try{

    	          //create Slider

    	          $slider = new Slider();

    	          $slider->title_1 = $request->title_1;
    	          $slider->title_2 = $request->title_2;
    	          if($request->hasFile('image')){

    	                  $image=$request->image;
    	            
    	                  $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
    	                  $original_image_path = base_path().'/assets/backend/image/slider/original/'.$image_name;
    	                  $large_image_path = base_path().'/assets/backend/image/slider/large/'.$image_name;
    	                  $medium_image_path = base_path().'/assets/backend/image/slider/medium/'.$image_name;
    	                  $small_image_path = base_path().'/assets/backend/image/slider/small/'.$image_name;

    	                  //Resize Image
    	                  Image::make($image)->save($original_image_path);
    	                  Image::make($image)->resize(1920,680)->save($large_image_path);
    	                  Image::make($image)->resize(1920,1080)->save($medium_image_path);
    	                  Image::make($image)->resize(650,450)->save($small_image_path);
    	                  $slider->image = $image_name;
    	              
    	          }

    	          $slider->save();

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
        $data=Slider::findOrFail($id);
        return view('admin.slider.edit',compact('data'));
    }


    public function update(Request $request)
    {

            $this->validate($request, [
                  'title_1' => 'required',
                  'title_2' => 'required',
             ]);

       if ($request->isMethod('post'))
         {
             DB::beginTransaction();

             try{

                 //update Slider
                 $slider=Slider::findOrFail($request->id);
                 $slider->title_1 = $request->title_1;
                 $slider->title_2 = $request->title_2;
                 
                 if($request->hasFile('image')){

                         // delete current image

                       if (File::exists(base_path('/assets/backend/image/slider/small/'.$slider->image))) 
                         {
                           File::delete(base_path('/assets/backend/image/slider/small/'.$slider->image));
                         }
                         if (File::exists(base_path('/assets/backend/image/slider/medium/'.$slider->image))) 
                         {
                           File::delete(base_path('/assets/backend/image/slider/medium/'.$slider->image));
                         }

                         if (File::exists(base_path('/assets/backend/image/slider/large/'.$slider->image)))
                          {
                            File::delete(base_path('/assets/backend/image/slider/large/'.$slider->image));
                          }

                          if (File::exists(base_path('/assets/backend/image/slider/original/'.$slider->image)))
                          {
                             File::delete(base_path('/assets/backend/image/slider/original/'.$slider->image));
                          }
                         // upload new image
                         $image=$request->image;
                         $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
                         $original_image_path = base_path().'/assets/backend/image/slider/original/'.$image_name;
                         $large_image_path = base_path().'/assets/backend/image/slider/large/'.$image_name;
                         $medium_image_path = base_path().'/assets/backend/image/slider/medium/'.$image_name;
                         $small_image_path = base_path().'/assets/backend/image/slider/small/'.$image_name;

                         //Resize Image
                        Image::make($image)->save($original_image_path);
                        Image::make($image)->resize(1920,680)->save($large_image_path);
                        Image::make($image)->resize(1920,1080)->save($medium_image_path);
                        Image::make($image)->resize(650,450)->save($small_image_path);
                        $slider->image = $image_name;
                     
                 }

                 $slider->save();

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

     $data=Slider::findOrFail($request->item_id);

     if (File::exists(base_path('/assets/backend/image/slider/small/'.$data->image))) 
       {
         File::delete(base_path('/assets/backend/image/slider/small/'.$data->image));
       }
       if (File::exists(base_path('/assets/backend/image/slider/medium/'.$data->image))) 
       {
         File::delete(base_path('/assets/backend/image/slider/medium/'.$data->image));
       }

       if (File::exists(base_path('/assets/backend/image/slider/large/'.$data->image)))
        {
          File::delete(base_path('/assets/backend/image/slider/large/'.$data->image));
        }

        if (File::exists(base_path('/assets/backend/image/slider/original/'.$data->image)))
        {
           File::delete(base_path('/assets/backend/image/slider/original/'.$data->image));
        }
     $data->delete();
     $notification=['alert'=>'success','message'=>'Successfully Delete','status'=>200];

     return \response()->json([
         'message' => 'Successfully deleted',
         'status_code' => 200
     ], Response::HTTP_OK);

    }
}
