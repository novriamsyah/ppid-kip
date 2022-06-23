@extends('auth::layouts.master')

@section('content')

{{-- <div class="container-fluid">
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Profil User</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Detail Profil</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Profil User</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="1234 Main St">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <div class="row">
    	<div class="col-lg-12">
        	<div class="card">
                <div class="card-body">
                	<form method="POST" enctype="multipart/form-data" class="form_edit_identitas">
                		@csrf
	                	<div class="row">
	                		<div class="col-md-4 d-flex justify-content-start">
	                			<div class="identitas ml-4">
	                				<p class="text-dark font-weight-bold ubah_nama_text" style="font-size: 18px;">{{ auth()->user()->name }}</p>
	                				<input type="text" name="ubah_nama_input" class="ubah_nama_input mb-3" value="{{ auth()->user()->name }}" hidden="">
	                				@if(auth()->user()->role == 'super_admin')
	                				<div class="btn btn-sm font-weight-bold role-danger" style="margin-top: -10px;">{{ auth()->user()->role }}</div>
	                				@else
	                				<div class="btn btn-sm font-weight-bold role-primary" style="margin-top: -10px;">{{ auth()->user()->role }}</div>
                                    @endif
	                			</div>
	                		</div>
	                		<div class="col-md-8">
	                			<div class="text-right position-static">
	                				<button type="button" style="border: 0px; background-color: #fff;" class="btn text-primary edit_identitas_btn"><i class="fa fa-pencil" aria-hidden="true"></i></button>
	                				<button type="submit" style="border: 0px; background-color: #fff;" class="btn text-primary update_identitas_btn" hidden=""><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
	                			</div>
	                		</div>
	                	</div>
                	</form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-4">
    		<div class="card">
    			<div class="card-body">
    				<h4 class="card-title">Ubah Password</h4>
    				<hr>
    				<form method="POST" class="ubah_password_form">
    					@csrf
    					<div class="form-row">
    						<div class="form-group col-12">
	    						<input type="password" name="old_password" class="form-control form-control-xs" placeholder="Password lama">
	    					</div>
	    					<div class="form-group col-12">
	    						<input type="password" name="new_password" class="form-control form-control-xs" placeholder="Password baru">
	    					</div>
	    					<div class="form-group col-12">
	    						<button class="btn btn-primary font-weight-bold btn-flat btn-block" type="submit" style="font-size: 12px;">Ubah Password</button>
	    					</div>
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
    
@endsection