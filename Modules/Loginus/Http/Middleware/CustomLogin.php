<?php

namespace Modules\Loginus\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Custom_login
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
        if (!session()->has('id') && $request->path() !== 'halaman_utama') {
            return redirect('halaman_utama')->with('failed', 'Session anda berakhir, silahkan login kembali ke sistem');
        }

        if(session()->has('id') && $request->path() === 'halaman_utama'){
            return back();
        }
        return $next($request)->header('Cahce-Control', 'no-cahce', 'no-store', 'max-age=0', 'must-revalidate')
        ->header('Pragma', 'no-cahce')
        ->header('Expires', 'Sat 01 jan 1990 00:00:00 GMT');
    }
}
