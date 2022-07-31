@extends('loginus::layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}">
<link href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
    
@endsection
@section('content')
<div class="container ">
  <div class="row p-5">
    <div class="col-md">
      <p style="font-size: 1.2rem; font-weight: bold;">Silahkan Login untuk mengajukan permintaan informasi dan keberatan serta untuk mengetahui status permintaan informasi dan keberatan yang sudah diajukan.</p>
    </div>
    <div class="col-md shadow p-3 bg-white rounded">
      <p class="text-center" style="font-size: 1.5rem; font-weight: bold;">Masuk</p>
              @if (Session::has('message'))
              <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
              @endif
              @if($message = Session::get('gagal_login'))
                  <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show" style="margin-top: 15px; margin-bottom: 4px;">
                      <span><i class="mdi mdi-help"></i></span>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close" aria-hidden="true">
                      </button>
                      <strong>Peringatan!</strong> {{ $message }}
                  </div>
              @endif
      <form action="{{ route('login.verifikasius') }}" method="POST" name="form_login">
        @if(Session::get('berhasil'))
        <div class="alert alert-success">
          {{Session::get('berhasil')}}
        </div>
        @endif
        @if(Session::get('fail'))
        <div class="alert alert-danger">
          {{Session::get('fail')}}
        </div>
        @endif
        @if(Session::get('failed'))
        <div class="alert alert-danger">
          {{Session::get('failed')}}
        </div>
        @endif
        @if(Session::get('info'))
        <div class="alert alert-info">
          {{Session::get('info')}}
        </div>
        @endif

         @csrf
        <div class="mb-3">
          <input type="email" name="email" placeholder="Email address" class="form-control" required autocomplete="email" autofocus aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <input type="password" placeholder="Password" class="form-control" name="pass" required autocomplete="current-password">
        </div>
        <div class="d-flex justify-content-between">
          <div class=" mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
          
            <a href="#" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm">Lupa password ?</a>
          
        </div>
        
        <button type="submit" class="btn w-100" style="background-color:#ba131a ;">Masuk</button>
        <p class="text-end">Belum terdaftar? <a href="{{url('/register')}}">Daftar</a></p>
        </form>
    </div>
  </div>
  
</div>
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content p-4">
      <p style="font-size: 1rem; font-weight:bold;">Masukan Email Login</p>
      <form action="{{ route('forget.password.post') }}" method="POST">
        @csrf
      <div class="mb-3">
        <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"required autofocus>
        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
      </div>
      <button type="submit" class="btn mb-1" style="background-color:#ba131a ;">
        Kirim
     </button>
      <button class="btn text-danger" type="button" data-bs-dismiss="modal">Batal</button>
    </div>
  </form>
  </div>
</div>
@endsection
@section('script')
<script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins-init/sweetalert.init.js')}}"></script>
<script src="{{asset('assets/vendor/toastr/js/toastr.min.js')}}"></script>
    <script>
      @if ($message = Session::get('berhasil'))
    toastr.success("{{ $message }}","Selamat !!", {
        timeOut:5e3,
        closeButton:!0,
        debug:!1,
        newestOnTop:!0,
        progressBar:!0,
        positionClass:"toast-top-right",
        preventDuplicates:!0,
        onclick:null,
        showDuration:"2000",
        hideDuration:"1000",
        extendedTimeOut:"1000",
        showEasing:"swing",
        hideEasing:"linear",
        showMethod:"fadeIn",
        hideMethod:"fadeOut",
        tapToDismiss:!1
    });
    @endif
    @if ($message = Session::get('sukses_ubah'))
    toastr.success("{{ $message }}","Selamat !!", {
        timeOut:5e3,
        closeButton:!0,
        debug:!1,
        newestOnTop:!0,
        progressBar:!0,
        positionClass:"toast-top-right",
        preventDuplicates:!0,
        onclick:null,
        showDuration:"2000",
        hideDuration:"1000",
        extendedTimeOut:"1000",
        showEasing:"swing",
        hideEasing:"linear",
        showMethod:"fadeIn",
        hideMethod:"fadeOut",
        tapToDismiss:!1
    });
    @endif
    @if ($message = Session::get('gagall'))
    toastr.warning("{{ $message }}","Perhatikan !!", {
        timeOut:5e3,
        closeButton:!0,
        debug:!1,
        newestOnTop:!0,
        progressBar:!0,
        positionClass:"toast-top-right",
        preventDuplicates:!0,
        onclick:null,
        showDuration:"2000",
        hideDuration:"1000",
        extendedTimeOut:"1000",
        showEasing:"swing",
        hideEasing:"linear",
        showMethod:"fadeIn",
        hideMethod:"fadeOut",
        tapToDismiss:!1
    });
    @endif
    @if ($message = Session::get('berhasil'))
            swal(
                "Selamat !!",
                "{{ $message }}",
                "success"
            )
    @endif
    @if ($message = Session::get('info_email'))
    toastr.info("{{ $message }}","Perhatikan !!", {
        timeOut:5e3,
        closeButton:!0,
        debug:!1,
        newestOnTop:!0,
        progressBar:!0,
        positionClass:"toast-top-right",
        preventDuplicates:!0,
        onclick:null,
        showDuration:"2000",
        hideDuration:"1000",
        extendedTimeOut:"1000",
        showEasing:"swing",
        hideEasing:"linear",
        showMethod:"fadeIn",
        hideMethod:"fadeOut",
        tapToDismiss:!1
    });
    @endif
    @if ($message = Session::get('info_email'))
            swal(
                "Info !!",
                "{{ $message }}",
                "info"
            )
    @endif
    @if ($message = Session::get('failed'))
    toastr.warning("{{ $message }}","Perhatikan !!", {
        timeOut:5e3,
        closeButton:!0,
        debug:!1,
        newestOnTop:!0,
        progressBar:!0,
        positionClass:"toast-top-right",
        preventDuplicates:!0,
        onclick:null,
        showDuration:"2000",
        hideDuration:"1000",
        extendedTimeOut:"1000",
        showEasing:"swing",
        hideEasing:"linear",
        showMethod:"fadeIn",
        hideMethod:"fadeOut",
        tapToDismiss:!1
    });
    @endif
    @if ($message = Session::get('failed'))
            swal(
                "Peringatan !!",
                "{{ $message }}",
                "warning"
            )
    @endif
    // @if ($message = Session::get('gagal'))
    //         swal(
    //             "Gagal",
    //             "{{ $message }}",
    //             "info"
    //         )
    // @endif
    </script>
@endsection
