<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Auth\Entities\User;
use Illuminate\Support\Facades\Hash;

class HalProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function halamanProfil()
    {
        return view('auth::halaman_profil');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function ubahPassword(Request $request, $id)
    {
        $user = User::find($id);
        if(Hash::check($request->old_password,  $user->password)) {
            User::where('id', '=', $id)
            ->update(['password' => Hash::make($request->new_password)]);
            echo "sukses";
        } else {
            echo "gagal";
        }
    }

}
