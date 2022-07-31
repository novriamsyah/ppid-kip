@extends('auth::layouts.master')

@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}">
<link href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

<style>
    .komponen{
        border: solid rgb(247, 114, 114);
        border-style: dashed;
        border-radius: 5px;
    }
    .komponen .komponen_head {
        position: absolute;
        margin-top: -13px;
        margin-left: 230px;
        color: white;
        background: rgb(247, 114, 114);
        border-radius: 5px;
        padding: 2px 10px;
        

    }
    .komponen_head p {
        color:#455056; 
        font-size:32px;
        line-height:24px;
    }
    
[aria-expanded="false"] > .expanded, [aria-expanded="true"] > .collapsed {
        display: none;
    }
    
    /* p {
      margin-left:14px;
      font-size:12px;
      color:#333;
      margin-bottom:-6px;
    } */
</style>
    
@endsection

@section('content')
<div class="row page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Template</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit Data Template Email</a></li>
    </ol>
</div>
<!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Data Template Email</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form class="needs-validation" action="{{url('/ubah_template/'.$id)}}" method="POST" name="edit_template_form" enctype="multipart/form-data" >

                        @csrf
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3 row">
                                    <input type="hidden" value="lupa_password" name="kategori">
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-form-label" for="val-isi">isi
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-12">
                                        <textarea name="isi" id="ckeditor" cols="30" rows="10" class="isi">{{$kategori->isi}}</textarea>
                                        <div class="invalid-feedback">
                                           Mohon Isi.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                <div class="col-lg-12 ms-auto">
                                    <a href="#"><button type="submit" class="btn btn-primary">Ubah data</button></a>
                                    <a href="{{url('/kelola_template')}}" class="btn btn-dark" role="button">Kembali</a>
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
<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="accordion accordion-no-gutter accordion-bordered" id="accordion-four">
                    <div class="accordion-item">
                      <div class="accordion-header  rounded-lg" id="accord-4One" data-bs-toggle="collapse" data-bs-target="#collapse4One" aria-controls="collapse4One"   aria-expanded="true"  role="button">
                        <span class="accordion-header-text" style="font-weight: bold; font-size:16px">Preview Template Verifikasi email</span>
                       <span class="accordion-header-indicator" style="font_weight:bold; font-size:20px"></span>
                      </div>
                      <div id="collapse4One" class="collapse accordion__body show" aria-labelledby="accord-4One" data-bs-parent="#accordion-four">
                        <div class="accordion-body-text">
                            <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
                            style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
                            <tr>
                                <td>
                                    <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                                        align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td style="height:80px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center;">
                                              <a href="#" title="logo" target="_blank">
                                                <img width="330px" height="110px" src="https://user-images.githubusercontent.com/52773931/178525826-080b87fa-2983-4e86-b5c6-aaa8654963c1.png" title="logo" alt="logo">
                                              </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="height:20px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                                    style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                                    <tr>
                                                        <td style="height:40px;">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        @php
                                                            $template = \Modules\Template\Entities\Template::Where('kategori', '=','lupa_password')->orderBy('id', 'DESC')->first();
                                                            
                                                        @endphp
                                                        <td style="padding:0 35px;">
                                                            <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">Kamu Meminta Untuk Reset Password</h1>
                                                            <span
                                                                style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                            {{-- <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                                {!!$template->isi!!}
                                                            </p> --}}
                                                            <div class="komponen">
                                                                <div class="komponen_head">Template Edit</div>
                                                                <p style="font-size:32px;">{!!$template->isi!!}</p> 
                                                           </div>
                                                            <a href="#"
                                                                style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Reset
                                                                Password</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="height:40px;">&nbsp;</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        <tr>
                                            <td style="height:20px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center;">
                                                <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>www.komisiinformasi.go.id</strong></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="height:80px;">&nbsp;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>


    
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="{{asset('assets/vendor/toastr/js/toastr.min.js')}}"></script>
<script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins-init/sweetalert.init.js')}}"></script>
<script src="{{asset('assets/js/jquery.form-validator.min.js')}}"></script>
<script src="{{ asset('assets/vendor/ckeditor/ckeditor.js')}}"></script>

<script type="text/javascript">
    @if ($message = Session::get('tersimpan'))
        swal(
            "berhasil",
            "{{ $message }}",
            "success"
        )
    @endif
    @if ($message = Session::get('terubah'))
        swal(
            "berhasil",
            "{{ $message }}",
            "success"
        )
    @endif
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