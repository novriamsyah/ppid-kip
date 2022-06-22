@extends('auth::layouts.master')

@section('content')
    @if (auth()->user()->role == "super_admin")
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 style="text-align: center">Halaman Superadmin, Tidak bisa diakses admin</h1>
                        <button class="btn btn-primary"><a href="{{url('/dashboard')}}">Kembali</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
