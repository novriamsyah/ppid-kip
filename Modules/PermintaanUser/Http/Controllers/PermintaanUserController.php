<?php

namespace Modules\PermintaanUser\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\OlehInformasi\Entities\OlehInformasi;
use Modules\DapatInformasi\Entities\Dptinformasi;
use Modules\PPIDTujuan\Entities\TujuanPpid;
use Illuminate\Support\Facades\Session;

class PermintaanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if(!session()->has('id')){
            return redirect()->route('loginus');
        }else{
            return view('permintaanuser::halaman_permintaan_user');
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

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('permintaanuser::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('permintaanuser::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
