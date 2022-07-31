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
        margin-top: -18px;
        margin-left: 200px;
        color: white;
        background: rgb(247, 114, 114);
        border-radius: 5px;
        padding: 2px 10px;
        

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
        <li class="breadcrumb-item active"><a href="{{url('/kelola_template')}}">Data Template</a></li>
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
                                    <input type="hidden" value="verifikasi" name="kategori">
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
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <!-- LOGO -->
                                <tr>
                                    <td bgcolor="#FF4D4D" align="center">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                            <tr>
                                                <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#FF4D4D" align="center" style="padding: 0px 10px 0px 10px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                            <tr>
                                                <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                                                    <h1 style="font-size: 48px; font-weight: 400; margin: 2;">Selamat datang</h1> <img src="https://user-images.githubusercontent.com/52773931/178525826-080b87fa-2983-4e86-b5c6-aaa8654963c1.png" width="300px" height="110px" style="display: block; border: 0px;" />
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                            @php
                                            $template = \Modules\Template\Entities\Template::Where('kategori', '=','verifikasi')->orderBy('id', 'DESC')->first();
                                            
                                            @endphp
                                            <tr>
                                                <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                                    <p style="margin: 0;">Halo, Nama Pendaftar</p><br>
                                                   {{-- <p style="background-color: #00A15D; color:#ffffff">{{strip_tags($template->isi)}}</p>  --}}
                                                    
                                                   <div class="komponen">
                                                        <div class="komponen_head">Template Edit</div>
                                                        <p >{!! $template->isi !!}</p> 
                                                   </div>
                                                   
                                                </td>
                                            </tr>
                                            <tr>
                                                <td bgcolor="#ffffff" align="left">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            
                                                            <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td align="center" style="border-radius: 3px;" bgcolor="#FF4D4D"><a href="#" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #FF4D4D; display: inline-block;">Konfirmasi Email</a></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                                    <p style="margin: 0;">Jika Kamu ada pertanyaan, silahkan email ke kontak resmi dari Komisi Informasi Indonesia</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                                    <p style="margin: 0;"><strong>Hormat Kami,</strong><br>Komisi Informasi Indonesia</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                            <tr>
                                                <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;"> <br>
                                                    <p style="margin: 0;">If these emails get annoying, please feel free to <a href="#" target="_blank" style="color: #111111; font-weight: 700;">unsubscribe</a>.</p>
                                                </td>
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