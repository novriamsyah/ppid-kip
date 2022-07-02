@extends('auth::layouts.master')

@section('css')

<link rel="stylesheet" href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}">
    
@endsection

@section('content')
<div class="row page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Jenis Pekerjaan</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit Data Jenis Pekerjaan</a></li>
    </ol>
</div>
<!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Data Jenis Pekerjaan</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form class="needs-validation" action="{{url('/ubah_pekerjaan/'.$id)}}" method="POST" name="edit_pekerjaan_form" enctype="multipart/form-data" >

                        @csrf
                        
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3 row">
                                    <label class="col-lg-2 col-form-label" for="val-jenis_kerja">Jenis Pekerjaan
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="val-jenis_kerja" name="jenis_kerja"  placeholder="Masukan jenis pekerjaan" value="{{$j_pekerjaan->jenis_kerja}}" required style="border: 1px solid #000000">
                                        <div class="invalid-feedback">
                                           Mohon Masukan Data Jenis Pekerjaan.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                <div class="col-lg-10 ms-auto">
                                    <a href="{{url('/simpan_pekerjaan')}}"><button type="submit" class="btn btn-primary">Ubah Data</button></a>
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
      $("form[name='edit_pekerjaan_form']").validate({
        rules: {
          jenis_kerja: "required"
        },
        messages: {
            jenis_kerja: "<span style='color: red;'>Jenis Pekerjaan tidak boleh kosong</span>"          
        },
        submitHandler: function(form) {
          form.submit();
        }
      });
    });
</script>
@endsection