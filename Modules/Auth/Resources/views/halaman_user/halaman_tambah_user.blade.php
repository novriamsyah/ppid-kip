@extends('auth::layouts.master')

@section('content')
<div class="row page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Kelola User</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Tambah Pengguna</a></li>
    </ol>
</div>
<!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">User Baru</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form class="needs-validation" action="{{url('/simpan_user')}}" method="POST" enctype="multipart/form-data" novalidate >
                        @csrf
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="val-name">Nama
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-name" name="name"  placeholder="Masukan nama.." required>
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
                                        <input type="text" class="form-control" id="val-email" name="email"  placeholder="Masukan emai aktif.." required>
                                        <div class="invalid-feedback">
                                            Mohon Masukan Email Anda.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="val-password">Password
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" id="val-password" name="password" placeholder="Ketikan password yang aman.." required>
                                        <div class="invalid-feedback">
                                            Mohon Masukan Password.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="val-role">Posisi   
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="default-select wide form-control" id="val-role" name="role">
                                            <option  data-display="Select">-- Pilih Posisi --</option>
                                            <option value="super_admin">Super Admin</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                <div class="col-lg-8 ms-auto">
                                    <a href="{{url('/simpan_user')}}"><button type="button" class="btn btn-primary">Tambah User<span
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