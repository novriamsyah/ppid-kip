<?php

namespace Modules\Register\Http\Controllers;

use Session;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Carbon\Carbon;
use Modules\Register\Entities\Register;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    // public function showForget()
    // {
    //     return view('register::forget_password.halaman_forget_password');
    // }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function submitForget(Request $request)
    {
        $request->validate([
            'email'=>'required|email'
        ]);

        $token = Str::random(64);

        $cek_email = DB::table('register')
        ->where('email', $request->email)
        ->first();

        $email_data = [
            'recipient'=>$request->email,
            'fromEmail'=>'ppid@komisiinformasi.go.id',
            'fromName'=>'PPID Komisi Informasi Pusat',
            'subject'=>'Reset Password',
            'token'=>$token,
        ];

        if(!$cek_email || empty($cek_email)) {
            return back()->with('failed', 'Email untuk reset password tidak ditemukan, coba lagi !!');
        } else {
            DB::table('ganti_password')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
    
            Mail::send('register::forget_password.template_email', ['token'=>$token, 'email_data'=>$email_data], function($message) use ($email_data){
                $message->to($email_data['recipient'])
                ->from($email_data['fromEmail'], $email_data['fromName'])
                ->subject($email_data['subject']);
                // $message->to($request->email);
                // $message->from('ppid@komisiinformasi.go.id', 'PPID Komisi Informasi');
                // $message->subject('Reset password');
            });
            
            return back()->with('info_email', 'Buka email untuk melakukan reset password');
        }
        
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function showReset($token)
    {
        return view('register::forget_password.halaman_reset_password', ['token'=>$token]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function submitReset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'pass' => 'required|string|min:5',
            'current_pass' => 'required'
        ]);

        $ubahPass = DB::table('ganti_password')
        ->where([
            'email'=>$request->email,
            'token'=>$request->token
        ])->first();

        if(!$ubahPass) {
            return back()->withInput()->with('error', 'token tidak sesuai atau sudah tidak berlaku');
        }

        $updateUser = Register::where('email', $request->email)
        ->update(['pass' => Hash::make($request->pass)]);

        DB::table('ganti_password')->where(['email'=>$request->email])->delete();

        return redirect('/loginus')->with('sukses_ubah', 'Password kamu berhasil diubah, silahkan login kembali');
    }

}

