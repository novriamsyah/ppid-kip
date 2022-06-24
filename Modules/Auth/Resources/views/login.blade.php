<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Workload : Workload Project Management Admin  Bootstrap 5 Template" />
	<meta property="og:title" content="Workload : Workload Project Management Admin  Bootstrap 5 Template" />
	<meta property="og:description" content="Workload : Workload Project Management Admin  Bootstrap 5 Template" />
	{{-- <meta property="og:image" content="https:/workload.dexignlab.com/xhtml/social-image.png" /> --}}
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Komisi Informasi</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/iconfav.png') }}" />
    <link href="{{ asset('assets/vendor/sweetalert/css/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>
<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.html"><img src="{{ asset('assets/images/logo-ki.png') }}" alt=""  style="width: 300px; height:110px;"></a>
                                    </div>
                                    <h4 class="text-center mb-4">Masuk Ke Akun Anda</h4>
                                    
                                    @if($message = Session::get('gagal_login'))
                                    {{-- <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 15px; margin-bottom: -20px;">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button> <strong>Peringatan!</strong> {{ $message }}</div> --}}
                                        <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show" style="margin-top: 15px; margin-bottom: 4px;">
                                            <span><i class="mdi mdi-help"></i></span>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close" aria-hidden="true">
                                            </button>
                                            <strong>Peringatan!</strong> {{ $message }}
                                        </div>
                                    @endif
                                    <form action="{{ route('auth.verifikasi') }}" method="POST" name="form_login">
    
                                        @csrf
    
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control" required autocomplete="email" autofocus>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control" required autocomplete="current-password">
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            {{-- <div class="mb-3">
                                               <div class="form-check custom-checkbox ms-1">
                                                    <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Ingat saya</label>
                                                </div>
                                            </div> --}}
                                            {{-- <div class="mb-3">
                                                <a href="page-forgot-password.html">Lupa Password?</a>
                                            </div> --}}
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Belum punya Akun? <a class="text-primary" href="#">Daftar</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendor/common/common.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets/js/login/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/login/settings.js') }}"></script>
    <script src="{{ asset('assets/js/login/gleek.js') }}"></script>
    <script src="{{ asset('assets/js/dlabnav-init.js') }}"></script>
	<script src="{{ asset('assets/js/styleSwitcher.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.form-validator.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/sweetalert/js/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $( document ).on( 'focus', ':input', function(){
                $( this ).attr( 'autocomplete', 'off' );
            });
        });
        $(function() {
          $("form[name='form_login']").validate({
            rules: {
              email: {
                required: true,
                email: true
              },
              password: {
                required: true,
                minlength: 5
              }
            },
            messages: {
              email: "<span style='color: red;'>Email tidak boleh kosong dan format email harus sesuai</span>",
              password: "<span style='color: red;'>Password tidak boleh kosong</span>"
            },
            submitHandler: function(form) {
              form.submit();
            }
          });
        });
        @if ($message = Session::get('tersimpan'))
        swal(
            "Berhasil!",
            "{{ $message }}",
            "success"
        )
        @endif
    </script>
</body>
</html>


