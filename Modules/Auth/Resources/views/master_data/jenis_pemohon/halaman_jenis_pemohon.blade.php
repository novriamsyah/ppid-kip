@extends('auth::layouts.master')

@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}">
<link href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Master Data</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Kelola Jenis Pemohon</a></li>
    </ol>
</div>
<!-- row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Kelola Jenis Pemohon</h4>
                <a href="{{url('/tambah_pemohon')}}"><button type="button" class="btn btn-primary tambah_pengguna_btn">Tambah Data <span class="btn-icon-right"><i class="fa fa-plus"></i></span> </button></a>
            </div>
            <div class="card-body">
                @if ($j_pemohon->count() == 0)
                    <h6>Data Belum ditambahakan, silahkan klik tambah data!!</h6>
                @else
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th style="width:80px;"><strong>No.</strong></th>
                                <th><strong>Jenis Pemohon</strong></th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1 ?>
                            @foreach ($j_pemohon as $pemohon)
                                <tr>
                                    <td><strong>{{$number}}</strong></td>
                                    <td>{{$pemohon->jenis_pemohon}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-dark light sharp" data-bs-toggle="dropdown">
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                            </button>
                                             
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{url('/edit_pemohon/'.$pemohon->id)}}">Edit</a>
                                                <a class="dropdown-item" href="{{url('/hapus_pemohon/'.$pemohon->id)}}">Delete</a>
                                            </div> 
                                        </div>
                                    </td>
                                </tr>
                            <?php $number++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins-init/sweetalert.init.js')}}"></script>
<script src="{{asset('assets/vendor/toastr/js/toastr.min.js')}}"></script>
<script>
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
    @if ($message = Session::get('terhapus'))
        swal(
            "berhasil",
            "{{ $message }}",
            "success"
        )
    @endif
</script>
@endsection