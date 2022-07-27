@extends('register::layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}">
<link href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
<style>
  .fa-minus-circle{
    color:blue;
  }
</style>
@endsection
@section('content')
<div class="container shadow p-3 mb-5 mt-5 bg-white rounded w-50 d-none d-md-block">
  <div class="row d-flex justify-content-center">
      <p style="font-size: 1.5rem; font-weight:bold;" class="text-center">Daftar</p>
      <form action="{{url('/simpan_register')}}" method="POST" enctype="multipart/form-data" name="pengguna_baru_form">
        @csrf
        <div class="mb-3">
          <label for="recipient-name" class="col-form-label" style="padding-left: 10px;font-weight:bold">Nama</label>
          <input class="form-control" id="nama_lengkap" name="nama_lengkap" aria-describedby="NamaHelp" style="border: 1px solid #b3b3b3">
        </div>
        <div class="mb-3">
          <label for="recipient-j_p" class="col-form-label" style="padding-left: 10px;font-weight:bold">Jenis Pemohon</label>
          <select class="form-select mb-4 rounded-pill" aria-label="Default select example" id="pemohon" name="jenis_pemohon">
            <option disabled selected value="">-- Pilih Jenis Pemohonan --</option>
            @foreach($pemohon as $it_pmhn)
            <option value="{{$it_pmhn->id}}" nilai="{{$it_pmhn->jenis_pemohon}}">{{$it_pmhn->jenis_pemohon}}</option>
            @endforeach
        </select>
        </div>
        <div class="mb-3">
          <label for="recipient-name" class="col-form-label" style="padding-left: 10px;font-weight:bold">Jenis Identitas</label>
          <select class="form-select mb-4 rounded-pill" aria-label="Default select example" name="jenis_identitas[]" id="identitas">
            <option disabled selected>-- Pilih Jenis NIK --</option>
        </select>
        </div>
        <div class="mb-3">
          <label for="recipient-nik" class="col-form-label" style="padding-left: 10px;font-weight:bold">NIK</label>
            <input class="form-control" id="nomor_identitas" name="nomor_identitas[]" aria-describedby="NIKHelp" style="border: 1px solid #b3b3b3">
        </div>
          <div id="tambahIdentitas" style="display: none">
            <a id="tambahFormIdentitas" role="button"><i class="fas fa-plus-circle fa-2x"></i>
            
          </div>
          <div id="tambahIdentitas2" style="display: none">
            <select class="form-select mb-4 rounded-pill" name="jenis_identitas[]" aria-label="Default select example" id="identitas"> 
              <option disabled selected value="">Jenis NIK</option> 
              @foreach($j_identitas as $it_identy)
              <option value="{{$it_identy->jenis_identitas}}">
                  {{$it_identy->jenis_identitas}}
              </option> 
              @endforeach
            </select>
              <div class="mb-3"><input class="form-control" name="nomor_identitas[]" id="exampleInputNIK1" aria-describedby="NIKHelp" style="border: 1px solid #b3b3b3"></div>
              
          </div>
          <div id="tampungJenis"></div>
        <div class="mb-4">
          <label for="recipient-f_iden" class="col-form-label" style="padding-left: 10px;font-weight:bold">File Identitas</label>
            <input class="form-control" type="file" id="file_identitas" name="file_identitas" style="border: 1px solid #b3b3b3">
        </div>
        <div class="mb-3">
          <label for="recipient-npwp" class="col-form-label" style="padding-left: 10px;font-weight:bold">NPWP</label>
          <input class="form-control" id="npwp" name="npwp" aria-describedby="NPWPHelp" style="border: 1px solid #b3b3b3">
        </div>
        <div class="mb-3">
          <label for="recipient-kerja" class="col-form-label" style="padding-left: 10px;font-weight:bold">Pekerjaan</label>
          <select class="form-select mb-4 rounded-pill" aria-label="Default select example" name="pekerjaan" >
            <option disabled selected>-- Pilih Pekerjaan --</option>
            @foreach($kerja as $it_kerja)
            <option value="{{$it_kerja->id}}">{{$it_kerja->jenis_kerja}}</option>
            @endforeach
      </select>
        </div>
        <div class="mb-3">
          <label for="recipient-alamat" class="col-form-label" style="padding-left: 10px;font-weight:bold">Alamat</label>
          <input class="form-control" id="alamat" name="alamat" aria-describedby="AlamatHelp" style="border: 1px solid #b3b3b3">
        </div>
        <div class="mb-3">
          <label for="recipient-tlp" class="col-form-label" style="padding-left: 10px;font-weight:bold">Telepon</label>
          <input  class="form-control" id="telp" name="telp" aria-describedby="TelpHelp" style="border: 1px solid #b3b3b3">
        </div>
        <div class="mb-3">
          <label for="recipient-ket" class="col-form-label" style="padding-left: 10px;font-weight:bold">Keterangan</label>
          <input class="form-control" id="ket" name="ket" aria-describedby="KeteranganHelp" style="border: 1px solid #b3b3b3">
        </div>
        <div class="mb-3">
          <label for="recipient-email" class="col-form-label" style="padding-left: 10px;font-weight:bold">Email</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" style="border: 1px solid #b3b3b3">
        </div>
        <div class="mb-3">
          <label for="recipient-passs" class="col-form-label" style="padding-left: 10px;font-weight:bold">Password</label>
          <input type="password" class="form-control" id="pass" name="pass" style="border: 1px solid #b3b3b3">
        </div>
        <div class="text-end">
            <button type="submit" class="btn " style="background-color:#ba131a ;">Daftar</button>
            <a href="{{url('/loginus')}}"><button type="button" class="btn " style="color:#ba131a ;">Batal</button></a>            
        </div>
      </form>
  </div>
</div>

</div>

<!-- mobile -->
 <!-- mobile -->
 <div class="container shadow p-3 mb-5 mt-5 bg-white rounded d-md-none">
  <div class="row d-flex justify-content-center">
    <p style="font-size: 1.5rem; font-weight:bold;" class="text-center">Daftar</p>
    <form action="{{url('/simpan_register')}}" method="POST" enctype="multipart/form-data" name="pengguna_baru_form_m">
      @csrf
      <div class="mb-3">
        <label for="recipient-namem" class="col-form-label" style="padding-left: 10px;font-weight:bold">Nama</label>
        <input class="form-control" id="nama_lengkap" name="nama_lengkap" aria-describedby="NamaHelp" style="border: 1px solid #b3b3b3">
      </div>
      <div class="mb-3">
        <label for="recipient-j_pm" class="col-form-label" style="padding-left: 10px;font-weight:bold">Jenis Pemohon</label>
        <select class="form-select mb-4 rounded-pill" aria-label="Default select example" id="pemohon_m" name="jenis_pemohon">
          <option disabled selected value="">-- Pilih Jenis Pemohonan --</option>
          @foreach($pemohon as $it_pmhn)
          <option value="{{$it_pmhn->id}}" nilai="{{$it_pmhn->jenis_pemohon}}">{{$it_pmhn->jenis_pemohon}}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="recipient-ji_m" class="col-form-label" style="padding-left: 10px;font-weight:bold">Jenis NIK</label>
        <select class="form-select mb-4 rounded-pill" aria-label="Default select example" name="jenis_identitas[]" id="identitas_m">
          <option disabled selected>-- Pilih Jenis NIK --</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="recipient-nikm" class="col-form-label" style="padding-left: 10px;font-weight:bold">NIK</label>
        <input class="form-control" id="nomor_identitas" name="nomor_identitas[]" aria-describedby="NIKHelp" style="border: 1px solid #b3b3b3">
      </div>
      <div id="tambahIdentitas_m" style="display: none">
        <a id="tambahFormIdentitas_m" role="button"><i class="fas fa-plus-circle fa-2x"></i>
        
      </div>
      <div id="tambahIdentitas2_m" style="display: none">
        <select class="form-select mb-4 rounded-pill" name="jenis_identitas[]" aria-label="Default select example" id="identitas_m"> 
          <option disabled selected value="">Jenis NIK</option> 
          @foreach($j_identitas as $it_identy)
          <option value="{{$it_identy->jenis_identitas}}">
              {{$it_identy->jenis_identitas}}
          </option> 
          @endforeach
        </select>
          <div class="mb-3"><input  placeholder="NIK " class="form-control" name="nomor_identitas[]" id="exampleInputNIK1" aria-describedby="NIKHelp" style="border: 1px solid #b3b3b3"></div>
          
      </div>
      <div id="tampungJenis_m"></div>
    <div class="mb-4">
      <label for="recipient-f_iden_m" class="col-form-label" style="padding-left: 10px;font-weight:bold">File Identitas</label>
        <input class="form-control" type="file" id="file_identitas" name="file_identitas" style="border: 1px solid #b3b3b3">
    </div>
    <div class="mb-3">
      <label for="recipient-npwp_m" class="col-form-label" style="padding-left: 10px;font-weight:bold">NPWP</label>
      <input class="form-control" id="npwp" name="npwp" aria-describedby="NPWPHelp" style="border: 1px solid #b3b3b3">
    </div>
    <div class="mb-3">
      <label for="recipient-kerja_m" class="col-form-label" style="padding-left: 10px;font-weight:bold">Pekerjaan</label>
      <select class="form-select mb-4 rounded-pill" aria-label="Default select example" name="pekerjaan" >
        <option disabled selected>-- Pilih Pekerjaan --</option>
        @foreach($kerja as $it_kerja)
        <option value="{{$it_kerja->id}}">{{$it_kerja->jenis_kerja}}</option>
        @endforeach
     </select>
    </div>
    <div class="mb-3">
      <label for="recipient-alamat_m" class="col-form-label" style="padding-left: 10px;font-weight:bold">Alamat</label>
      <input class="form-control" id="alamat" name="alamat" aria-describedby="AlamatHelp" style="border: 1px solid #b3b3b3">
    </div>
    <div class="mb-3">
      <label for="recipient-telp_m" class="col-form-label" style="padding-left: 10px;font-weight:bold">Telepon</label>
      <input class="form-control" id="telp" name="telp" aria-describedby="TelpHelp" style="border: 1px solid #b3b3b3">
    </div>
    <div class="mb-3">
      <label for="recipient-ket_m" class="col-form-label" style="padding-left: 10px;font-weight:bold">Keterangan</label>
      <input class="form-control" id="ket" name="ket" aria-describedby="KeteranganHelp" style="border: 1px solid #b3b3b3">
    </div>
    <div class="mb-3">
      <label for="recipient-email_m" class="col-form-label" style="padding-left: 10px;font-weight:bold">Email</label>
      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" style="border: 1px solid #b3b3b3">
    </div>
    <div class="mb-3">
      <label for="recipient-pass_m" class="col-form-label" style="padding-left: 10px;font-weight:bold">Password</label>
      <input type="password" class="form-control" id="pass" name="pass" style="border: 1px solid #b3b3b3">
    </div>
    <div class="text-end">
        <button type="submit" class="btn " style="background-color:#ba131a ;">Daftar</button>
        <a href="{{url('/loginus')}}"><button type="button" class="btn " style="color:#ba131a ;">Batal</button></a>            
    </div>
    </form>
  </div>

</div>
</div>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins-init/sweetalert.init.js')}}"></script>
<script src="{{asset('assets/vendor/toastr/js/toastr.min.js')}}"></script>
<script>
  

  $(function() {
    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
  });
    $(function() {
      $('#pemohon').on('change', function() {
        let id_pemohon = $('#pemohon').val();
        // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        // console.log(id_pemohon);
        $.ajax({
          type: 'POST',
          url: "{{url('getidentitas')}}",
          data: {id_pemohon: id_pemohon},
          cahce: false,

          success: function(msg) {
            $('#identitas').html(msg);
          },
          error: function(data){
            console.log('error', data);
          },
        });

      });
    });

    $(function() {
    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
  });
    $(function() {
      $('#pemohon_m').on('change', function() {
        let id_pemohon = $('#pemohon_m').val();
        // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        // console.log(id_pemohon);
        $.ajax({
          type: 'POST',
          url: "{{url('getidentitas_m')}}",
          data: {id_pemohon: id_pemohon},
          cahce: false,

          success: function(msg) {
            $('#identitas_m').html(msg);
          },
          error: function(data){
            console.log('error', data);
          },
        });

      });
    });

  $(document).ready(function() {
    $("#pemohon").change(function() {
      $(this).find("option:selected").each(function() {
        var optionNilai = $(this).attr("nilai");
        $("#tambahIdentitas").hide();
        $("#tambahIdentitas2").hide();
        if(optionNilai == "Kelompok Orang") {
          $("#tambahIdentitas").show();
          $("#tambahIdentitas2").show();
        } else {
          $("#tambahIdentitas").hide();
          $("#tambahIdentitas2").hide();
        }
      });
    });
  });

  $('#tambahFormIdentitas').on('click', function() {
    addidentitas();
  });
  function addidentitas() {
    var identitas_add = '<div><select class="form-select mb-4 rounded-pill" name="jenis_identitas[]" aria-label="Default select example" id="identitas"><option disabled selected value="">Jenis NIK</option>@foreach($j_identitas as $it_identy)<option value="{{$it_identy->jenis_identitas}}">{{$it_identy->jenis_identitas}}</option>@endforeach</select><div class="mb-3"><input  placeholder="NIK " class="form-control" name="nomor_identitas[]" id="exampleInputNIK1" aria-describedby="NIKHelp"></div><a id="removIden" role="button"><i class="fas fa-minus-circle fa-2x"></i></div>';
    $('#tampungJenis').append(identitas_add); 
  };

  $('#tampungJenis').on('click', '#removIden', function() {
    
    $(this).parent().remove();
  });

  $(document).ready(function() {
    $("#pemohon_m").change(function() {
      $(this).find("option:selected").each(function() {
        var optionNilai = $(this).attr("nilai");
        $("#tambahIdentitas_m").hide();
        $("#tambahIdentitas2_m").hide();
        if(optionNilai == "Kelompok Orang") {
          $("#tambahIdentitas_m").show();
          $("#tambahIdentitas2_m").show();
        } else {
          $("#tambahIdentitas_m").hide();
          $("#tambahIdentitas2_m").hide();
        }
      });
    });
  });

  $('#tambahFormIdentitas_m').on('click', function() {
    addidentitas2();
  });
  function addidentitas2() {
    var identitas_add2 = '<div><select class="form-select mb-4 rounded-pill" name="jenis_identitas[]" aria-label="Default select example" id="identitas_m"><option disabled selected value="">Jenis NIK</option>@foreach($j_identitas as $it_identy)<option value="{{$it_identy->jenis_identitas}}">{{$it_identy->jenis_identitas}}</option>@endforeach</select><div class="mb-3"><input  placeholder="NIK " class="form-control" name="nomor_identitas[]" id="exampleInputNIK1" aria-describedby="NIKHelp"></div><a id="removIden_m" role="button"><i class="fas fa-minus-circle fa-2x"></i></div>';
    $('#tampungJenis_m').append(identitas_add2); 
  };

  $('#tampungJenis_m').on('click', '#removIden_m', function() {
    
    $(this).parent().remove();
  });

  $(document).ready(function() {
    $("form[name='pengguna_baru_form']").validate({
      rules: {
        nama_lengkap: "required",
        jenis_pemohon: "required",
        "jenis_identitas[]": "required",
        file_identitas: {
          required: true,
          extension: "pdf|jpg|jpeg",
          filesize: 2
        },
        "nomor_identitas[]": {
            required: true,
            number:true,
            minlength: 15
        },
        npwp: {
          required: true,
          number:true,
          minlength: 15
        },
        pass: {
            required: true,
            minlength: 5
        },
        pekerjaan: "required",
        alamat: {
          required: true,
          minlength: 10,
        },
        telp: {
          required: true,
          number: true
        },
        ket: "required",
        email: {
          required: true,
          email: true,
        },
        },
        messages: {
          nama_lengkap: "<span style='color: red;'>Nama tidak boleh kosong</span>",
          "nomor_identitas[]": {
            required: "<span style='color: red;'>Nomor identitas tidak boleh kosong</span>",
            number: "<span style='color: red;'>Nomor identitas harus angka</span>",
            minlength: "<span style='color: red;'>Nomor identitas harus 16 karakter angka</span>",
          },
          pass: {
            required: "<span style='color: red;'>Password tidak boleh kosong</span>",
            minlength: "<span style='color: red;'>Kata sandi harus lebih dari 5 karakter</span>"
          },
          jenis_pemohon: "<span style='color: red;'>Silakan pilih data pemohon</span>",
          "jenis_identitas[]": "<span style='color: red;'>Silakan pilih data identitas</span>",
          file_identitas: {
            required: "<span style='color: red;'>File tidak boleh kosong</span>",
            extension: "<span style='color: red;'>Format File harus pdf atau jpg</span>",
            filesize: "<span style='color: red;'>Ukuran tidak boleh lebih dari 2MB</span>",
          },
          npwp: {
            required: "<span style='color: red;'>NPWP Harus berupa 15-16 digit angka (jika tidak memiliki NPWP bisa memasukan NIK atau isi dengan angka 0 sebanyak 15x</span>",
            number: "<span style='color: red;'>NPWP Harus berupa 15-16 digit angka (jika tidak memiliki NPWP bisa memasukan NIK atau isi dengan angka 0 sebanyak 15x</span>",
            minlength: "<span style='color: red;'>NPWP Harus berupa 15-16 digit angka (jika tidak memiliki NPWP bisa memasukan NIK atau isi dengan angka 0 sebanyak 15x</span>",
          },
          pekerjaan: "<span style='color: red;'>Pekerjaan tidak boleh kosong</span>",
          alamat: {
            required: "<span style='color: red;'>Alamat tidak boleh kosong</span>",
            minlength: "<span style='color: red;'>Alamat harus lebih dari 10 karekter</span>",
          },
          telp: {
            required: "<span style='color: red;'>Telpom tidak boleh kosong</span>",
            number: "<span style='color: red;'>telepon harus angka</span>",
          },
          ket: "<span style='color: red;'>keterangan harus diisi</span>",
          email: {
            required: "<span style='color: red;'>Email tidak boleh kosong</span>",
            email: "<span style='color: red;'>Format Email harus sesuai</span>",
          }

        },
        submitHandler: function(form) {
          form.submit();
        }
    });
  });

  $(document).ready(function() {
    $("form[name='pengguna_baru_form_m']").validate({
      rules: {
        nama_lengkap: "required",
        jenis_pemohon: "required",
        "jenis_identitas[]": "required",
        file_identitas: {
          required: true,
          extension: "pdf|jpg|jpeg",
          filesize: 2
        },
        "nomor_identitas[]": {
            required: true,
            number:true,
            minlength: 15
        },
        npwp: {
          required: true,
          number:true,
          minlength: 15
        },
        pass: {
            required: true,
            minlength: 5
        },
        pekerjaan: "required",
        alamat: {
          required: true,
          minlength: 10,
        },
        telp: {
          required: true,
          number: true
        },
        ket: "required",
        email: {
          required: true,
          email: true,
        },
        },
        messages: {
          nama_lengkap: "<span style='color: red;'>Nama tidak boleh kosong</span>",
          "nomor_identitas[]": {
            required: "<span style='color: red;'>Nomor identitas tidak boleh kosong</span>",
            number: "<span style='color: red;'>Nomor identitas harus angka</span>",
            minlength: "<span style='color: red;'>Nomor identitas harus 16 karakter angka</span>",
          },
          pass: {
            required: "<span style='color: red;'>Password tidak boleh kosong</span>",
            minlength: "<span style='color: red;'>Kata sandi harus lebih dari 5 karakter</span>"
          },
          jenis_pemohon: "<span style='color: red;'>Silakan pilih data pemohon</span>",
          "jenis_identitas[]": "<span style='color: red;'>Silakan pilih data identitas</span>",
          file_identitas: {
            required: "<span style='color: red;'>File tidak boleh kosong</span>",
            extension: "<span style='color: red;'>Format File harus pdf atau jpg</span>",
            filesize: "<span style='color: red;'>Ukuran tidak boleh lebih dari 2MB</span>",
          },
          npwp: {
            required: "<span style='color: red;'>NPWP Harus berupa 15-16 digit angka (jika tidak memiliki NPWP bisa memasukan NIK atau isi dengan angka 0 sebanyak 15x</span>",
            number: "<span style='color: red;'>NPWP Harus berupa 15-16 digit angka (jika tidak memiliki NPWP bisa memasukan NIK atau isi dengan angka 0 sebanyak 15x</span>",
            minlength: "<span style='color: red;'>NPWP Harus berupa 15-16 digit angka (jika tidak memiliki NPWP bisa memasukan NIK atau isi dengan angka 0 sebanyak 15x</span>",
          },
          pekerjaan: "<span style='color: red;'>Pekerjaan tidak boleh kosong</span>",
          alamat: {
            required: "<span style='color: red;'>Alamat tidak boleh kosong</span>",
            minlength: "<span style='color: red;'>Alamat harus lebih dari 10 karekter</span>",
          },
          telp: {
            required: "<span style='color: red;'>Telpom tidak boleh kosong</span>",
            number: "<span style='color: red;'>telepon harus angka</span>",
          },
          ket: "<span style='color: red;'>keterangan harus diisi</span>",
          email: {
            required: "<span style='color: red;'>Email tidak boleh kosong</span>",
            email: "<span style='color: red;'>Format Email harus sesuai</span>",
          }

        },
        submitHandler: function(form) {
          form.submit();
        }
    });
  });
</script>
<script>
  @if ($message = Session::get('tidak_tersimpan'))
    toastr.warning("{{ $message }}","Perhatikan !!", {
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
    @if ($message = Session::get('tidak_tersimpan'))
            swal(
                "Perhatian !!",
                "{{ $message }}",
                "warning"
            )
    @endif
</script>
@endsection
