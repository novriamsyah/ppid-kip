@extends('auth::layouts.master')

@section('css')

<link rel="stylesheet" href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}">
    
@endsection

@section('content')
<div class="row page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Jenis Cara Mendapatkan Informasi</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit Data Cara Mendapatkan Informasi</a></li>
    </ol>
</div>
<!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Data Cara Mendapatkan Informasi</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form class="needs-validation" action="{{url('/ubah_cdi/'.$id)}}" method="POST" name="edit_cdi_form" enctype="multipart/form-data" >

                        @csrf
                        
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3 row">
                                    <label class="col-lg-2 col-form-label" for="val-jenis_pemohon">Cara Mendapatkan Informasi
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="val-cara_dapat_informasi" name="cara_dapat_informasi"  placeholder="Cara Mendapatkan Informasi" value="{{$cdi->cara_dapat_informasi}}" required style="border: 1px solid #000000">
                                        <div class="invalid-feedback">
                                           Mohon Masukan Data Cara Dapat Informasi.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                <div class="col-lg-10 ms-auto">
                                    <a href="{{url('/simpan_cdi')}}"><button type="submit" class="btn btn-primary">Ubah Data</button></a>
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
      $("form[name='edit_cdi_form']").validate({
        rules: {
            cara_dapat_informasi: "required"
        },
        messages: {
            cara_dapat_informasi: "<span style='color: red;'>input tidak boleh kosong</span>"          
        },
        submitHandler: function(form) {
          form.submit();
        }
      });
    });
</script>
@endsection