<?php

namespace Modules\Register\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Register\Entities\Register;

class IsUserVerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::guard('daftar')->user()->email_verifikasi)
        {
            Auth::guard('daftar')->logout();
            return redirect()->route('loginus')->with('fail', 'kamu harus konfirmasi akun, mohon periksa email dan aktivasi akun kamu sekarang');
        }
        return $next($request);
    }
}
