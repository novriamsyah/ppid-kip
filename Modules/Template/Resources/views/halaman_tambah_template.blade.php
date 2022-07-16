@extends('auth::layouts.master')

@section('css')

<link rel="stylesheet" href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}">
    
@endsection

@section('content')
<div class="row page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Master Data</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Tambah Template Email</a></li>
    </ol>
</div>
<!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Template Email Baru</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form class="needs-validation" action="{{url('/simpan_template')}}" method="POST" enctype="multipart/form-data" name="template_baru_form" >

                        @csrf
                        
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3 row">
                                    <label class="col-lg-2 col-form-label" for="val-id_jenis_pemohon">Pilih Kategori   
                                    </label>
                                    <div class="col-lg-8">
                                        <select class="default-select wide form-control" id="val-kategori" name="kategori" style="border: 1px solid #000000">
                                            <option value="">-- Pilih Kategori --</option>
                                            <option value="verifikasi">Verifikasi</option>
                                            <option value="lupa_password">Lupa Password</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            pilih kategori
                                         </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-2 col-form-label" for="val-isi">isi
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <textarea name="isi" id="ckeditor" cols="30" rows="10" class="isi"></textarea>
                                        <div class="invalid-feedback">
                                           Mohon Isi.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                <div class="col-lg-10 ms-auto">
                                    <a href="{{url('/simpan_template')}}"><button type="submit" class="btn btn-primary">Tambah data</button></a>
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
<script src="{{ asset('assets/vendor/ckeditor/ckeditor.js')}}"></script>

<script type="text/javascript">
    $(function() {
        $('.isi').ckeditor({
            toolbar: 'Full',
            enterMode: CKEDITOR.ENTER_BR,
            shiftEnterMode: CKEDITOR.ENTER_P
        });
    });
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
      $("form[name='template_baru_form']").validate({
        rules: {
          kategori: "required",
          isi: "required"
        },
        messages: {
            kategori: "<span style='color: red;'>Kategoritidak boleh kosong</span>",
            isi: "<span style='color: red;'>isi tidak boleh kosong</span>"  
        },
        submitHandler: function(form) {
          form.submit();
        }
      });
    });
</script>
@endsection