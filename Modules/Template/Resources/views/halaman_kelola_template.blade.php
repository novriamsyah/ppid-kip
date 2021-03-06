@extends('auth::layouts.master')

@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}">
<link href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="bootstrap-modal">
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail isi template</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body"><p id="isi_tempat"></p></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalLong">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Isi Template Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body ">
                    <div id="isi_tempat"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Master Data</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Kelola Halaman template</a></li>
    </ol>
</div>
<!-- row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Kelola Data Template</h4>
                {{-- <a href="{{url('/tambah_template')}}"><button type="button" class="btn btn-primary tambah_pengguna_btn">Tambah Data <span class="btn-icon-right"><i class="fa fa-plus"></i></span> </button></a> --}}
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">Perbarui template</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('/edit_template_verif/'.$verif->id)}}">Verifikasi</a>
                        <a class="dropdown-item" href="{{url('/edit_template_forgot/'.$forgot->id)}}">Lupa password</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($template->count() == 0)
                    <h6>Data Belum ditambahakan, silahkan klik tambah data!!</h6>
                @else
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        
                        <thead>
                            <tr>
                                <th style="width:80px;"><strong>No.</strong></th>
                                <th><strong>Kategori</strong></th>
                                <th><strong>Isi</strong></th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1 ?>
                                <tr>
                                    <td><strong>1</strong></td>
                                    <td>{{$verif->kategori}}</td>
                                    <td><button type="button" class="btn btn-rounded btn-outline-info mb-2 lihat_isi" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" data-lihat="{{$verif->id}}">Lihat teks</button></td>
                                    <td>
                                    <a class="btn btn-rounded btn-primary" href="{{url('/edit_template_verif/'.$verif->id)}}" role="button">Perbarui </a>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td><strong>2</strong></td>
                                    <td>{{$forgot->kategori}}</td>
                                    <td><button type="button" class="btn btn-rounded btn-outline-info mb-2 lihat_isi" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" data-lihat="{{$forgot->id}}">Lihat teks</button></td>
                                    <td>
                                    <a class="btn btn-rounded btn-primary" href="{{url('/edit_template_forgot/'.$forgot->id)}}" role="button">Perbarui </a>
                                    </td>
                                </tr>
                            <?php $number++ ?>
                            
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
        url: "{{url('/hapus_template')}}/" + id,
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

    $(document).on('click', '.lihat_isi', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-lihat');
        // console.log(id);

        $.ajax({
            url: "{{ url('/lihat_isi') }}/" + id,
            method: "GET",
            success:function(response) {
                // console.log(response.isi);
                $('#isi_tempat').html(response.isi);
            }
        })
    });
</script>
@endsection