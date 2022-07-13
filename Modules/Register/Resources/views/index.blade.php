<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>komisiinformasi</title>
	<meta name="description" content="komisiinformasi">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('fron_asset/images/favicon.png') }}">

	<!-- STYLES -->
	<link rel="stylesheet" href="{{ asset('fron_asset/css/bootstrap.min.css') }}" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('fron_asset/css/all.min.css') }}" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('fron_asset/css/slick.css') }}" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('fron_asset/css/simple-line-icons.css') }}" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('fron_asset/css/style.css') }}" type="text/css" media="all">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <style>
      .fa-minus-circle{
        color:blue;
      }
    </style>

</head>

<body>


  <div id="preloader">
    <div class="loading">
      <img src="{{ asset('fron_asset/images/Spinner-1s-200px.gif')}}">
    </div>
  </div>
<!-- site wrapper -->
<div class="site-wrapper">

	<div class="main-overlay"></div>

	<!-- header -->
	
	<header class="header-default">
        <div class="bg-danger text-white pt-2 pb-2">
          <div class="container-xl">
            <div class="text-center text-lg-end">
              <ul
                class="social-icons list-unstyled list-inline mb-0 mt-auto w-100"
              >
                <li class="list-inline-item">
                  <a href="#" 
                    ><i class="fab fa-facebook-f"></i
                  ></a>
                </li>
                <li class="list-inline-item">
                  <a href="#" 
                    ><i class="fab fa-twitter"></i
                  ></a>
                </li>
                <li class="list-inline-item">
                  <a href="#" 
                    ><i class="fab fa-instagram"></i
                  ></a>
                </li>
                <li class="list-inline-item">
                  <a href="#" 
                    ><i class="fab fa-pinterest"></i
                  ></a>
                </li>
                <li class="list-inline-item">
                  <a href="#" 
                    ><i class="fab fa-medium"></i
                  ></a>
                </li>
                <li class="list-inline-item">
                  <a href="#" 
                    ><i class="fab fa-youtube"></i
                  ></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        

        <nav class="navbar navbar-expand-lg">
          <div class="container">
            <!-- site logo -->
            <a class="navbar-brand" href="index.html"
              ><img style="max-width: 235px" src="{{ asset('fron_asset\images\logo.png') }}" alt="logo"
            /></a>

            <div class="collapse navbar-collapse" style="flex-grow: unset">
              <!-- menus -->
              <ul
                class="navbar-nav mr-auto"
                style="font-size: 1rem; font-weight: bold"
              >
                <li class="nav-item">
                  <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    >Publikasi</a
                  >
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="#"
                        >E-LHKPN</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="#"
                        >Video</a
                      >
                    </li>
                    <li>
                      <a
                        class="dropdown-item dropdown-toggle dropdown-toggle-submenu"
                        href="#"
                        >Laporan</a
                      >
                      <ul class="submenu dropdown-menu">
                        <li>
                          <a
                            class="dropdown-item"
                            href="#"
                            >Laporan Pemeringkatan</a
                          >
                        </li>
                        <li>
                          <a
                            class="dropdown-item"
                            href="#"
                            >Laporan Tahunan</a
                          >
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#"
                        >Kerjasama</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="#"
                        >Pustaka</a
                      >
                    </li>
                    <li><a class="dropdown-item" href="#">KI Provinsi</a></li>
                    <li>
                      <a class="dropdown-item" href="#"
                        >RAKERNIS</a
                      >
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    >Regulasi</a
                  >
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="#"
                        >Undang - Undang</a
                      >
                    </li>
                    <li>
                      <a
                        class="dropdown-item dropdown-toggle dropdown-toggle-submenu"
                        href="#"
                        >Pemerintah</a
                      >
                      <ul class="submenu dropdown-menu">
                        <li>
                          <a
                            class="dropdown-item"
                            href="#"
                            >Peraturan Pemerintah</a
                          >
                        </li>
                        <li>
                          <a
                            class="dropdown-item"
                            href="#"
                            >Peraturan Menteri</a
                          >
                        </li>
                        <li>
                          <a
                            class="dropdown-item"
                            href="#"
                            >Peraturan Mahkamah Agung</a
                          >
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a
                        class="dropdown-item dropdown-toggle dropdown-toggle-submenu"
                        href="#"
                        >Presiden</a
                      >
                      <ul class="submenu dropdown-menu">
                        <li>
                          <a
                            class="dropdown-item"
                            href="#"
                            >Keputusan Presiden</a
                          >
                        </li>
                        <li>
                          <a
                            class="dropdown-item"
                            href="#"
                            >Peraturan Presiden</a
                          >
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a
                        class="dropdown-item dropdown-toggle dropdown-toggle-submenu"
                        href="#"
                        >Komisi Informasi</a
                      >
                      <ul class="submenu dropdown-menu">
                        <li>
                          <a
                            class="dropdown-item"
                            href="#"
                            >Peraturan Komisi Informasi</a
                          >
                        </li>
                        <li>
                          <a
                            class="dropdown-item"
                            href="#"
                            >Keputusan Komisi Informasi</a
                          >
                        </li>
                        <li>
                          <a
                            class="dropdown-item"
                            href="#"
                            >Intruksi Komisi Informasi</a
                          >
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#"
                        >Surat Edaran</a
                      >
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="ppid.html">PPID</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.html">Login</a>
                </li>
              </ul>
            </div>

            <!-- header right section -->
            <div class="header-right">
              <!-- header buttons -->
              <div class="header-buttons d-flex" style="width: 100%">
                <form class="d-flex" role="search">
                  <input
                    class="form-control me-2"
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                  />
                </form>
                <button class="burger-menu icon-button d-lg-none">
                  <span class="burger-icon"></span>
                </button>
              </div>
            </div>
          </div>
        </nav>
      </header>

	<!-- website form -->
	<div class="container shadow p-3 mb-5 mt-5 bg-white rounded w-50 d-none d-md-block">
		<div class="row d-flex justify-content-center">
				<p style="font-size: 1.5rem; font-weight:bold;" class="text-center">Daftar</p>
				<form action="{{url('/simpan_register')}}" method="POST" enctype="multipart/form-data" name="pengguna_baru_form">
          @csrf
					<div class="mb-3">
						<input placeholder="Nama" class="form-control" id="nama_lengkap" name="nama_lengkap" aria-describedby="NamaHelp">
					</div>
			    <select class="form-select mb-4 rounded-pill" aria-label="Default select example" id="pemohon" name="jenis_pemohon">
              <option disabled selected value="">Jenis Pemohonan</option>
              @foreach($pemohon as $it_pmhn)
              <option value="{{$it_pmhn->id}}" nilai="{{$it_pmhn->jenis_pemohon}}">{{$it_pmhn->jenis_pemohon}}</option>
              @endforeach
          </select>
				  <select class="form-select mb-4 rounded-pill" aria-label="Default select example" name="jenis_identitas[]" id="identitas">
              <option disabled selected>Jenis NIK</option>
          </select>
          <div class="mb-3">
							<input  placeholder="NIK" class="form-control" id="nomor_identitas" name="nomor_identitas[]" aria-describedby="NIKHelp">
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
                <div class="mb-3"><input  placeholder="NIK " class="form-control" name="nomor_identitas[]" id="exampleInputNIK1" aria-describedby="NIKHelp"></div>
                
            </div>
            <div id="tampungJenis"></div>
          <div class="mb-4">
              <label for="formFile" class="form-label text-danger">No indentitas wajib diisi!</label>
              <input class="form-control" type="file" id="file_identitas" name="file_identitas">
          </div>
          <div class="mb-3">
						<input  placeholder="NPWP " class="form-control" id="npwp" name="npwp" aria-describedby="NPWPHelp">
					</div>
          <select class="form-select mb-4 rounded-pill" aria-label="Default select example" name="pekerjaan" >
                <option disabled selected>Pekerjaan</option>
                @foreach($kerja as $it_kerja)
                <option value="{{$it_kerja->id}}">{{$it_kerja->jenis_kerja}}</option>
                @endforeach
          </select>
          <div class="mb-3">
						<input  placeholder="Alamat " class="form-control" id="alamat" name="alamat" aria-describedby="AlamatHelp">
					</div>
          <div class="mb-3">
						<input  placeholder="Telp " class="form-control" id="telp" name="telp" aria-describedby="TelpHelp">
					</div>
          <div class="mb-3">
						<input  placeholder="Keterangan " class="form-control" id="ket" name="ket" aria-describedby="KeteranganHelp">
					</div>
          <div class="mb-3">
						<input  placeholder="Email" type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
					</div>
					<div class="mb-3">
						<input type="password" placeholder="Password" class="form-control" id="pass" name="pass">
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
	<div class="container shadow p-3 mb-5 mt-5 bg-white rounded d-md-none">
		<div class="row d-flex justify-content-center">
				<p style="font-size: 1.5rem; font-weight:bold;" class="text-center">Daftar</p>
				<form>
          <div class="mb-3">
						<input placeholder="Nama" class="form-control" id="exampleInputNama1" aria-describedby="NamaHelp">
					  </div>

				    <select class="form-select mb-4 rounded-pill" aria-label="Default select example">
                        <option disabled selected>Jenis Pemohonan</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
				    <select class="form-select mb-4 rounded-pill" aria-label="Default select example">
                        <option disabled selected>Jenis NIK</option>
                        <option value="1">KTP</option>
                      </select>
                      
         
										  <div class="mb-3">
											<input  placeholder="NIK " class="form-control" id="exampleInputNIK1" aria-describedby="NIKHelp">
										  </div>
                      <div class="mb-4">
                        <label for="formFile" class="form-label text-danger">No indentitas wajib diisi!</label>
                        <input class="form-control" type="file" id="formFile">
                      </div>
                      <div class="mb-3">
						<input  placeholder="NPWP " class="form-control" id="exampleInputNPWP1" aria-describedby="NPWPHelp">
					  </div>
                      <select class="form-select mb-4 rounded-pill" aria-label="Default select example" >
                        <option disabled selected>Pekerjaan</option>
                        <option value="1">KTP</option>

                      </select>
                      <div class="mb-3">
						<input  placeholder="Alamat " class="form-control" id="exampleInputAlamat1" aria-describedby="AlamatHelp">
					  </div>
                      <div class="mb-3">
						<input  placeholder="Telp " class="form-control" id="exampleInputTelp1" aria-describedby="TelpHelp">
					  </div>
                      <div class="mb-3">
						<input  placeholder="Keterangan " class="form-control" id="exampleInputKeterangan1" aria-describedby="KeteranganHelp">
					  </div>
                      <div class="mb-3">
						<input  placeholder="Email " class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					  </div>
					  <div class="mb-3">
				
						<input type="password" placeholder="Password" class="form-control" id="exampleInputPassword1">
					  </div>
					  <div class="text-end">
              <button type="submit" class="btn " style="background-color:#ba131a ;">Daftar</button>
              <a href="login.html"><button type="button" class="btn " style="color:#ba131a ;">Batal</button></a>
            </div>
					  
					
				  </form>
			</div>
		
	</div>
	</div>
    

     <!-- footer -->
     <footer class="mt-4">
      <div class="container">
        <div class="footer-inner">
          <div class="row">
            <div class="col-md">
              <div class="ratio ratio-16x9 mb-2" >
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.53343329443!2d106.82206561471646!3d-6.193121195516543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5737b0a462f%3A0x69e5d936a3af9c04!2sGedung%20annex!5e0!3m2!1sid!2sid!4v1631590949664!5m2!1sid!2sid" title="Maps Wisma BSG Gedung Annex" allowfullscreen loading="lazy"></iframe>
              </div>
            </div>
            <div class="col-md">
              <ul class="list-unstyled">
                <li>
                  <p>Akses Cepat</p>
                </li>
                <li>
                  <a href="#" style="color: #fbfbfb;">Peta Situs</a>
                </li>
                <li>
                  <a href="#" style="color: #fbfbfb;">Hubungin Kami</a>
                </li>
                <li>
                  <a href="#" style="color: #fbfbfb;">Prasyarat</a>
                </li>
                <li>
                  <a href="#" style="color: #fbfbfb;">FaQ</a>
                </li>
              </ul>
            </div>
            <div class="col-md">
              <ul class="list-unstyled">
                <li>
                  <p>Portal</p>
                </li>
                <li>
                  <a href="#" style="color: #fbfbfb;">E-PPID</a>
                </li>
                <li>
                  <a href="#" style="color: #fbfbfb;">Pilkada</a>
                </li>
                <li>
                  <a href="#" style="color: #fbfbfb;">SIMSI</a>
                </li>
                <li>
                  <a href="#" style="color: #fbfbfb;">E-Monev</a>
                </li>
              </ul>
            </div>
            <div class="col-md text-center">
              <img class="pb-1" style="max-width: 100%;" src="images/image-removebg-preview.png" alt="logo">
              <ul class="social-icons list-unstyled list-inline mb-0">
                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
              </ul>
              <span class="copyright">© 2021 All Rights Reserved by komisiinformasi.go.id</span>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md d-md-flex">
                    <span class="material-icons">
                      place
                      </span>
                      <p>Wisma BSG Gedung Annex, Lt 1, Jl Abdul Muis No. 40 Jakarta Pusat 10110</p>
            </div>
            <div class="col-md d-md-flex">
                <span class="material-icons">
                  support_agent
                  </span>
                  <p>Telp : 021-34830741 <br> Fax 021-3451734</p>
            </div>
            <div class="col-md d-md-flex" >
              <span class="material-icons">
                email
              </span>
              <p>Email : sekretariat@komisiinformasi.go.id</p>
            </div>
            <div class="col-md d-md-flex">
              <span class="material-icons">
                language
              </span>
              <p>website : www.komisiinformasi.co.id</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
</div><!-- end site wrapper -->

<!-- canvas menu -->
<div class="canvas-menu d-flex align-items-end flex-column">
	<!-- close button -->
	<button type="button" class="btn-close" aria-label="Close"></button>

	<!-- logo -->
	<div class="logo">
		<img src="images\logo.png" alt="Logo" />
	</div>

	<!-- menu -->
	<nav>
		<ul class="vertical-menu">
			<li class="active"><a href="index.html">Home</a></li>
			<li><a href="profile.html">Profile</a></li>
			<li>
				<a href="category.html">Publikasi</a>
				<ul class="submenu">
					<li><a href="e-lhkpn.html">E-LHKPN</a></li>
					<li><a href="laporan.html">Laporan</a></li>
					<li><a href="kerjasama.html">Kerjasama</a></li>
					<li><a href="pustaka.html">Pustaka</a></li>
					<li><a href="#">KI Provinsi</a></li>
					<li><a href="rakernis.html">RAKERNIS</a></li>
				</ul>
			</li>
			<li>
				<a href="regulasi.html">Regulasi</a>
				<ul class="submenu">
					<li><a href="undang-undang.html">Undang - Undang</a></li>
					<li><a href="pemerintah.html">Pemerintah</a></li>
					<li><a href="presiden.html">Presiden</a></li>
					<li><a href="komisi-informasi.html">Komisi Informasi</a></li>
					<li><a href="surat-edaran.html">Surat Edaran</a></li>
				</ul>
			</li>
			<li><a href="ppid.html">PPID</a></li>
			<li><a href="login.html">Login</a></li>
		</ul>
	</nav>

	<!-- social icons -->
	<ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
		<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
		<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
		<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
		<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
		<li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
		<li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
	</ul>
</div>

<!-- JAVA SCRIPTS -->
{{-- <script src="{{ asset('fron_asset/js/jquery.min.js') }}"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{ asset('fron_asset/js/popper.min.js') }}"></script>
<script src="{{ asset('fron_asset/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('fron_asset/js/slick.min.js') }}"></script>
<script src="{{ asset('fron_asset/js/jquery.sticky-sidebar.min.js') }}"></script>
<script src="{{ asset('fron_asset/js/custom.js') }}"></script>
<script src="{{asset('assets/js/jquery.form-validator.min.js')}}"></script>


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
 
  
</script>
</body>
</html>