<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    
    function __construct()
    {
        $this->middleware('auth:admin');
    }

	public function index()
	{
		$total_report=DB::table('reports')->count();
		$refund_report=DB::table('reports')->whereNotIn('refund',[0])->count();
		$total_package=DB::table('packages')->count();
		$total_country=DB::table('countries')->count();
		return view('admin.index',compact('total_report','refund_report','total_package','total_country'));
	}

	    public function contact_datatable()
	    {
	    	$datas=Contact::orderBy('id','DESC')->get();
	    	
	    	 return DataTables::of($datas)
	    	 ->addIndexColumn()
	    	 ->make(true);
	    }


	    public function datatable_contact()
	    {
	    	$datas=Contact::orderBy('id','DESC')->get();
	    	
	    	 return DataTables::of($datas)
	    	 ->addIndexColumn()
	    	 ->make(true);
	    }

	public function contact_list(){

		return view('admin.contact');
	}
        

    
}
