@extends('auth::layouts.master')

@section('css')
<link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}">
<link href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

@endsection

@section('content')
		
<div class="row page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Master Data</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Data User Register</a></li>
    </ol>
</div>
<!-- row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data User Register</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md" id="example4" class="display">
                        <thead>
                            <tr>
                                <th style="width:80px;">No</th>
                                <th style="font-size: 14px">Nama</th>
                                <th style="font-size: 14px">E-Mail</th>
                                <th style="font-size: 14px">Jenis Pemohon</th>
                                <th style="font-size: 14px">Jenis Identitas</th>
                                <th style="font-size: 14px">Nomor Identitas</th>
                                <th style="font-size: 14px">NPWP</th>
                                <th style="font-size: 14px">Pekerjaan</th>
                                <th style="font-size: 14px">Alamat</th>
                                <th style="font-size: 14px">Telepon</th>
                                <th style="font-size: 14px">Keterangan</th>
                                <th style="font-size: 14px">File Upload</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1 ?>
                            @foreach ($regis_user as $pengguna)
                                <tr>
                                    <td><strong>{{$number}}</strong></td>
                                    <td style="font-size: 13px">{{$pengguna->nama_lengkap}}</td>
                                    <td style="font-size: 13px">{{$pengguna->email}}</td>
                                    <td style="font-size: 13px">
                                        @php
                                            $pemohon = \Modules\Pemohon\Entities\JenisPemohon::select('jenis_pemohon.*')->where('id', $pengguna->jenis_pemohon)->first();
                                        @endphp
                                        {{$pemohon->jenis_pemohon}}</td>
                                    <td style="font-size: 13px">
                                        <?php $num = 1 ?>
                                        @foreach($pengguna->jenis_identitas as $identitas)
                                        {{$num}}. {{$identitas}}<br>
                                        <?php $num++ ?>
                                        @endforeach
                                    </td>
                                    <td style="font-size: 13px; font-weight:normal">
                                        <?php $num = 1 ?>
                                        @foreach($pengguna->nomor_identitas as $no_identitas)
                                        {{$num}}. {{$no_identitas}}<br>
                                        <?php $num++ ?>
                                        @endforeach
                                    </td>
                                    <td style="font-size: 13px">{{$pengguna->npwp}}</td>
                                    <td style="font-size: 13px">
                                        @php
                                        $kerjaan = \Modules\Pekerjaan\Entities\KelompokPekerjaan::select('pekerjaan.*')->where('id', $pengguna->pekerjaan)->first();
                                         @endphp
                                    {{$kerjaan->jenis_kerja}}</td>
                                    <td style="font-size: 13px">{{$pengguna->alamat}}</td>
                                    <td style="font-size: 13px">{{$pengguna->telp}}</td>
                                    <td style="font-size: 13px">{{$pengguna->ket}}</td>
                                    <td style="font-size: 13px">{{$pengguna->file_identitas}}</td>
                                </tr>
                            <?php $number++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
    
@section('script')
<script src="{{asset('assets/vendor/datatables/js/jquery.dataTables.min.js' )}}"></script>
<script src="{{asset('assets/js/plugins-init/datatables.init.js' )}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins-init/sweetalert.init.js')}}"></script>
<script src="{{asset('assets/vendor/toastr/js/toastr.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#user_tabel_regis').DataTable({
            pagingType: 'full_numbers',
        })
    });
</script>

@endsection