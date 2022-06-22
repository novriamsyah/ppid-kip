<?php

namespace Modules\Auth\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
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
        $roles = array_slice(func_get_args(), 2);

        foreach ($roles as $role) {
            $user = \Auth::user()->role;

            if ($user == $role) {
                return $next($request);
            }
        }
        return back();
    }

    // public function handle($request, Closure $next,...$roles)
    // {
    //     if(in_array($request->user()->role, $roles))
    //     {
    //         return $next($request);
    //     }

    //     return back();
    // }
}
