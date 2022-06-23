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
                    <form class="needs-validation" action="{{url('/ubah_user/'.$id)}}" method="POST" name="edit_pengguna_form" enctype="multipart/form-data" novalidate >

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
        positionClass:"toast-bottom-right",
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
      $("form[name='edit_pengguna_form']").validate({
        rules: {
          name: "required",
          email: {
            required: true,
          },
          password: {
            required: true,
            minlength: 5
          },
          role: "required",
        },
        messages: {
          name: "<span style='color: red;'>Nama tidak boleh kosong</span>",
          email: "<span style='color: red;'>Email tidak boleh kosong</span>",
          password: {
            required: "<span style='color: red;'>Password tidak boleh kosong</span>",
            minlength: "<span style='color: red;'>Kata sandi harus lebih dari 5 karakter</span>"
          },
          role: "<span style='color: red;'>Silakan pilih posisi</span>",
        },
        submitHandler: function(form) {
          form.submit();
        }
      });
    });
</script>
@endsection