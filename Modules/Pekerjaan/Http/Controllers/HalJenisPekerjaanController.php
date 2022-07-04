<?php

namespace Modules\Pekerjaan\Http\Controllers;

use Session;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Pekerjaan\Entities\KelompokPekerjaan;

class HalJenisPekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function halamanPekerjaan()
    {
        $j_pekerjaan = KelompokPekerjaan::all();
        //dd($j_pemohon);
        return view('pekerjaan::master_data.jenis_pekerjaan.halaman_jenis_pekerjaan', compact('j_pekerjaan'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function tambahPekerjaan()
    {
        return view('pekerjaan::master_data.jenis_pekerjaan.halaman_tambah_jenis_pekerjaan');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function simpanPekerjaan(Request $req)
    {
        $cek_pekerjaan = KelompokPekerjaan::where('jenis_kerja', '=', $req->jenis_kerja)->count();
        if($cek_pekerjaan == 1) {
            Session::flash('tidak_tersimpan', 'Maaf jenis Pekerjaan yang anda masukan telah digunakan');
            return redirect('/tambah_pekerjaan');
        } else {
            $j_pekerjaan = new KelompokPekerjaan;
            $j_pekerjaan->jenis_kerja = $req->jenis_kerja;
            $j_pekerjaan->save();
            
            Session::flash('tersimpan', 'Data jenis pekerjaan baru berhasil ditambahkan');
            return redirect('/kelola_pekerjaan');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('pekerjaan::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function editPekerjaan($id)
    {
        $j_pekerjaan = KelompokPekerjaan::find($id);
        return view('pekerjaan::master_data.jenis_pekerjaan.halaman_edit_jenis_pekerjaan', compact('id', 'j_pekerjaan'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function ubahPekerjaan(Request $req, $id)
    {
        $cek_pekerjaan1 = KelompokPekerjaan::where('jenis_kerja', '=', $req->jenis_kerja)->count();
        $cek_pekerjaan2 = KelompokPekerjaan::find($id);
        if($req->jenis_kerja == $cek_pekerjaan2->jenis_kerja || $cek_pekerjaan1 == 0) {
            $j_pekerjaan = KelompokPekerjaan::find($id);
            $j_pekerjaan->jenis_kerja = $req->jenis_kerja;
            $j_pekerjaan->save();
            
            Session::flash('terubah', 'Data jenis pekerjaan berhasil diubah');
            return redirect('/kelola_pekerjaan');
        } else {
            Session::flash('tidak_tersimpan', 'Maaf data jenis pekerjaan telah digunakan');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function hapusPekerjaan($id)
    {
        //$j_pekerjaan = KelompokPekerjaan::find($id);
        //$j_pekerjaan->delete();

        //Session::flash('terhapus', 'Data jenis pekerjaan berhasil dihapus');
        //return redirect('/kelola_pekerjaan'); 
        
        $j_pekerjaan = KelompokPekerjaan::where('id', $id)->delete();
        
         if($j_pekerjaan == 1) {
             $success = true;
             $message = "Data pekerja berhasil dihapus !";
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
