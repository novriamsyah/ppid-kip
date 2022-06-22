@extends('auth::layouts.master')

@section('content')
    @if (auth()->user()->role == "super_admin" || auth()->user()->role == "admin_ver")
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body" style="align-content: center">
                        <h1 style="text-align: center">Halaman dapat Diakses Superadmin dan Admin </h1>
                        <button class="btn btn-primary"><a href="{{url('/dashboard')}}">Kembali</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
