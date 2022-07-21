<?php

namespace Modules\Keberatan\Http\Controllers;

use Session;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Keberatan\Entities\AlasanKeberatan;

class KeberatanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function halamanKeberatan()
    {
        $keberatan = AlasanKeberatan::all();
        //dd($j_pemohon);
        return view('keberatan::master_data.keberatan.halaman_keberatan', compact('keberatan'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function tambahKeberatan()
    {
        return view('keberatan::master_data.keberatan.halaman_tambah_keberatan');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function simpanKeberatan(Request $req)
    {
        $cek_keberatan = AlasanKeberatan::where('alasan_keberatan', '=', $req->alasan_keberatan)->count();
        if($cek_keberatan == 1) {
            Session::flash('tidak_tersimpan', 'Maaf alasan keberatan yang anda masukan telah digunakan');
            return redirect('/tambah_keberatan');
        } else {
            $keberatan = new AlasanKeberatan;
            $keberatan->alasan_keberatan = $req->alasan_keberatan;
            $keberatan->save();
            
            Session::flash('tersimpan', 'Data alasan kebertan baru berhasil ditambahkan');
            return redirect('/kelola_keberatan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function editKeberatan($id)
    {
        $keberatan = AlasanKeberatan::find($id);
        return view('keberatan::master_data.keberatan.halaman_edit_keberatan', compact('id', 'keberatan'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function ubahKeberatan(Request $req, $id)
    {
        $keberatan1 = AlasanKeberatan::where('alasan_keberatan', '=', $req->alasan_keberatan)->count();
        $keberatan2 = AlasanKeberatan::find($id);
        if($req->alasan_keberatan == $keberatan2->alasan_keberatan || $keberatan1 == 0) {
            $keberatan = AlasanKeberatan::find($id);
            $keberatan->alasan_keberatan = $req->alasan_keberatan;
            $keberatan->save();
            
            Session::flash('terubah', 'Data alasan keberatan berhasil diubah');
            return redirect('/kelola_keberatan');
        } else {
            Session::flash('tidak_tersimpan', 'Maaf data alasan keberatan telah digunakan');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function hapusKeberatan($id)
    {
        $keberatan = AlasanKeberatan::where('id', $id)->delete();
        
        if($keberatan == 1) {
            $success = true;
            $message = "Data alasan keberatan berhasil dihapus !";
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
