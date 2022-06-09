@extends('auth::layouts.master')

@section('content')
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <div class="text-center mb-3">
                                    <a href="index.html"><img src="{{ asset('assets/images/logo-ki.png') }}" alt=""  style="width: 300px; height:110px;"></a>
                                </div>
                                <h4 class="text-center mb-4">Daftarkan Akun Saya</h4>
                                <form action="index.html">
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>Username</strong></label>
                                        <input type="text" class="form-control" placeholder="username">
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>Email</strong></label>
                                        <input type="email" class="form-control" placeholder="hallo@contoh.com">
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>Password</strong></label>
                                        <input type="password" class="form-control" value="Password">
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary btn-block">Daftarkan</button>
                                    </div>
                                </form>
                                <div class="new-account mt-3">
                                    <p>Sudah memiliki akun? <a class="text-primary" href="{{route('auth.login')}}">Masuk</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection