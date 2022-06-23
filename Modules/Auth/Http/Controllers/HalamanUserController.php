<?php

namespace Modules\Auth\Http\Controllers;

use session;
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
        $users = new User;
        $users->name = $req->name;
        $users->email = $req->email;
        $users->password = Hash::make($req->password);
        $users->remember_token = Str::random(60);
        $users->role = $req->role;
        $users->save();
        
        return redirect('/kelola_user');
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
    public function edit($id)
    {
        return view('auth::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
