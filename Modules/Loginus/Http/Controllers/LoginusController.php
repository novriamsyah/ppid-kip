<?php

namespace Modules\Loginus\Http\Controllers;

// use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Register\Entities\Register;

class LoginusController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:pengguna')->except('logout');
    }

    public function index()
    {
        $register = Register::all();
        return view('loginus::index', compact('register'));
        // return view('loginus::halaman_dashboard_user');
    }

    public function verifikasiLogin(Request $request)
    {
        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required|min:6'
        // ]);

        // dd(Auth::guard('pengguna')->attempt($request->only('email', 'pass')));
        // $regis = Auth::guard('pengguna')->attempt($request->only('email', 'pass'));
        // if ($regis) {
        //             return 'credential';
        //         }
        //         return 'wrong';
        // $request['pass'] = Hash::make($request['pass']);
        // $regis = attempt(['email'=>$request->email, 'pass'=>$request->pass]);
        // dd(Auth::guard('pengguna')->attempt(['email'=>$request->email, 'pass'=>Has$request->pass]));

        $pengguna = DB::table('register')
        ->where('email', $request->email)
        ->first();

        $nama_ambil = $pengguna->nama_lengkap;
        $id_ambil = $pengguna->id;

        // dd($pengguna);

        if(!$pengguna || empty($pengguna)) {
            return back()->with('failed', 'Data anda tidak ditemukan');
        } else if($pengguna->email_verifikasi == 0) {
            return back()->with('failed', 'Kamu harus verifikasi email');
        } else {
            if (Hash::check($request->pass, $pengguna->pass)) {
                $request->session()->put('id', $pengguna->id);
                $request->session()->put('email', $pengguna->email);
                // return redirect('/register');
                // return redirect()->intended('halaman_utama');
                return redirect()->route('hal.utama')->with(['nama_ambil'=>$nama_ambil, 'id_ambil'=>$id_ambil]);
            } else {
                return back()->with('failed', 'Password yang kamu masukan salah');
            }
        }

        // public function signout() {
        //     if(session()->has('id')){
        //         session()->pull('email');
        //         return redirect('/login');
        //     }
        // }
        
    }

    public function halaman_utama() {
        return view('loginus::halaman_dashboard_user');
    }

}
