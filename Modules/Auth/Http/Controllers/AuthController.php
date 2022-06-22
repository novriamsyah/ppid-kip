<?php

namespace Modules\Auth\Http\Controllers;

use Auth;
use Session;
use Modules\Auth\Entities\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function halaman_login()
    {
        $pengguna = User::all();
        return view('auth::login', compact('pengguna'));
    }

    // Verifikasi Login
    public function verifikasiLogin(Request $request)
    {
    	if(Auth::attempt($request->only('email', 'password')))
    	{
    		return redirect('/dashboard');
    	}
        Session::flash('gagal_login', 'Maaf username atau password anda salah');
    	return redirect('/auth/login');
    }

    // Proses Logout
    public function prosesLogout()
    {
    	Auth::logout();
    	return redirect('auth/login');
    }

    public function halaman_register()
    {
        return view('auth::register');
    }




    
}
