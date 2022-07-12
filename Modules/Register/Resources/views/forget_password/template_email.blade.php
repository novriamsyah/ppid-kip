@php
    $template = \Modules\Template\Entities\Template::Where('kategori', '=','lupa_password')->orderBy('id', 'DESC')->first();
    
@endphp
<h1>Forget Password Email</h1><br>
<div>
    <h4>
        {{$template->isi}}
    </h4>
</div>
<br>
<button><a href="{{route('reset.password.get', $token)}}">Reset password</a></button>

