<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    
    function __construct()
    {
        $this->middleware('guest:admin')->except('destroy');
    }
    public function create()
    {
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
           $notification=['alert'=>'success','message'=>'Successfully login','status'=>200,'route'=>route("admin.dashboard")];
           return json_encode($notification);
       }else{
           $notification=['alert'=>'error','message'=>'Credentials not match','status'=>400,'route'=>'admin_login'];
            return json_encode($notification);
       }    
    }

    
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login')->with('message','Successfully logout');
    }
}
