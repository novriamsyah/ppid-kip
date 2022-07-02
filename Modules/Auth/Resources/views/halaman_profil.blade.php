@extends('auth::layouts.master')

@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}">
<link href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
	<style>
	.role-primary {
		color: #7571f9;
		border: 1px solid #7571f9;
		font-weight: bold;
	}
	.role-success {
		color: #6fd96f;
		border: 1px solid #6fd96f;
		font-weight: bold;
	}
	</style>
@endsection

@section('content')
    <div class="row">
    	<div class="col-lg-12">
        	<div class="card">
                <div class="card-body">
					<h2>My Profile</h2>
                	<form method="POST" enctype="multipart/form-data" class="form_edit_identitas">
                		@csrf
	                	<div class="row">
	                		<div class="col-md-4 d-flex justify-content-start">
	                			<div class="identitas ml-4">
	                				<p class="text-dark font-weight-bold ubah_nama_text" style="font-size: 16px;">Nama : {{ auth()->user()->name }}</p>
	                				<input type="text" name="ubah_nama_input" class="ubah_nama_input mb-3" value="{{ auth()->user()->name }}" hidden="">
									<p class="text-dark font-weight-bold ubah_nama_text" style="font-size: 16px;">Email: {{ auth()->user()->email }}</p>
	                				@if(auth()->user()->role == 'super_admin')
	                				<div class="btn btn-sm font-weight-bold role-success" style="margin-top: -10px;">{{ auth()->user()->role }}</div>
	                				@else
	                				<div class="btn btn-sm font-weight-bold role-primary" style="margin-top: -10px;">{{ auth()->user()->role }}</div>
                                    @endif
	                			</div>
	                		</div>
	                	</div>
                	</form>
                </div>
            </div>
        </div>
    </div>
	<div class="row">
		<div class="col-xl-6 col-lg-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Ubah Password</h4>
				</div>
				<div class="card-body">
					<div class="basic-form">
						<form method="POST" class="ubah_password_form">
							@csrf
							<div class="mb-3">
								<input type="password" name="old_password" class="form-control input-default " placeholder="Password lama" style="border: 1px solid #000000">
							</div>
							<div class="mb-3">
								<input type="password" name="new_password" class="form-control input-rounded" placeholder="Password baru" style="border: 1px solid #000000">
							</div>
							<div class="mb-3">
								<button type="submit" class="btn btn-primary font-weight-bold btn-flat btn-block" style="font-size: 12px;">ubah Password</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
    
@endsection

@section('script')

<script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins-init/sweetalert.init.js')}}"></script>
<script src="{{asset('assets/vendor/toastr/js/toastr.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.form-validator.min.js')}}"></script>
<script>
@if ($message = Session::get('terubah'))
swal(
    "Berhasil!",
    "{{ $message }}",
    "success"
);
@endif
$('.ubah_password_form').submit(function(e){
	e.preventDefault();
	var request = new FormData(this);
	$.ajax({
		url: "{{ url('/ubah_password/' . auth()->user()->id) }}",
		method: "POST",
		data: request,
		contentType: false,
		cache: false,
		processData: false,
		success:function(data){
			if(data == 'sukses'){
				swal({
					title: "Berhasil!",
				    text: "Password berhasil diubah",
				    type: "success"
				}, function(){
					window.open("{{ url('/kelola_profil') }}", "_self");
				});
			}else{
				gagalPassword();
			}
		}
	});
});
function gagalPassword(){
	toastr.warning("Password lama tidak sesuai","Peringatan !", {
	    timeOut:5e3,
	    closeButton:!0,
	    debug:!1,
	    newestOnTop:!0,
	    progressBar:!0,
	    positionClass:"toast-bottom-right",
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
}
</script>
@endsection