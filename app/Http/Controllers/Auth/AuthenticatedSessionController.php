<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {


         //  $this->validate($request, [
         //     'email' => 'required',
         //     'password' => 'required', 
         // ]);
         
             if (Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password])) 
             {
               
               $notification=array(
                   'message'=>'Successfully Login !!',
                   'alert-type'=>'success'
                   );
                 return redirect()->intended(route('front_page'))->with($notification);
             }else{
                 $notification=array(
                     'message'=>'Credentians not match !!',
                     'alert-type'=>'error'
                     );
               return redirect()->back()->with($notification);
             }
        
        // $request->authenticate();

        // $request->session()->regenerate();

        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
