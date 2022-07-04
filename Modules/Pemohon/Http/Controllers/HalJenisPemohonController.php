<?php

namespace Modules\Pemohon\Http\Controllers;

use Session;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Pemohon\Entities\JenisPemohon;

class HalJenisPemohonController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function halamanPemohon()
    {
        $j_pemohon = JenisPemohon::all();
        //dd($j_pemohon);
        return view('pemohon::master_data.jenis_pemohon.halaman_jenis_pemohon', compact('j_pemohon'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function tambahPemohon()
    {
        return view('pemohon::master_data.jenis_pemohon.halaman_tambah_jenis_pemohon');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function simpanPemohon(Request $req)
    {
        $cek_pemohon = JenisPemohon::where('jenis_pemohon', '=', $req->jenis_pemohon)->count();
        if($cek_pemohon == 1) {
            Session::flash('tidak_tersimpan', 'Maaf Jenis pemohon yang anda masukan telah digunakan');
            return redirect('/tambah_pemohon');
        } else {
            $j_pemohon = new JenisPemohon;
            $j_pemohon->jenis_pemohon = $req->jenis_pemohon;
            $j_pemohon->save();
            
            Session::flash('tersimpan', 'Data jenis pemohon baru berhasil ditambahkan');
            return redirect('/kelola_pemohon');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('pemohon::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function editPemohon($id)
    {
        $j_pemohon = JenisPemohon::find($id);
        return view('pemohon::master_data.jenis_pemohon.halaman_edit_jenis_pemohon', compact('id', 'j_pemohon'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function ubahPemohon(Request $req, $id)
    {
        $cek_pemohon1 = JenisPemohon::where('jenis_pemohon', '=', $req->jenis_pemohon)->count();
        $cek_pemohon2 = JenisPemohon::find($id);
        if($req->jenis_pemohon == $cek_pemohon2->jenis_pemohon || $cek_pemohon1 == 0) {
            $j_pemohon = JenisPemohon::find($id);
            $j_pemohon->jenis_pemohon = $req->jenis_pemohon;
            $j_pemohon->save();
            
            Session::flash('terubah', 'Data jenis pemohonan berhasil diubah');
            return redirect('/kelola_pemohon');
        } else {
            Session::flash('tidak_tersimpan', 'Maaf data jenis pemohonan telah digunakan');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function hapusPemohon($id)
    {
        $j_pemohon = JenisPemohon::where('id', $id)->delete();
        
        if($j_pemohon == 1) {
            $success = true;
            $message = "Data pemohon berhasil dihapus !";
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
