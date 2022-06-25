<?php

namespace Modules\Auth\Http\Controllers;

use Session;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Auth\Entities\JenisIdentitas;
use Modules\Auth\Entities\JenisPemohon;

class HalJenisIdentitasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function halamanIdentitas()
    {
        $j_identitas = JenisIdentitas::all();
        return view('auth::master_data.jenis_identitas.halaman_jenis_identitas', compact('j_identitas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function tambahIdentitas()
    {
        $j_pemohon = JenisPemohon::all();
        return view('auth::master_data.jenis_identitas.halaman_tambah_jenis_identitas', compact('j_pemohon'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function simpanIdentitas(Request $req)
    {
        $j_identitas = new JenisIdentitas;
        $j_identitas->jenis_identitas = $req->jenis_identitas;
        $j_identitas->id_jenis_pemohon = $req->id_jenis_pemohon;
        $j_identitas->save();

        Session::flash('tersimpan', 'Data jenis identitas berhasil ditambah');
        return redirect('/kelola_identitas');
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
    public function editIdentitas($id)
    {
        $j_pemohon = JenisPemohon::all();
        $j_identitas = JenisIdentitas::find($id);
        return view('auth::master_data.jenis_identitas.halaman_edit_jenis_identitas', compact('id', 'j_pemohon', 'j_identitas'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function ubahIdentitas(Request $req, $id)
    {
        $j_identitas = JenisIdentitas::find($id);
        $j_identitas->jenis_identitas = $req->jenis_identitas;
        $j_identitas->id_jenis_pemohon = $req->id_jenis_pemohon;
        $j_identitas->save();

        Session::flash('terubah', 'Data jenis identitas berhasil diubah');
        return redirect('/kelola_identitas');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function hapusIdentitas($id)
    {
        $j_identitas = JenisIdentitas::find($id);
        $j_identitas->delete();
        Session::flash('terhapus', 'Data jenis identitas berhasil dihapus');
        return redirect('/kelola_identitas');
    }
}
