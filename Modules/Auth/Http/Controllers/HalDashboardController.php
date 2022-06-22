<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HalDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function home()
    {
        return view('auth::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function s_admin()
    {
        return view('auth::superadmin');
    }

    public function admin()
    {
        return view('auth::admin');
    }
}
