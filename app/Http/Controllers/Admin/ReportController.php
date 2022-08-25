<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Report;
use Carbon\Carbon;


class ReportController extends Controller
{
      public function __construct()
      {
        $this->middleware('auth:admin');
      }

public function daily_report()
{

	 $dateS = new Carbon();
	 $start=$dateS->format('Y-m-d')." 00:00:01";
	 $to=$dateS->format('Y-m-d')." 23:59:59";
     

      $reports=Report::whereIn('refund',[0])
     ->whereBetween('created_at', [$start,$to])
     ->get();
     $total_amount=0;
     foreach ($reports as $key => $report) 
     {
     	$total_amount+=$report->country->package->price;
     }

	  return view('admin.report.daily_report',compact('reports','total_amount'));
}


public function weekly_report()
{

	    $dateS =Carbon::today();
	    $start=$dateS->format('Y-m-d')." 23:59:59";
	    $to=$dateS->subDays(7)->format('Y-m-d')." 00:00:01";

	  //  return $to;

       $reports=Report::whereIn('refund',[0])
      ->whereBetween('created_at', [$to,$start])
      ->get();

      $total_amount=0;
      foreach ($reports as $key => $report) 
      {
      	$total_amount+=$report->country->package->price;
      }

 	  return view('admin.report.weekly_report',compact('reports','total_amount'));
}

public function monthly_report()
{

	    $dateS =Carbon::today();
	    $start=$dateS->format('Y-m-d')." 23:59:59";
	    $to=$dateS->subDays(30)->format('Y-m-d')." 00:00:01";

	  //  return $to;

       $reports=Report::whereIn('refund',[0])
      ->whereBetween('created_at', [$to,$start])
      ->get();

      $total_amount=0;
      foreach ($reports as $key => $report) 
      {
      	$total_amount+=$report->country->package->price;
      }

 	  return view('admin.report.monthly_report',compact('reports','total_amount'));
}


public function custom_report()
{
	  $reports=null;
	  return view('admin.report.custom_report',compact('reports'));
}


public function generate_report(Request $request)
{

	$this->validate($request,[
	    'start_date'=>'required',
	    'end_date'=>'required'
	]);


	$start=date('Y-m-d',strtotime($request->start_date));
	$to=date('Y-m-d',strtotime($request->end_date));

  $reports=Report::whereIn('refund',[0])
   ->whereBetween('created_at', [$to,$start])
   ->get();

     $total_amount=0;
     foreach ($reports as $key => $report) 
     {
     	$total_amount+=$report->country->package->price;
     }

	 return view('admin.report.custom_report',compact('reports','total_amount'));

  }
}
