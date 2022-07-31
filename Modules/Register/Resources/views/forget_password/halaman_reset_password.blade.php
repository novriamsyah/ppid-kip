<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>reset password</title>
    <!-- STYLES -->
    <link rel="stylesheet" href="{{ asset('fron_asset/css/bootstrap.min.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('fron_asset/css/all.min.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('fron_asset/css/slick.css') }}" type="text/css"  media="all" />
    <link rel="stylesheet" href="{{ asset('fron_asset/css/simple-line-icons.css') }}" type="text/css" media="all"/>
    <link rel="stylesheet"  href="{{ asset('fron_asset/css/style.css') }}" type="text/css" media="all"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}">
	
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="margin-top: 50px">
                    <div class="card-header" style="font-weight:bold; font-size:20px; text-align:center" >Reset Password</div>
                    <div class="card-body" style="padding: 30px">
    
                        <form action="{{ route('reset.password.post') }}" method="POST" name="reset_pass_form">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
    
                            <div class="form-group row">
                                <label for="email_address">Email Address</label>
                                <div class="col-md-12">
                                    <input type="text" id="email_address" class="form-control" name="email" style="border: 1px solid #b3b3b3" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password">Password</label>
                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="pass" id="pass" style="border: 1px solid #b3b3b3" required autofocus>
                                    @if ($errors->has('pass'))
                                        <span class="text-danger">{{ $errors->first('pass') }}</span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm">Konfirmasi Password</label>
                                <div class="col-md-12">
                                    <input type="password" id="password-confirm" class="form-control" name="current_pass" style="border: 1px solid #b3b3b3" required autofocus>
                                    @if ($errors->has('current_pass'))
                                        <span class="text-danger">{{ $errors->first('current_pass') }}</span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </form>
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JAVA SCRIPTS -->
<script src="{{ asset('fron_asset/js/jquery.min.js') }}"></script>
<script src="{{ asset('fron_asset/js/popper.min.js') }}"></script>
<script src="{{ asset('fron_asset/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('fron_asset/js/slick.min.js') }}"></script>
<script src="{{ asset('fron_asset/js/jquery.sticky-sidebar.min.js') }}"></script>
<script src="{{ asset('fron_asset/js/custom.js') }}"></script>
<script src="{{asset('assets/vendor/toastr/js/toastr.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.form-validator.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    @if ($message = Session::get('error'))
    toastr.warning("{{ $message }}","Peringatan !!", {
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
    $(function() {
      $("form[name='reset_pass_form']").validate({
        rules: {
          email: "required",
          pass: "required",
          current_pass: {
            required: true,
            equalTo: '#pass'
          },
        },
        messages: {
            email: "<span style='color: red;'>Email tidak boleh kosong</span>",
            pass: "<span style='color: red;'>Password tidak boleh kosong</span>",
            current_pass: {
                required: "<span style='color: red;'>Password tidak boleh kosong</span>",
                equalTo: "<span style='color: red;'>Password konfirmasi tidak sesuai</span>",
            },
        },
        submitHandler: function(form) {
          form.submit();
        }
      });
    });
</script>
</body>
</html>