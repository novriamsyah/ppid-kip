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
use Modules\Pekerjaan\Entities\KelompokPekerjaan;

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
                $request->session()->put('nama', $pengguna->nama_lengkap);
                // return redirect('/register');
                // return redirect()->intended('halaman_utama');
                return redirect()->route('hal.utama')->with(['nama_ambil'=>$nama_ambil, 'id_ambil'=>$id_ambil]);
            } else {
                return back()->with('failed', 'Password yang kamu masukan salah');
            }
        }
        // public function signout() {
        //     if(session()->has('id')){
        //         session()->pull('id');
        //         session()->pull('email');
        //         session()->pull('nama');
        //         return redirect()->route('hal.utama');
        //     }
        // }
        
    }

    public function halaman_utama() {
        return view('loginus::halaman_dashboard_user');
    }

    public function profilUser() {
        $ambil_email = session()->get('email');

        $cek_db = DB::table('register')
        ->where('email', $ambil_email)
        ->first();

        $cek_db_id = $cek_db->pekerjaan;

        $cek_db2 = DB::table('jenis_pemohon')
        ->where('id', $cek_db->jenis_pemohon)
        ->first();

        $cek_db3 = DB::table('pekerjaan')
        ->where('id', $cek_db->pekerjaan)
        ->first();

        $kerja = KelompokPekerjaan::all();
        if(!session()->has('id')){
            return redirect()->route('loginus');
        }else{
            return view('loginus::profil_user', ['d_user'=>$cek_db, 'd_user2'=>$cek_db2, 'd_user3'=>$cek_db3, 'kerja'=>$kerja, 'cek_id'=>$cek_db_id]);
        }
        // dd($cek_db3);
        
    }

    public function profilUserEdit(Request $request) {
        // $ambil = $request->all();
        // dd($ambil);
        // dd($request->id);

        $updateUser = Register::where('id', $request->id)
        ->update([
            'nama_lengkap'=>$request->nama_lengkap,
            'npwp'=>$request->npwp,
            'alamat'=>$request->alamat,
            'telp'=>$request->telp,
            'ket'=>$request->ket,
            'pekerjaan'=>$request->pekerjaan
        ]);
        return redirect('/profil_user')->with('success', 'Data profil kamu berhasil diubah');
    }

    public function signout() {
            if(session()->has('id')){
                session()->pull('id');
                session()->pull('email');
                session()->pull('nama');
                return redirect()->route('hal.utama');
            }
    }

}
