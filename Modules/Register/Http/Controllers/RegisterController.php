<?php

namespace Modules\Register\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Modules\Register\Entities\Register;
use Modules\Pekerjaan\Entities\KelompokPekerjaan;
use Modules\Identitas\Entities\JenisIdentitas as identitas;
use Modules\Pemohon\Entities\JenisPemohon;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $kerja = KelompokPekerjaan::all();
        $identitas = identitas::all();
        $pemohon = JenisPemohon::all();
        $j_identitas = DB::table('jenis_identitas')
        ->select('jenis_identitas.jenis_identitas', 'jenis_identitas.id')
        ->join('jenis_pemohon', 'jenis_pemohon.id','=','jenis_identitas.id_jenis_pemohon')->where('jenis_pemohon.jenis_pemohon', '=', 'Kelompok Orang')->get();
        // dd($j_identitas);
         return view('register::index', compact('kerja', 'identitas', 'pemohon', 'j_identitas'));
    }

    public function getidentitas(Request $req) {
        $id_pemohon = $req->id_pemohon;
        $ambil_identitas = identitas::where('id_jenis_pemohon', $id_pemohon)->get();

        // var_dump($ambil_identitas);

        foreach($ambil_identitas as $iden) {
            echo "<option value='$iden->jenis_identitas'>$iden->jenis_identitas</option>";
        }
    }

     /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function simpanRegister(Request $req)
    {
        $regis_user = new Register;
        $regis_user->nama_lengkap = $req->nama_lengkap;
        $regis_user->jenis_pemohon = $req->jenis_pemohon;
        $regis_user->jenis_identitas = $req->jenis_identitas;
        $regis_user->nomor_identitas = $req->nomor_identitas;
        $file_iden = $req->file('file_identitas');
        $regis_user->file_identitas = $file_iden->getClientOriginalName();
        $file_iden->move(public_path('file/'), $file_iden->getClientOriginalName());
        $regis_user->npwp = $req->npwp;
        $regis_user->pekerjaan = $req->pekerjaan;
        $regis_user->alamat = $req->alamat;
        $regis_user->telp = $req->telp;
        $regis_user->ket = $req->ket;
        $regis_user->email = $req->email;
        $regis_user->pass = Hash::make($req->pass);
        // $datas = $req->jenis_identitas;
        // // $testa = json_encode($datas);

        // dd($regis_user);
        $regis_user->save();
        return redirect('/register');

        // dd(json_encode($req->jenis_identitas));
        

        // $jenis_data = implode(',', $req->jenis_identitas);
        // $new_jenis = "[".$jenis_data."]";
        // $testa = json_decode($new_jenis, true);

        // dd($testa);



    }

}
