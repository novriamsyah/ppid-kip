<?php

namespace Modules\PermintaanUser\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\OlehInformasi\Entities\OlehInformasi;
use Modules\DapatInformasi\Entities\Dptinformasi;
use Modules\PPIDTujuan\Entities\TujuanPpid;
use Modules\PermintaanUser\Entities\Permintaan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Register\Entities\Register;
use Modules\Keberatan\Entities\AlasanKeberatan;

class PermintaanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // $cek_user = DB::table('register')->select('id')->get();
        $cek_id_user = session()->get('id');
        $ambil_data = DB::table('permintaan_users')
        ->where('id_user_minta', $cek_id_user)
        ->get();

        // dd($ambil_data);

        if(!session()->has('id')){
            return redirect()->route('loginus');
        }else{
        
        return view('permintaanuser::halaman_permintaan_user', ['ambil_data'=>$ambil_data]);
        // dd($ambil_data);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function tambahPermintaan()
    {
        $data_cdi = Dptinformasi::all();
        $data_cpi = OlehInformasi::all();
        $tujuan_ppid = TujuanPpid::all();

        if(!session()->has('id')){
            return redirect()->route('loginus');
        }else{
            return view('permintaanuser::halaman_tambah_permintaan', ['data_cdi'=>$data_cdi, 'data_cpi'=>$data_cpi, 'tujuan_ppid'=>$tujuan_ppid]);
        }
        
    }
    public function tambahKeberatan()
    {
        // $data_cdi = Dptinformasi::all();
        // $data_cpi = OlehInformasi::all();
        $cek_id_user = session()->get('id');
        $ambil_data = DB::table('permintaan_users')
        ->where('id_user_minta', $cek_id_user)
        ->get();
        $tujuan_ppid = TujuanPpid::all();
        $alasan_keberatan = AlasanKeberatan::all();

        if(!session()->has('id')){
            return redirect()->route('loginus');
        }else{
            return view('permintaanuser::halaman_tambah_keberatan', ['tujuan_ppid'=>$tujuan_ppid, 'alasan_keberatan'=>$alasan_keberatan, 'ambil_data'=>$ambil_data]);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function simpanPermintaan(Request $req)
    {
        $cek_maks = Permintaan::select('permintaan_users.noreg')->count();
        $tahun = carbon::now();
        $thn = $tahun->isoFormat('/YYYY');

        if($cek_maks == null) {
            $max_code = "REG-1/PPID.KK".$thn;
        } else {
            $con_code = $cek_maks;
            $con_code++;
                $max_code = "REG-".$con_code."/PPID.KK".$thn;
        }

        if($req->dikuasakan == "0" || $req->dikuasakan == null){
            $dikuasa = 0;
        } else {
            $dikuasa = 1;
        }

        if($dikuasa == "1") {

        
        $permintaan_us = new Permintaan;
        $permintaan_us->id_user_minta = $req->id_user_minta;
        $permintaan_us->mendapatkan = $req->mendapatkan;
        $permintaan_us->memperoleh = $req->memperoleh;
        $permintaan_us->ppid_tujuan = $req->ppid_tujuan;
        $permintaan_us->isi = $req->isi;
        $permintaan_us->tujuan = $req->tujuan;
        $permintaan_us->dikuasakan = $dikuasa;
        $permintaan_us->nama_kuasa = $req->nama_kuasa;
        $permintaan_us->nik_kuasa = $req->nik_kuasa;
        $permintaan_us->kontak_kuasa = $req->kontak_kuasa;
        $permintaan_us->alamat_kuasa = $req->alamat_kuasa;
        $permintaan_us->noreg = $max_code;

        $file_dk = $req->file('doc_kuasa');
        $permintaan_us->doc_kuasa = $file_dk->getClientOriginalName();
        $file_dk->move(public_path('file/'), $file_dk->getClientOriginalName());

        $file_ik = $req->file('identitas_kuasa');
        $permintaan_us->identitas_kuasa = $file_ik->getClientOriginalName();
        $file_ik->move(public_path('file/'), $file_ik->getClientOriginalName());

        $file_dkm = $req->file('dokumen');
        $permintaan_us->dokumen = $file_dkm->getClientOriginalName();
        $file_dkm->move(public_path('file/'), $file_dkm->getClientOriginalName());

        $file_pd = $req->file('pendukung');
        $permintaan_us->pendukung = $file_pd->getClientOriginalName();
        $file_pd->move(public_path('file/'), $file_pd->getClientOriginalName());

        $simpan = $permintaan_us->save();
        if($simpan) {
            // Session::flash('tersimpan', 'Kamu berhasil mendaftar,  silahkan verifikasi email');
            return redirect()->route('user.minta')->with('success', 'kamu berhasil melakukan permintaan');
        } else {
            return redirect()->route('tambah.permintaan')->with('fail', 'kamu gagal melakukan permintaan');
        }
        } else {
        $permintaan_us = new Permintaan;
        $permintaan_us->id_user_minta = $req->id_user_minta;
        $permintaan_us->mendapatkan = $req->mendapatkan;
        $permintaan_us->memperoleh = $req->memperoleh;
        $permintaan_us->ppid_tujuan = $req->ppid_tujuan;
        $permintaan_us->isi = $req->isi;
        $permintaan_us->tujuan = $req->tujuan;
        $permintaan_us->dikuasakan = $dikuasa;
        $permintaan_us->noreg = $max_code;

        $file_dkm = $req->file('dokumen');
        $permintaan_us->dokumen = $file_dkm->getClientOriginalName();
        $file_dkm->move(public_path('file/'), $file_dkm->getClientOriginalName());

        $file_pd = $req->file('pendukung');
        $permintaan_us->pendukung = $file_pd->getClientOriginalName();
        $file_pd->move(public_path('file/'), $file_pd->getClientOriginalName());

        $simpan = $permintaan_us->save();
        if($simpan) {
            // Session::flash('tersimpan', 'Kamu berhasil mendaftar,  silahkan verifikasi email');
            return redirect()->route('user.minta')->with('success', 'kamu berhasil melakukan permintaan');
        } else {
            return redirect()->route('tambah.permintaan')->with('fail', 'kamu gagal melakukan permintaan');
        }
        }
    }

    public function getPermintaan(Request $req) {
        $id_pemohon_m = $req->id_permintaan;
        $ambil_permintaan = Permintaan::where('id','=', $id_pemohon_m)->get();

        // var_dump($ambil_identitas);

        return response()->json($ambil_permintaan);

        
    }

   
}
