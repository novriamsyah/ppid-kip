<?php

namespace Modules\OlehInformasi\Http\Controllers;

use Session;
use Modules\OlehInformasi\Entities\OlehInformasi;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OlehInformasiController extends Controller
{
    public function halamanCPI()
    {
        $cpi = OlehInformasi::all();
        //dd($j_pemohon);
        return view('olehinformasi::master_data.cpi.halaman_jenis_cpi', compact('cpi'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function tambahCPI()
    {
        return view('olehinformasi::master_data.cpi.halaman_tambah_cpi');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function simpanCPI(Request $req)
    {
        $cek_cpi = OlehInformasi::where('cara_memperoleh_informasi', '=', $req->cara_memperoleh_informasi)->count();
        if($cek_cpi == 1) {
            Session::flash('tidak_tersimpan', 'Maaf cara memperoleh informasi yang anda masukan telah digunakan');
            return redirect('/tambah_cpi');
        } else {
            $cpi = new OlehInformasi;
            $cpi->cara_memperoleh_informasi = $req->cara_memperoleh_informasi;
            $cpi->save();
            
            Session::flash('tersimpan', 'Data cara memperoleh informasi baru berhasil ditambahkan');
            return redirect('/kelola_cpi');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('olehinformasi::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function editCPI($id)
    {
        $cpi = OlehInformasi::find($id);
        return view('olehinformasi::master_data.cpi.halaman_edit_cpi', compact('id', 'cpi'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function ubahCPI(Request $req, $id)
    {
        $cek_cpi1 = OlehInformasi::where('cara_memperoleh_informasi', '=', $req->cara_memperoleh_informasi)->count();
        $cek_cpi2 = OlehInformasi::find($id);
        if($req->cara_memperoleh_informasi == $cek_cpi2->cara_memperoleh_informasi || $cek_cpi1 == 0) {
            $cdi = OlehInformasi::find($id);
            $cdi->cara_memperoleh_informasi = $req->cara_memperoleh_informasi;
            $cdi->save();
            
            Session::flash('terubah', 'Data cara memperoleh informasi berhasil diubah');
            return redirect('/kelola_cpi');
        } else {
            Session::flash('tidak_tersimpan', 'Maaf data cara memperoleh informasi telah digunakan');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function hapusCPI($id)
    {
        $cdi = OlehInformasi::where('id', $id)->delete();
        
        if($cdi == 1) {
            $success = true;
            $message = "Data cara memperoleh informasi berhasil dihapus !";
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
