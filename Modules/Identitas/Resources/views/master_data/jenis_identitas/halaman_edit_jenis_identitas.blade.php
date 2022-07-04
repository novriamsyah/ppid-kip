@extends('auth::layouts.master')

@section('css')

<link rel="stylesheet" href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}">
    
@endsection

@section('content')
<div class="row page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Jenis Identitas</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit Data Jenis Identitas</a></li>
    </ol>
</div>
<!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Data Jenis Identitas</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form class="needs-validation" action="{{url('/ubah_identitas/'.$id)}}" method="POST" name="edit_identitas_form" enctype="multipart/form-data" >

                        @csrf
                        
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3 row">
                                    <label class="col-lg-2 col-form-label" for="val-jenis_identitas">Jenis Identitas
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="val-jenis_identitas" name="jenis_identitas"  placeholder="Masukan jenis identitas" value="{{$j_identitas->jenis_identitas}}">
                                        <div class="invalid-feedback">
                                           Mohon Masukan Data Jenis Identitas.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-2 col-form-label" for="val-id_jenis_pemohon">Jenis Pemohon   
                                    </label>
                                    <div class="col-lg-8">
                                        <select class="default-select wide form-control required" id="val-id_jenis_pemohon" name="id_jenis_pemohon">
                                            <option value="">-- Pilih Jenis Pemohon --</option>
                                            @foreach ($j_pemohon as $pemohon)
                                            <option value="{{$pemohon->id}}">{{$pemohon->jenis_pemohon}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                <div class="col-lg-10 ms-auto">
                                    <a href="{{url('/simpan_identitas')}}"><button type="submit" class="btn btn-primary">Ubah Data</button></a>
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
      $("form[name='edit_identitas_form']").validate({
        rules: {
          jenis_identitas: "required",
          id_jenis_pemohon: "required"
        },
        messages: {
            jenis_identitas: "<span style='color: red;'>Jenis pemohon tidak boleh kosong</span>",
            id_jenis_pemohon: "<span style='color: red;'>Jenis Pemohon tidak boleh kosong</span>"         
        },
        submitHandler: function(form) {
          form.submit();
        }
      });
    });
</script>
@endsection