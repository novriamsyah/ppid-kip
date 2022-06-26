@extends('auth::layouts.master')

@section('css')

<link rel="stylesheet" href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}">
    
@endsection

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
                    <form class="needs-validation" action="{{url('/simpan_user')}}" method="POST" enctype="multipart/form-data" name="pengguna_baru_form" novalidate >

                        @csrf
                        
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3 row">
                                    <label class="col-lg-2 col-form-label" for="val-name">Nama
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="val-name" name="name"  placeholder="Masukan nama.." required>
                                        <div class="invalid-feedback">
                                           Mohon Masukan Nama.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-2 col-form-label" for="val-email">Email <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="val-email" name="email"  placeholder="Masukan emai aktif.." required>
                                        <div class="invalid-feedback">
                                            Mohon Masukan Email Anda.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-2 col-form-label" for="val-password">Password
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="password" class="form-control" id="val-password" name="password" placeholder="Ketikan password yang aman.." required>
                                        <div class="invalid-feedback">
                                            Mohon Masukan Password.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-2 col-form-label" for="val-role">Posisi   
                                    </label>
                                    <div class="col-lg-8">
                                        <select class="default-select wide form-control" id="val-role" name="role">
                                            <option value="">-- Pilih Posisi --</option>
                                            <option value="super_admin">super_admin</option>
                                            <option value="admin_ver">admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                <div class="col-lg-10 ms-auto">
                                    <a href="{{url('/simpan_user')}}"><button type="submit" class="btn btn-primary">Tambah User</button></a>
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
@section('script')
<script src="{{asset('assets/vendor/toastr/js/toastr.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.form-validator.min.js')}}"></script>

<script type="text/javascript">
    @if ($message = Session::get('tidak_tersimpan'))
    toastr.warning("{{ $message }}","Peringatan !", {
        timeOut:5e3,
        closeButton:!0,
        debug:!1,
        newestOnTop:!0,
        progressBar:!0,
        positionClass:"toast-top-right",
        preventDuplicates:!0,
        onclick:null,
        showDuration:"300",
        hideDuration:"1000",
        extendedTimeOut:"1000",
        showEasing:"swing",
        hideEasing:"linear",
        showMethod:"fadeIn",
        hideMethod:"fadeOut",
        tapToDismiss:!1
    });
    @endif
    $(function() {
      $("form[name='pengguna_baru_form']").validate({
        rules: {
          name: "required",
          email: {
            required: true,
          },
          password: {
            required: true,
            minlength: 5
          },
          role: "required"
        },
        messages: {
          name: "<span style='color: red;'>Nama tidak boleh kosong</span>",
          email: "<span style='color: red;'>Email tidak boleh kosong</span>",
          password: {
            required: "<span style='color: red;'>Password tidak boleh kosong</span>",
            minlength: "<span style='color: red;'>Kata sandi harus lebih dari 5 karakter</span>"
          },
          role: "<span style='color: red;'>Silakan pilih posisi</span>"
        },
        submitHandler: function(form) {
          form.submit();
        }
      });
    });
</script>
@endsection