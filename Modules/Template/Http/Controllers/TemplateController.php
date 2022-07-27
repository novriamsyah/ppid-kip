<?php

namespace Modules\Template\Http\Controllers;

use Session;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Template\Entities\Template;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function halamanTemplate()
    {
        $template = Template::all();
        $verif = Template::Where('kategori', '=','verifikasi')->orderBy('id', 'DESC')->first();
        $forgot = Template::Where('kategori', '=','lupa_password')->orderBy('id', 'DESC')->first();
        return view('template::halaman_kelola_template', compact('template', 'forgot', 'verif'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function tambahTemplate()
    {
        return view('template::halaman_tambah_template');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function simpanTemplate(Request $req)
    {
        // $cek_data = $req->all();
        // dd($cek_data);

        Template::create($req->all());
            
        Session::flash('tersimpan', 'Data template baru berhasil ditambahkan');
        return redirect('/kelola_template');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function lihatTemplate($id)
    {
        $kategori_isi = Template::find($id);
        return response()->json($kategori_isi);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function editTemplate($id)
    {
        $kategori = Template::find($id);
        return view('template::halaman_edit_template', compact('id', 'kategori'));
    }
    public function editTemplateverif($id)
    {
        $kategori = Template::find($id);
        // $kategori = Template::Where('id', '=',$id)->orderBy('id', 'DESC')->first();
        return view('template::template_verif', compact('id', 'kategori'));
    }
    public function editTemplateforgot($id)
    {
        $kategori = Template::find($id);
        // $kategori = Template::Where('id', '=',$id)->orderBy('id', 'DESC')->first();
        return view('template::template_forgot', compact('id', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function ubahTemplate(Request $req, $id)
    {
        
            // $kategori = $req->all();
            // dd($kategori);
            $kategori = Template::find($id);
            $kategori->kategori = $req->kategori;
            $kategori->isi = $req->isi;
            $kategori->save();
            
            Session::flash('terubah', 'Data template berhasil diubah');
            return back();
       
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function hapusTemplate($id)
    {
        $j_pemohon = Template::where('id', $id)->delete();
        
        if($j_pemohon == 1) {
            $success = true;
            $message = "Data template berhasil dihapus !";
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
