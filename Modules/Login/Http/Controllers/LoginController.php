<?php

namespace Modules\Login\Http\Controllers;

use Auth;
use Session;
use Modules\Login\Entities\Login;
use Modules\Register\Entities\Register;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('reg_user')->except('logout');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function index()
    {
        $register = Register::all();
        return view('login::index', compact('register'));
    }

    public function verifikasiLogin(Request $request) {
        
        // if(Auth::guard('regis_guard')->attempt(['email'=>$request->email, 'pass'=>$request->pass]))
    	// {
        //     // dd(Auth::user()->role);
    	// 	return redirect('/register');
    	// }
        // // Session::flash('gagal_login', 'Maaf email atau password anda salah');
    	// return redirect('/login');

        // dd(Auth::guard('reg_user')->attempt(['email'=>$request->email, 'pass'=>$request->pass]));

        if(Auth::guard('reg_user')->attempt($request->only('email', 'pass')))
    	{
            // dd(Auth::user()->role);
    		return redirect('/register');
    	}
        // Session::flash('gagal_login', 'Maaf email atau password anda salah');
    	return redirect('/login');

    //     $regis = $this->loginGuard($request->get('email'), $request->get('pass'), auth('regis_guard'));

    //     // dd($request->get('email'));

    //     if (!$regis) {
    //         return 'wrong credential';
    //     }
    //     return redirect('/register');
    // }
    // private function loginGuard($email, $pass, $guard) {
    //     $token = $guard->attempt(['email'=>$email, 'pass'=>$pass]);
    //     if (!$token || !$guard->user()->isLoggingIn()) {
    //         return null;
    //     }
    //     return $guard->user();

    }

}
