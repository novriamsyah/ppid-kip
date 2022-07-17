<?php

namespace Modules\PPIDtujuan\Http\Controllers;

use Session;
use Modules\PPIDtujuan\Entities\TujuanPpid;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PPIDtujuanController extends Controller
{
    public function halamanTppid()
    {
        $t_ppid = TujuanPpid::all();
        //dd($j_pemohon);
        return view('ppidtujuan::master_data.tujuan.halaman_tujuan_ppid', compact('t_ppid'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function tambahTppid()
    {
        return view('ppidtujuan::master_data.tujuan.halaman_tambah_tujuan_ppid');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function simpanTppid(Request $req)
    {
        $cek_tujuan = TujuanPpid::where('tujuan_ppid', '=', $req->tujuan_ppid)->count();
        if($cek_tujuan == 1) {
            TujuanPpid::flash('tidak_tersimpan', 'Maaf tujuan PPID yang anda masukan telah digunakan');
            return redirect('/tambah_tujuan_ppid');
        } else {
            $tujuan = new TujuanPpid;
            $tujuan->tujuan_ppid = $req->tujuan_ppid;
            $tujuan->save();
            
            Session::flash('tersimpan', 'Data tujuan PPID baru berhasil ditambahkan');
            return redirect('/kelola_tujuan_ppid');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function editTppid($id)
    {
        $t_ppid = TujuanPpid::find($id);
        return view('ppidtujuan::master_data.tujuan.halaman_edit_tujuan_ppid', compact('id', 't_ppid'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function ubahTppid(Request $req, $id)
    {
        $cek_tujuan1 = TujuanPpid::where('tujuan_ppid', '=', $req->tujuan_ppid)->count();
        $cek_tujuan2 = TujuanPpid::find($id);
        if($req->tujuan_ppid == $cek_tujuan2->tujuan_ppid || $cek_tujuan1 == 0) {
            $cdi = TujuanPpid::find($id);
            $cdi->tujuan_ppid = $req->tujuan_ppid;
            $cdi->save();
            
            Session::flash('terubah', 'Data tujuan PPID berhasil diubah');
            return redirect('/kelola_tujuan_ppid');
        } else {
            Session::flash('tidak_tersimpan', 'Maaf data tujuan PPID telah digunakan');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function hapusTppid($id)
    {
        $cdi = TujuanPpid::where('id', $id)->delete();
        
        if($cdi == 1) {
            $success = true;
            $message = "Data tujuan PPID berhasil dihapus !";
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
