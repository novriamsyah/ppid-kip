@extends('auth::layouts.master')

@section('content')
<div class="row page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Kelola User</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit User</a></li>
    </ol>
</div>
<!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Data User</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form class="needs-validation" action="{{url('/ubah_user/'.$id)}}" method="POST" enctype="multipart/form-data" novalidate >

                        @csrf
                        
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="val-name">Nama
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-name" name="name"  placeholder="Masukan nama.." value="{{$users->name}}" required>
                                        <div class="invalid-feedback">
                                           Mohon Masukan Nama.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Email <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-email" name="email"  placeholder="Masukan emai aktif.." value="{{$users->email}}" required>
                                        <div class="invalid-feedback">
                                            Mohon Masukan Email Anda.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="val-role">Posisi   
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="default-select wide form-control" id="val-role" name="role">
                                            <option  value="">-- Pilih Posisi --</option>
                                            @if ($users->role == 'super_admin')
                                            <option value="super_admin" selected="">super_admin</option>
                                            <option value="admin_ver">admin</option>
                                            @else
                                            <option value="super_admin">super_admin</option>
                                            <option value="admin_ver" selected="">admin</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                <div class="col-lg-8 ms-auto">
                                    <a href="{{url('/simpan_user')}}"><button type="submit" class="btn btn-primary">Ubah Data<span
                                        class="btn-icon-end"><i class="fa fa-plus"></i></span>
                                </button></a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection