<?php

namespace Modules\Auth\Http\Controllers;

use Session;
use Modules\Auth\Entities\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;


class HalamanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function halamanUser()
    {
        $users = User::all();
        // dd($users);
        return view('auth::halaman_user.halaman_user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function tambahUser()
    {
        return view('auth::halaman_user.halaman_tambah_user');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function simpanUser(Request $req)
    {
        $cek_email = User::where('email', '=', $req->email)->count();
        if($cek_email ==1) {
            Session::flash('tidak_tersimpan', 'Maff email telah digunakan');
            return redirect('/tambah_user');
        } else {
            $users = new User;
            $users->name = $req->name;
            $users->email = $req->email;
            $users->password = Hash::make($req->password);
            $users->remember_token = Str::random(60);
            $users->role = $req->role;
            $users->save();
            
            Session::flash('tersimpan', 'pengguna baru berhasil ditambahkan');
            return redirect('/kelola_user');
        }
        
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('auth::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function editUser($id)
    {
        $users = User::find($id);
        return view('auth::halaman_user.halaman_edit_user', compact('id', 'users'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function ubahUser(Request $req, $id)
    {
        $cek_email1 = User::where('email', '=', $req->email)->count();
        $cek_email2 = User::find($id);
        if($req->email == $cek_email2->email || $cek_email1 == 0) {
            $user = User::find($id);
            $user->name = $req->name;
            $user->email = $req->email;
            $user->role = $req->role;
            $user->save();
            
            Session::flash('terubah', 'Data user berhasil diubah');
            return redirect('/kelola_user');
        } else {
            Session::flash('tidak_terubah', 'Maaf email telah digunakan');
            return redirect()->back();
        }
        

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function hapusUser($id)
    {        
        $user = User::where('id', $id)->delete();
        
         if($user == 1) {
             $success = true;
             $message = "Data user berhasil dihapus !";
         } else {
             $success = true;
             $message = "gagal";
         }
         return response()->json([
             'success' => $success,
             'message' => $message,
         ]);
    }
}
