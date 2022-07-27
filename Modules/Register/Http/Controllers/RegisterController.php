<?php

namespace Modules\Register\Http\Controllers;

use Session;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Modules\Register\Entities\Register;
use Modules\Pekerjaan\Entities\KelompokPekerjaan;
use Modules\Identitas\Entities\JenisIdentitas as identitas;
use Modules\Pemohon\Entities\JenisPemohon;
use Modules\Template\Entities\Template;
use Modules\Register\Entities\VerifyUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

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
        // return view('register::forget_password.template_email');
    }

    public function getidentitas(Request $req) {
        $id_pemohon = $req->id_pemohon;
        $ambil_identitas = identitas::where('id_jenis_pemohon', $id_pemohon)->get();

        // var_dump($ambil_identitas);

        foreach($ambil_identitas as $iden) {
            echo "<option value='$iden->jenis_identitas'>$iden->jenis_identitas</option>";
        }
    }

    public function getidentitasM(Request $req) {
        $id_pemohon_m = $req->id_pemohon;
        $ambil_identitas_m = identitas::where('id_jenis_pemohon', $id_pemohon_m)->get();

        // var_dump($ambil_identitas);

        foreach($ambil_identitas_m as $iden) {
            echo "<option value='$iden->jenis_identitas'>$iden->jenis_identitas</option>";
        }
    }

    public function halamanRegister() 
    {
        $regis_user = Register::all();
        return view('register::kelola_register', compact('regis_user'));
    }

     /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function simpanRegister(Request $req)
    {
        $cek_email = Register::where('email', '=', $req->email)->count();
        if($cek_email == 1) {
            Session::flash('tidak_tersimpan', 'Maaf email yang anda masukan telah digunakan');
            return back();
        }else {

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
        $simpan = $regis_user->save();
        $last_id = $regis_user->id;
        $token = $last_id.hash('sha256', Str::random(120));
        $verifyUrl = VerifyUser::create([
            'user_id'=>$last_id,
            'token'=>$token
        ]);

        $nama_usr = $req->nama_lengkap;
        $message = 'Haloo <b>'.$req->nama_lengkap.'</b>';
        $message = 'Terima kasih sudah mendaftarkan akun, selanjutnya kamu harus melakukan verifikasi ke email';

        $email_data = [
            'recipient'=>$req->email,
            'fromEmail'=>'ppid@komisiinformasi.go.id',
            'fromName'=>'PPID Komisi Informasi Pusat',
            'subject'=>'Email Verifikasi',
            'body'=>$message,
            'actionLink'=>$verifyUrl,
            'token'=>$token,
        ];

        Mail::send('register::email_template',['last_id'=>$last_id, 'token'=>$token, 'email_data'=>$email_data, 'nama_usr'=>$nama_usr], function($message) use ($email_data){
            $message->to($email_data['recipient'])
            ->from($email_data['fromEmail'], $email_data['fromName'])
            ->subject($email_data['subject']);
        });

        if($simpan) {
            // Session::flash('tersimpan', 'Kamu berhasil mendaftar,  silahkan verifikasi email');
            return redirect()->route('loginus')->with('berhasil', 'kamu berhasil daftar, silahkan verifikasi lewat email');
        } else {
            return redirect()->route('regis.user')->with('gagall', 'kamu gagal mendaftar');
        }
    }


        // dd(json_encode($req->jenis_identitas));
        

        // $jenis_data = implode(',', $req->jenis_identitas);
        // $new_jenis = "[".$jenis_data."]";
        // $testa = json_decode($new_jenis, true);

        // dd($testa);



    }

    public function verify($id, $token)
    {
        // $token = $request->token;
        $verifyUser = VerifyUser::where('token', $token)->first();
        // dd($verifyUser);
        if (!is_null($verifyUser)){
            // echo "ada";
            $penggunas = Register::where('id', $id)->first();
            // dd($penggunas);

            if(!$penggunas->email_verifikasi){
                $penggunas->email_verifikasi = 1;
                $penggunas->save();
                return redirect()->route('loginus')->with('info', 'Email sudah diverifikasi, silahkan login');

            } else {
                return redirect()->route('loginus')->with('info', 'Email sudah siap digunakan, silahkan login')->with('verifiedEmail', $verifyUser->email);
            }
        }
    }

}
