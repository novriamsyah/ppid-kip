@extends('auth::layouts.master')

@section('css')

<link rel="stylesheet" href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}">
    
@endsection

@section('content')
<div class="row page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Master Data</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Tambah Jenis Pemohon</a></li>
    </ol>
</div>
<!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Jenis Pemohon Baru</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form class="needs-validation" action="{{url('/simpan_pemohon')}}" method="POST" enctype="multipart/form-data" name="pemohon_baru_form" >

                        @csrf
                        
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="val-name">Jenis Pemohon
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-jenis_pemohon" name="jenis_pemohon"  placeholder="Masukan Jenis Pemohon" required>
                                        <div class="invalid-feedback">
                                           Mohon Masukan Jenis Pemohon.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                <div class="col-lg-8 ms-auto">
                                    <a href="{{url('/simpan_pemohon')}}"><button type="submit" class="btn btn-primary">Tambah data<span
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
      $("form[name='pemohon_baru_form']").validate({
        rules: {
          jenis_pemohon: "required"
        },
        messages: {
            jenis_pemohon: "<span style='color: red;'>Jenis Pemohon tidak boleh kosong</span>" 
        },
        submitHandler: function(form) {
          form.submit();
        }
      });
    });
</script>
@endsection