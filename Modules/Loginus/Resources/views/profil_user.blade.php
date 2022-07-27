@extends('loginus::layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}">
<link href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
<style>

  input {
    border-bottom: 1px solid red;
  }
  @media (min-width: 992px) {
    .modal-lg{
      min-width: 800px !important;
    }
  }


</style>
@endsection
@section('content')
          <!-- website -->
          <div class="container p-3 mb-5 mt-5 w-50 d-none d-md-block">
            <div class="row d-flex justify-content-center mb-4 mt-4">
                <p class="text-center" style="font-size: 1.5rem; ">Detail User</p>
                <table class="table table-striped">
                  <tr>
                      <td>Nama</td>
                      <td>{{$d_user->nama_lengkap}}</td>
                  </tr>
                  <tr>
                      <td>Jalur Pemohon</td>
                      <td>EPPID</td>
                  </tr>
                  <tr>
                      <td>Jenis Pemohon</td>
                      <td>{{$d_user2->jenis_pemohon}}</td>
                  </tr>
                  <tr>
                      <td>NPWP</td>
                      <td>{{$d_user->npwp}}</td>
                  </tr>
                  <tr>
                      <td>Pekerjaan</td>
                      <td>{{$d_user3->jenis_kerja}}</td>
                  </tr>
                  <tr>
                      <td>Alamat</td>
                      <td>{{$d_user->alamat}}</td>
                  </tr>
                  <tr>
                      <td>Telpon</td>
                      <td>{{$d_user->telp}}</td>
                  </tr>
                  <tr>
                      <td>Keterangan</td>
                      <td>{{$d_user->ket}}</td>
                  </tr>
                  <tr>
                      <td>Email</td>
                      <td>{{$d_user->email}}</td>
                  </tr>
                </table>
                <div class="text-start">
                    <button type="submit" class="btn rounded-pill" style="background-color:#1474ae ;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">UBAH DATA</button>
                </div>
            </div>
    
          <!-- mobile -->
          <div class="container p-3 mb-5 mt-5 w-50  d-md-none">
            <div class="row d-flex justify-content-center mb-4 mt-4">
                <p class="text-center" style="font-size: 1.5rem; ">Detail User</p>
                <table class="table table-striped">
                  <tr>
                      <td>Nama</td>
                      <td>{{$d_user->nama_lengkap}}</td>
                  </tr>
                  <tr>
                      <td>Jalur Pemohon</td>
                      <td>EPPID</td>
                  </tr>
                  <tr>
                      <td>Jenis Pemohon</td>
                      <td>{{$d_user2->jenis_pemohon}}</td>
                  </tr>
                  <tr>
                      <td>NPWP</td>
                      <td>{{$d_user->npwp}}</td>
                  </tr>
                  <tr>
                      <td>Pekerjaan</td>
                      <td>{{$d_user3->jenis_kerja}}</td>
                  </tr>
                  <tr>
                      <td>Alamat</td>
                      <td>{{$d_user->alamat}}</td>
                  </tr>
                  <tr>
                      <td>Telpon</td>
                      <td>{{$d_user->telp}}</td>
                  </tr>
                  <tr>
                      <td>Keterangan</td>
                      <td>{{$d_user->ket}}</td>
                  </tr>
                  <tr>
                      <td>Email</td>
                      <td>{{$d_user->email}}</td>
                  </tr>
                </table>
            </div>
          </div>
        
          </div>
        <form action="{{route('edit_profil_user')}}" class="ubah_user_form" method="POST">
          @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header text-center">
            <h5 class="modal-title w-100" id="exampleModalLabel" style="font-size: 18px; font-weight:bold">Edit</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id" value="{{$d_user->id}}">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Nama</label>
              <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" style="color: #000000" value="{{$d_user->nama_lengkap}}">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">NPWP</label>
              <input type="text" class="form-control" id="npwp" name="npwp" style="color: #000000" value="{{$d_user->npwp}}">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" style="color: #000000" value="{{$d_user->alamat}}">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Telp</label>
              <input type="text" class="form-control" id="telp" name="telp" style="color: #000000" value="{{$d_user->telp}}">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Keterangan</label>
              <input type="text" class="form-control" id="ket" name="ket" style="color: #000000" value="{{$d_user->ket}}">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Pekerjaan</label>
              <select class="form-select mb-4 rounded-pill" aria-label="Default select example" name="pekerjaan" >
                <option disabled>Pekerjaan</option>
                @foreach($kerja as $it_kerja)
                <option value="{{$it_kerja->id}}" {{$cek_id == $it_kerja->id ? 'selected="selected"' : ''}}>{{$it_kerja->jenis_kerja}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
          </div>
        </div>
        </div>
        </form>
@endsection

@section('script')
<script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins-init/sweetalert.init.js')}}"></script>
<script src="{{asset('assets/vendor/toastr/js/toastr.min.js')}}"></script>
    <script>
       @if ($message = Session::get('success'))
        swal(
            "berhasil",
            "{{ $message }}",
            "success"
        )
    @endif
    </script>
@endsection
