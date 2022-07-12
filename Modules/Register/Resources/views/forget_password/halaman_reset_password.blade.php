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
	
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Password</div>
                    <div class="card-body">
    
                        <form action="{{ route('reset.password.post') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
    
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="pass" required autofocus>
                                    @if ($errors->has('pass'))
                                        <span class="text-danger">{{ $errors->first('pass') }}</span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Konfirmasi Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password-confirm" class="form-control" name="current_pass" required autofocus>
                                    @if ($errors->has('current_pass'))
                                        <span class="text-danger">{{ $errors->first('current_pass') }}</span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="col-md-6 offset-md-4">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>