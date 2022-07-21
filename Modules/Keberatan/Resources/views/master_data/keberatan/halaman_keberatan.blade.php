@extends('auth::layouts.master')

@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}">
<link href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Master Data</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Kelola Alasan Keberatan</a></li>
    </ol>
</div>
<!-- row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Kelola Alasan Keberatan</h4>
                <a href="{{url('/tambah_keberatan')}}"><button type="button" class="btn btn-primary tambah_pengguna_btn">Tambah Data <span class="btn-icon-right"><i class="fa fa-plus"></i></span> </button></a>
            </div>
            <div class="card-body">
                @if ($keberatan->count() == 0)
                    <h6>Data Belum ditambahakan, silahkan klik tambah data!!</h6>
                @else
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th style="width:80px;"><strong>No.</strong></th>
                                <th><strong>Alaasan Keberatan</strong></th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1 ?>
                            @foreach ($keberatan as $a_berat)
                                <tr>
                                    <td><strong>{{$number}}</strong></td>
                                    <td>{{$a_berat->alasan_keberatan}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-dark light sharp" data-bs-toggle="dropdown">
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                            </button>
                                             
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{url('/edit_keberatan/'.$a_berat->id)}}">Edit</a>
                                                <a class="dropdown-item delete-confirm" onclick="deleteConfirmation({{$a_berat->id}})" role="button">Delete</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins-init/sweetalert.init.js')}}"></script>
<script src="{{asset('assets/vendor/toastr/js/toastr.min.js')}}"></script>
<script>
     function deleteConfirmation(id) {
        swal({
        title: "Apakah kamu yakin?",
        text: "Data ini akan dihapus permanen !!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
        reverseButtons: !0
        }).then(function (e) {
        if (e.value === true) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
        type: 'POST',
        url: "{{url('/hapus_keberatan')}}/" + id,
        data: {_token: CSRF_TOKEN},
        dataType: 'JSON',
        success: function (results) {
            if (results.success === true) { 
                swal("Done!", results.message, "success");
            } else {
                swal("Error!", results.message, "error");
        }
        }
        });
            location.reload();
        } else {
            e.dismiss;
        }
    }, function (dismiss) {
    return false;
    })
    }
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
</script>
@endsection