<?php

namespace Modules\DapatInformasi\Http\Controllers;

use Session;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\DapatInformasi\Entities\Dptinformasi;

class DapatInformasiController extends Controller
{
    public function halamanCDI()
    {
        $cdi = Dptinformasi::all();
        //dd($j_pemohon);
        return view('dapatinformasi::master_data.cdi.halaman_jenis_cdi', compact('cdi'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function tambahCDI()
    {
        return view('dapatinformasi::master_data.cdi.halaman_tambah_cdi');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function simpanCDI(Request $req)
    {
        $cek_cdi = Dptinformasi::where('cara_dapat_informasi', '=', $req->cara_dapat_informasi)->count();
        if($cek_cdi == 1) {
            Session::flash('tidak_tersimpan', 'Maaf Cara Dapat Informasi yang anda masukan telah digunakan');
            return redirect('/tambah_cdi');
        } else {
            $cdi = new Dptinformasi;
            $cdi->cara_dapat_informasi = $req->cara_dapat_informasi;
            $cdi->save();
            
            Session::flash('tersimpan', 'Data Cara Dapat Informasi baru berhasil ditambahkan');
            return redirect('/kelola_cdi');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('dapatinformasi::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function editCDI($id)
    {
        $cdi = Dptinformasi::find($id);
        return view('dapatinformasi::master_data.cdi.halaman_edit_cdi', compact('id', 'cdi'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function ubahCDI(Request $req, $id)
    {
        $cek_cdi1 = Dptinformasi::where('cara_dapat_informasi', '=', $req->cara_dapat_informasi)->count();
        $cek_cdi2 = Dptinformasi::find($id);
        if($req->cara_dapat_informasi == $cek_cdi2->cara_dapat_informasi || $cek_cdi1 == 0) {
            $cdi = Dptinformasi::find($id);
            $cdi->cara_dapat_informasi = $req->cara_dapat_informasi;
            $cdi->save();
            
            Session::flash('terubah', 'Data Cara Dapat Informasiberhasil diubah');
            return redirect('/kelola_cdi');
        } else {
            Session::flash('tidak_tersimpan', 'Maaf data Cara Dapat Informasi telah digunakan');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function hapusCDI($id)
    {
        $cdi = Dptinformasi::where('id', $id)->delete();
        
        if($cdi == 1) {
            $success = true;
            $message = "Data Cara Dapat Informasi berhasil dihapus !";
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
