@extends('permintaanuser::layouts.master')

@section('css')
    <style> 
      .dikuasakan{
        padding:15px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23)
      }
    .new-button {
    display: inline-block;
    padding: 8px 12px; 
    cursor: pointer;
    border-radius: 4px;
    background-color: #9c27b0;
    font-size: 16px;
    color: #fff;
    }
    .new-button1 {
    display: inline-block;
    padding: 8px 12px; 
    cursor: pointer;
    border-radius: 4px;
    background-color: #9c27b0;
    font-size: 16px;
    color: #fff;
    }
    .new-button2 {
    display: inline-block;
    padding: 8px 12px; 
    cursor: pointer;
    border-radius: 4px;
    background-color: #9c27b0;
    font-size: 16px;
    color: #fff;
    }
    .new-button3 {
    display: inline-block;
    padding: 8px 12px; 
    cursor: pointer;
    border-radius: 4px;
    background-color: #9c27b0;
    font-size: 16px;
    color: #fff;
    }
    input[type="file"] {
       position: absolute;
      z-index: -1;
      top: 6px;
      left: 0;
      font-size: 15px;
      color: rgb(153,153,153);
    }
    
    </style>
@endsection

@section('content')
              
    <!-- website -->
    <div class="container shadow p-3 mb-5 mt-5 w-50 bg-white rounded d-none d-md-block">
              @php
                $ambil_id = Session::get('id');
              @endphp
        <div class="row d-flex justify-content-center mb-4 mt-4">
            <p style="font-size: 1.5rem; font-weight:bold; margin-bottom: 50px" class="text-center">Tambah Permintaan</p>
				<form action="{{url('/simpan_permintaan')}}" method="POST" enctype="multipart/form-data" name="permintaan_baru_form">
          @csrf
          <input type="hidden" name="id_user_minta" value="{{$ambil_id}}">
                    <div class="mb-3">
                      <label for="recipient-cdi" class="col-form-label" style="padding-left: 10px;font-weight:bold">Cara mendapatkan informasi</label>
                      <select class="form-select mb-4 rounded-pill" aria-label="Default select example" name="mendapatkan">
                        <option disabled selected>-- Pilih Cara mendapatkan informasi --</option>
                        @foreach ($data_cdi as $cdi)
                        <option value="{{$cdi->id}}">{{$cdi->cara_dapat_informasi}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="recipient-cpi" class="col-form-label" style="padding-left: 10px;font-weight:bold">Cara memperoleh informasi</label>
                      <select class="form-select mb-4 rounded-pill" aria-label="Default select example" name="memperoleh">
                        <option disabled selected>-- Pilih Cara memperoleh informasi --</option>
                        @foreach ($data_cpi as $cpi)
                        <option value="{{$cpi->id}}">{{$cpi->cara_memperoleh_informasi}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="recipient-t_ppid" class="col-form-label" style="padding-left: 10px;font-weight:bold">PPID tujuan permintaan informasi</label>
                      <select class="form-select mb-4 rounded-pill" aria-label="Default select example" name="ppid_tujuan">
                        <option disabled selected>-- Pilih PPID Tujuan permintaan informasi --</option>
                        @foreach ($tujuan_ppid as $t_ppid)
                        <option value="{{$t_ppid->id}}">{{$t_ppid->tujuan_ppid}}</option>
                        @endforeach
                      </select>
                    </div>
                      <div class="mb-3">
                        <label for="recipient-t_ppid" class="col-form-label" style="padding-left: 10px;font-weight:bold">Isi permintaan informasi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi" style="border: 1px solid #b3b3b3"></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="recipient-t_ppid" class="col-form-label" style="padding-left: 10px;font-weight:bold">Tujuan pengunaan informasi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea2" rows="3" name="tujuan" style="border: 1px solid #b3b3b3"></textarea>
                      </div>

                        <div class=" mb-3 form-check">
                            <input type="checkbox" class="form-check-input checkbox-dikuasakan" id="exampleCheck1" name="dikuasakan">
                            <label class="form-check-label" for="exampleCheck1">Dikuasakan</label>
                        </div>
                      <div class="dikuasakan" style="display: none;">
                        <div class="mb-3">
                          <h3 style="font-weight: bold">Informasi Kuasa</h3>
                        </div>
                        <div class="mb-3">
                          <input class="form-control" name="nama_kuasa" id="exampleFormControlTextarea_nk" rows="3" placeholder="Nama Kuasa" style="border: 1px solid #b3b3b3;"/> 
                        </div>
                        <div class="mb-3">
                          <input class="form-control" name="nik_kuasa" id="exampleFormControlTextarea_nik_k" rows="3" placeholder="NIK Kuasa" style="border: 1px solid #b3b3b3;"/> 
                        </div>
                        <div class="mb-3">
                          <input class="form-control" name="kontak_kuasa" id="exampleFormControlTextarea_k_k" rows="3" placeholder="Telepon/Fax/Email Kuasa" style="border: 1px solid #b3b3b3;"/> 
                        </div>
                        <div class="mb-3">
                          <textarea class="form-control" id="exampleFormControlTextarea_almt_k" rows="3" placeholder="Alamat" name="alamat_kuasa" style="border: 1px solid #b3b3b3;"></textarea>
                        </div>
                        <div class="mb-3" style="position: relative">
                          <label for="formFile" class="new-button">Surat Kuasa</label>
                          <input class="form-control" type="file" id="formFile" name="doc_kuasa">
                          <p style="word-break: break-word; border-bottom:1px solid #000"><span id="doc_kuasa_lht"></span> </p>
                      </div>
                        <div class="mb-3" style="position: relative">
                          <label for="formFile1" class="new-button1">File Identitas Kuasa</label>
                          <input class="form-control" type="file" id="formFile1" name="identitas_kuasa">
                          <p style="word-break: break-word; border-bottom:1px solid #000"><span id="identitas_kuasa_lht"></span> </p>
                      </div>
                      </div>
                      <div class="mb-3" style="position: relative; margin-top:25px">
                        
                        <label for="formFile2" class="new-button2">File Identitas</label>
                        <input class="form-control" type="file" id="formFile2" name="dokumen">
                        <p style="word-break: break-word; border-bottom:1px solid #000"><span id="dokumen_lht"></span> </p>
                      </div>
                      <div class="mb-3" style="position: relative">
                        
                          <label for="formFile3" class="new-button3">Dokumen Pendukung</label>
                          <input class="form-control" type="file" id="formFile3" name="pendukung">
                          <p style="word-break: break-word; border-bottom:1px solid #000"><span id="pendukung_lht"></span> </p>
                      </div>
                      <div class="text-end">
                          <button type="submit" class="btn rounded-pill" style="background-color:#1474ae;">Simpan</button>
                          <a href="{{route('user.minta')}}" class="text-danger">
                             Batal
                          </a>
                      </div>
					  
				  </form>
			</div>
        </div>
      </div>
      <!-- mobile -->
      <div class="container shadow p-3 mb-5 mt-5 bg-white rounded  d-md-none">
        <div class="row d-flex justify-content-center mb-4 mt-4">
            <p style="font-size: 1.5rem; font-weight:bold;" class="text-center">Tambah Permintaan</p>
				<form>
					<select class="form-select mb-4 rounded-pill" aria-label="Default select example" >
                        <option disabled selected>Cara mendapatkan informasi</option>
                        <option value="1">KTP</option>

                      </select>
                      <select class="form-select mb-4 rounded-pill" aria-label="Default select example" >
                        <option disabled selected>Cara memperoleh informasi</option>
                        <option value="1">KTP</option>

                      </select>
                      <select class="form-select mb-4 rounded-pill" aria-label="Default select example" >
                        <option disabled selected>PPID Tujuan permintaan informasi</option>
                        <option value="1">KTP</option>

                      </select>
                      <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Isi Permintaan Informasi"></textarea>
                      </div>
                      <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Tujuan Pengunaan Informasi"></textarea>
                      </div>

                        <div class=" mb-3 form-check">
                            <input type="checkbox" class="form-check-input checkbox-dikuasakan" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Dikuasakan</label>
                        </div>
                      <div class="dikuasakan" style="display: none;">
                        
                        <div class="mb-3 ">
                            <label for="formFile" class="form-label">File Identitas</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Dokumen Pendukung</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                      </div>
                      <div class="text-end">
                          <button type="submit" class="btn rounded-pill" style="background-color:#1474ae;">Simpan</button>
                          <a href="permintaan.html" class="text-danger">
                              Batal
                          </a>
                      </div>
					  
				  </form>
			</div>
        </div>
      </div>

@endsection
@section('script')
<script src="{{asset('assets/js/jquery.form-validator.min.js')}}"></script>

<script>
$(".dikuasakan").hide();
$(".checkbox-dikuasakan").click(function() {
    if($(this).is(":checked")) {
        $(".dikuasakan").show(300);
    } else {
        $(".dikuasakan").hide(200);
    }
});

$(document).on('click', 'input[name=dikuasakan]', function(){
  if(this.checked == false){
    $(this).val('0');
  } 
  else {
    $(this).val('1');
  }
});

$(function(){
  $('input[name=dokumen]').change(function(){
    $('#dokumen_lht').html($(this).val()  );
});
});
$(function(){
  $('input[name=pendukung]').change(function(){
    $('#pendukung_lht').html($(this).val()  );
});
});
$(function(){
  $('input[name=doc_kuasa]').change(function(){
    $('#doc_kuasa_lht').html($(this).val()  );
});
});
$(function(){
  $('input[name=identitas_kuasa]').change(function(){
    $('#identitas_kuasa_lht').html($(this).val()  );
});
});

$(document).ready(function() {
    $("form[name='permintaan_baru_form']").validate({
      rules: {
        mendapatkan: "required",
        memperoleh: "required",
        ppid_tujuan: "required",
        isi: "required",
        tujuan: "required",
        nama_kuasa: {
          required: function(element) {
            // var cek = $(".checkbox-dikuasakan").val();
            if($(".checkbox-dikuasakan").is(':checked')){
              return true;
            }else {
              return false; 
            }
          }
        },
        nik_kuasa: {
          required: function(element) {
            // var cek = $(".checkbox-dikuasakan").val();
            if($(".checkbox-dikuasakan").is(':checked')){
              return true;
            }else {
              return false; 
            }
          }
        },
        kontak_kuasa: {
          required: function(element) {
            if($(".checkbox-dikuasakan").is(':checked')){
              return true;
            }else {
              return false; 
            }
          }
        },
        alamat_kuasa: {
          required: function(element) {
            if($(".checkbox-dikuasakan").is(':checked')){
              return true;
            }else {
              return false; 
            }
          }
        },
        doc_kuasa: {
          required: function(element) {
            if($(".checkbox-dikuasakan").is(':checked')){
              return true;
            }else {
              return false; 
            }
          }
        },
        identitas_kuasa: {
          required: function(element) {
            // var cek = $(".checkbox-dikuasakan").val();
            if($(".checkbox-dikuasakan").is(':checked')){
              return true;
            }else {
              return false; 
            }
          }
        },
        dokumen: "required",
        pendukung: "required",
        
        },
        messages: {
          mendapatkan: "<span style='color: red;'>Cara mendapatkan harus diisi</span>",
          memperoleh: "<span style='color: red;'>Cara memperoleh harus diisi</span>",
          ppid_tujuan: "<span style='color: red;'>tujuan PPID tidak boleh kosong</span>",
          isi: "<span style='color: red;'>isi tidak boleh kosong</span>",
          tujuan: "<span style='color: red;'>tujuan tidak boleh kosong</span>",
          nama_kuasa: "<span style='color: red;'>Nama kuasa tidak boleh kosong</span>",
          nik_kuasa: "<span style='color: red;'>NIK kuasa tidak boleh kosong</span>",
          kontak_kuasa: "<span style='color: red;'>Kontak kuasa tidak boleh kosong</span>",
          alamat_kuasa: "<span style='color: red;'>Alamat kuasa tidak boleh kosong</span>",
          doc_kuasa: "<span style='color: red;'>Surat kuasa tidak boleh kosong</span>",
          identitas_kuasa: "<span style='color: red;'>File Identitas kuasa tidak boleh kosong</span>",
          dokumen: "<span style='color: red;'>file tidak boleh kosong</span>",
          pendukung: "<span style='color: red;'>file tidak boleh kosong</span>",

        },
        submitHandler: function(form) {
          form.submit();
        }
    });
  });
</script>

@endsection