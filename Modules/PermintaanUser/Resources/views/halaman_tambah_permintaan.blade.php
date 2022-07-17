@extends('permintaanuser::layouts.master')

@section('css')
    <style> 
      .dikuasakan{
        padding:15px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23)
      }
    </style>
@endsection

@section('content')
    <!-- website -->
    <div class="container shadow p-3 mb-5 mt-5 w-50 bg-white rounded d-none d-md-block">
        <div class="row d-flex justify-content-center mb-4 mt-4">
            <p style="font-size: 1.5rem; font-weight:bold;" class="text-center">Tambah Permintaan</p>
				<form>
					<select class="form-select mb-4 rounded-pill" aria-label="Default select example" >
                        <option disabled selected>Cara mendapatkan informasi</option>
                        @foreach ($data_cdi as $cdi)
                        <option value="{{$cdi->id}}">{{$cdi->cara_dapat_informasi}}</option>
                        @endforeach
                      </select>
                      <select class="form-select mb-4 rounded-pill" aria-label="Default select example" >
                        <option disabled selected>Cara memperoleh informasi</option>
                        @foreach ($data_cpi as $cpi)
                        <option value="{{$cpi->id}}">{{$cpi->cara_memperoleh_informasi}}</option>
                        @endforeach
                      </select>
                      <select class="form-select mb-4 rounded-pill" aria-label="Default select example" >
                        <option disabled selected>PPID Tujuan permintaan informasi</option>
                        @foreach ($tujuan_ppid as $t_ppid)
                        <option value="{{$t_ppid->id}}">{{$t_ppid->tujuan_ppid}}</option>
                        @endforeach
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
                        <div class="mb-3">
                          <h3>Informasi Kuasa</h3>
                        </div>
                        <div class="mb-3">
                          <input class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Isi Permintaan Informasi"/> 
                        </div>
                        <div class="mb-3">
                          <input class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Isi Permintaan Informasi"/> 
                        </div>
                        <div class="mb-3">
                          <input class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Isi Permintaan Informasi"/> 
                        </div>
                        <div class="mb-3">
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Tujuan Pengunaan Informasi"></textarea>
                        </div>
                        <div class="mb-3 ">
                          <input class="form-control" type="file" id="formFile">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="file" id="formFile">
                        </div>
                      </div>
                      <div class="mb-3 ">
                        <label for="formFile" class="form-label">File Identitas</label>
                        <input class="form-control" type="file" id="formFile">
                      </div>
                      <div class="mb-3">
                          <label for="formFile" class="form-label">Dokumen Pendukung</label>
                          <input class="form-control" type="file" id="formFile">
                      </div>
                      <div class="text-end">
                          <button type="submit" class="btn rounded-pill" style="background-color:#1474ae ;">Simpan</button>
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
<script>
$(".dikuasakan").hide();
$(".checkbox-dikuasakan").click(function() {
    if($(this).is(":checked")) {
        $(".dikuasakan").show(300);
    } else {
        $(".dikuasakan").hide(200);
    }
});
</script>

@endsection