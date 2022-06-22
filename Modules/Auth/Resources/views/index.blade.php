@extends('auth::layouts.master')

@section('content')
    @if (auth()->user()->role == "super_admin" || auth()->user()->role == "admin_ver")
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 style="text-align: center">Test Level Role </h1>
                        <ul>
                            <li><a href="{{url('/s_admin')}}">superAdmin</a></li>
                            <li><a href="{{url('/admin')}}">Admin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
