@extends('auth::layouts.master')

@section('css')

<link rel="stylesheet" href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}">
    
@endsection

@section('content')
<div class="row page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Kategori</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit Data kategori</a></li>
    </ol>
</div>
<!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Data Kategori</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form class="needs-validation" action="{{url('/ubah_template/'.$id)}}" method="POST" name="edit_template_form" enctype="multipart/form-data" >

                        @csrf
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3 row">
                                    <label class="col-lg-2 col-form-label" for="val-id_jenis_pemohon">Pilih Kategori   
                                    </label>
                                    <div class="col-lg-8">
                                        <select class="default-select wide form-control" id="val-kategori" name="kategori" style="border: 1px solid #000000">
                                            <option value="">-- Pilih Kategori --</option>
                                            @foreach (["verifikasi"=>"Verifikasi", "lupa_password"=>"Lupa Pasword"] AS $kategory=>$katelabel)
                                            <option value="{{$kategory}}" {{old("isi", $kategori->kategori) == $kategory ? "selected" : ""}}>{{$katelabel}}</option>
                                            @endforeach
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
                                        <textarea name="isi" id="ckeditor" cols="30" rows="10" class="isi">{{$kategori->isi}}</textarea>
                                        <div class="invalid-feedback">
                                           Mohon Isi.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                <div class="col-lg-10 ms-auto">
                                    <a href="#"><button type="submit" class="btn btn-primary">Ubah data</button></a>
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
      $("form[name='edit_template_form']").validate({
        rules: {
          jenis_identitas: "required",
          id_jenis_pemohon: "required"
        },
        messages: {
            jenis_identitas: "<span style='color: red;'>Jenis identitas tidak boleh kosong</span>",
            id_jenis_pemohon: "<span style='color: red;'>Jenis Pemohon tidak boleh kosong</span>"
        },
        submitHandler: function(form) {
          form.submit();
        }
      });
    });
</script>
@endsection