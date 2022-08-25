<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Admin\Report;
use Illuminate\Support\Str;
use App\Models\Admin\Document;
use Image;

class DocumentController extends Controller
{
    
	public function __construct()
	{
	    $this->middleware('auth:admin');
	} 


    public function upload_document($id)
    {
        $documents=Document::where('report_id',$id)->latest()->get();
        return view('admin.document.index',compact('id','documents'));
    }

    public function store_document(Request $request)
    {
        $this->validate($request, [
              'report_file'=> 'required',
              'title'=> 'nullable',
          ]);
            if ($request->isMethod('post'))
              {
                  DB::beginTransaction();

                  try{
                       //add
                        $document       =new Document();
                        $document->title=$request->title;
                        $document->report_id=$request->report_id;
                        // photo 
                        if($request->hasFile('report_file')){

                            $image=$request->report_file;
                          
                            $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
                            $image_path = base_path().'/assets/backend/image/document/'.$image_name;
                            Image::make($image)->save($image_path);
                            $document->report_file = $image_name;
                            
                        }

                        $document->save();
                        DB::commit();
                       return \response()->json([
                           'message' => 'Successfully added',
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

    public function edit($id)
    {
        $data=Document::findOrFail($id);
        return view('admin.document.edit',compact('data'));
    }



    public function update(Request $request)
    {
        $this->validate($request, [
              'title'=> 'nullable',
          ]);
            if ($request->isMethod('post'))
              {
                  DB::beginTransaction();

                  try{
                       //add
                        $document       =Document::findOrFail($request->id);
                        $document->title=$request->title;
                        // photo 
                        if($request->hasFile('report_file')){

                        	if (File::exists(base_path('/assets/backend/image/document/'.$document->report_file))) 
                        	  {
                        	    File::delete(base_path('/assets/backend/image/document/'.$document->report_file));
                        	  }

                            $image=$request->report_file;
                          
                            $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
                            $image_path = base_path().'/assets/backend/image/document/'.$image_name;
                            Image::make($image)->save($image_path);
                            $document->report_file = $image_name;
                            
                        }

                        $document->save();
                        DB::commit();
                       return \response()->json([
                           'message' => 'Successfully updated',
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




    public function delete(Request $request)
    {

     $data=Document::findOrFail($request->item_id);

     if (File::exists(base_path('/assets/backend/image/document/'.$data->report_file))) 
       {
         File::delete(base_path('/assets/backend/image/document/'.$data->document));
       }
     $data->delete();
     $notification=['alert'=>'success','message'=>'Successfully Delete','status'=>200];

     return \response()->json([
         'message' => 'Successfully deleted',
         'status_code' => 200
     ], Response::HTTP_OK);

    }




}
