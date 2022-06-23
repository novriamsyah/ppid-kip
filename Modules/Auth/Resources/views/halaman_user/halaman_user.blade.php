@extends('auth::layouts.master')

@section('css')
<link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
		
<div class="row page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Kelola Data</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Kelola User</a></li>
    </ol>
</div>
<!-- row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Kelola User</h4>
                <a href="{{url('/tambah_user')}}"><button type="button" class="btn btn-primary tambah_pengguna_btn">Tambah User <span class="btn-icon-right"><i class="fa fa-plus"></i></span> </button></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th style="width:80px;"><strong>No</strong></th>
                                <th><strong>NAMA</strong></th>
                                <th><strong>E-MAIL</strong></th>
                                <th><strong>STATUS</strong></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1 ?>
                            @foreach ($users as $pengguna)
                                <tr>
                                    <td><strong>{{$number}}</strong></td>
                                    <td>{{$pengguna->name}}</td>
                                    <td>{{$pengguna->email}}</td>
                                    <td>
                                        @if ($pengguna->role == 'super_admin')
                                        <span class="badge light badge-secondary">Super Admin</span> 
                                        @else  
                                        <span class="badge light badge-primary">Admin Verifikator</span>                                 
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-dark light sharp" data-bs-toggle="dropdown">
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php $number++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
    
@section('script')
<script src="{{asset('assets/vendor/datatables/js/jquery.dataTables.min.js' )}}"></script>
<script src="{{asset('assets/js/plugins-init/datatables.init.js' )}}"></script>

@endsection