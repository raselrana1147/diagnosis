<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:4'],
            'privacy' => ['accepted'],
        ]);

        if ($request->isMethod("POST")) {
                 DB::beginTransaction();
            try {
                 $user = User::create([
                     'name' => $request->name,
                     'email' => $request->email,
                     'phone' => $request->phone,
                     'password' => Hash::make($request->password),
                 ]);
                 DB::commit();
                 $notification=['status'=>'200', 'type'=>'success','message'=>'Successfully registration','route'=>route('login')];
                 
            } catch (QueryException $e) {
                 DB::rollBack();
                 $e=$e->getMessage();
                 $notification=['status'=>'422', 'type'=>'error','message'=>$e];
            }
        }
         echo json_encode($notification);

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
    }
}
