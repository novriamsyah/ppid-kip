@php
    $template = \Modules\Template\Entities\Template::Where('kategori', '=','verifikasi')->orderBy('id', 'DESC')->first();
    
@endphp
<h1>Aktivasi Akun Anda</h1>

<div>
    <h3>Hallo, {{$nama_usr}}</h3><br>
    {{$template->isi}}
    <br>
    <button class="btn btn-primary"><a href="{{url('veri_email/'.$last_id . '/'.$token)}}">verifikasi Email</a></button>
</div><br>
<p>Atau</p><br>
<div>
Klik tautan berikut ini : 
<a href="{{url('veri_email/'.$last_id . '/'.$token)}}">{{url('veri_email/'.$last_id . '/'.$token)}}</a>

</div>

