<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Admin\Report;
use App\Models\Admin\Country;
use App\Models\Contact;


class HomeController extends Controller
{
    public function index()
    {
        $sliders=DB::table('sliders')->latest()->get();
    	return view('index',compact('sliders'));
    }

    public function report_search(Request $request)
    {
        $report=Report::where('report_number',$request->search_key)->first();
        return view('front.report_search',compact('report'));
    }


    public function about_us()
    {
    	return view('front.about_us');
    }


    public function service()
    {
         $services=DB::table('services')->latest()->get();
    	return view('front.service',compact('services'));
    }

    public function contact_us()
    {
    	return view('front.contact_us');
    }

    public function privacy_policy()
    {
    	return view('front.privacy_policy');
    }

    public function term_condition()
    {
    	return view('front.term_condition');
    }

    public function package_pricing(){
    	$countries=Country::latest()->get();
    	return view('front.package_pricing',compact('countries'));
    }


    public function store_contact(Request $request)
    {

        
         $contact=new Contact();
         $contact->name=$request->name;
         $contact->email=$request->email;
         $contact->phone=$request->phone;
         $contact->subject=$request->msg_subject;
         $contact->message=$request->message;
         $contact->save();
         $notification=['message'=>'You message send successfully','status'=>200];
         return json_encode($notification);
    }

}
