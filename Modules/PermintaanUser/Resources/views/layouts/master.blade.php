<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>komisiinformasi</title>
    <meta name="description" content="komisiinformasi" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('fron_asset/images/favicon.png')}}" />

    <!-- STYLES -->
    <link rel="stylesheet" href="{{asset('fron_asset/css/bootstrap.min.css')}}" type="text/css" media="all"/>
    <link rel="stylesheet" href="{{asset('fron_asset/css/all.min.css')}}" type="text/css" media="all"/>
    <link rel="stylesheet" href="{{asset('fron_asset/css/slick.css')}}" type="text/css" media="all"/>
    <link rel="stylesheet" href="{{asset('fron_asset/css/simple-line-icons.css')}}" type="text/css" media="all"/>
    <link rel="stylesheet" href="{{asset('fron_asset/css/style.css')}}" type="text/css" media="all"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <!-- Propeller css -->
    <link href="{{asset('fron_asset/css/propeller.min.css')}}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https:////cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>

    @yield('css')
  </head>

  <body>
    <div id="preloader">
      <div class="loading">
        <img src="{{asset('fron_asset/images/Spinner-1s-200px.gif')}}">
      </div>
    </div>
    <!-- site wrapper -->
    <div class="site-wrapper">
      <div class="main-overlay"></div>

      <!-- header -->
      <header class="header-default" >
        <div class=" text-white py-2 px-4" style="background-color: #1474ae;">
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
        

        <nav class="navbar navbar-expand-lg justify-content-between px-4">
            @php
            $ambil_nama = Session::get('nama');
           @endphp
            <!-- site logo -->
            <a class="navbar-brand" href="index.html"
              ><img style="max-width: 235px" src="{{asset('fron_asset\images\logo.png')}}" alt="logo"
            /></a>

            <div class="collapse navbar-collapse" style="flex-grow: unset">
              <!-- menus -->
              <ul
                class="navbar-nav mr-auto"
                style="font-size: 14px; font-weight: bold">
                <li class="nav-item">
                  <a class="nav-link" href="index.html">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="category.html"
                    >Profile</a
                  >
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="profile.html">Profile Singkat</a></li>
                      <li><a class="dropdown-item" href="#">Tugas, Fungsi, dan Wewenang</a></li>
                      <li><a class="dropdown-item" href="#">Struktur</a></li>
                      <li><a class="dropdown-item" href="#">Visi dan Misi</a></li>
                      <li><a class="dropdown-item" href="#">Kontak</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="regulasi.html">Regulasi</a>
                </li>
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    >Informasi Publik</a
                  >
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="#"
                        >Informasi Berkala</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="#"
                        >Informasi Serta Merta</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="#"
                        >Informasi Tersedia Setiap Saat</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="#"
                        >Video Informasi Publik</a
                      >
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="ppid.html">Laporan</a>
                </li>
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    >Standar Layanan</a
                  >
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="#"
                        >Maklumat Pelayanan</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="#"
                        >Prosedur Permintaan Informasi</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="#"
                        >Prosedur Pengajuan Keberatan</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="#"
                        >Prosedur Sengketa Informasi</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="#"
                        >Jalur dan Waktu Layanan</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="#"
                        >Biaya Layanan</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="#"
                        >Kebijakan Privasi</a
                      >
                    </li>
                  </ul>
                  
                  @if (session()->has('id'))
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('user.minta')}}">Permintaan</a>
                  </li>
				  <li class="nav-item dropdown">
					<a
					  class="nav-link dropdown-toggle"
					  href="#"
					  >{{$ambil_nama}}</a
					>
					<ul class="dropdown-menu">
					  <li>
						<a class="dropdown-item" href="{{route('profil_us')}}"
						  >Kelola Profil</a
						>
					  </li>
					  <li>
						<a class="dropdown-item" href="#"
						  >Ubah Password</a
						>
					  </li>
					  <li>
						<a class="dropdown-item" href="{{route('signout.user')}}"
						  >Logout</a
						>
					  </li>
					</ul>
				  </li>
				  @else
				  <li class="nav-item">
					<a class="nav-link" href="{{route('loginus')}}">Login</a>
				  </li>
				  @endif
              </ul>
            </div>
            <!-- header right section -->
            <div class="d-block d-md-none">
              <!-- header buttons -->
              <div class="header-buttons d-flex" style="width: 100%">
                <button class="burger-menu icon-button d-lg-none">
                  <span class="burger-icon"></span>
                </button>
              </div>
            </div>

        </nav>
      </header>

      @yield('content')

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
    </div>
    <!-- end site wrapper -->

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
              <li>
                <a href="komisi-informasi.html">Komisi Informasi</a>
              </li>
              <li><a href="surat-edaran.html">Surat Edaran</a></li>
            </ul>
          </li>
          <li><a href="ppid.html">PPID</a></li>
          <li><a href="permintaan.html">Permintaan</a></li>
          <li><a href="user.html">User</a></li>
        </ul>
      </nav>

      <!-- social icons -->
      <ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
        <li class="list-inline-item">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
        </li>
        <li class="list-inline-item">
          <a href="#"><i class="fab fa-twitter"></i></a>
        </li>
        <li class="list-inline-item">
          <a href="#"><i class="fab fa-instagram"></i></a>
        </li>
        <li class="list-inline-item">
          <a href="#"><i class="fab fa-pinterest"></i></a>
        </li>
        <li class="list-inline-item">
          <a href="#"><i class="fab fa-medium"></i></a>
        </li>
        <li class="list-inline-item">
          <a href="#"><i class="fab fa-youtube"></i></a>
        </li>
      </ul>
    </div>

    <!-- JAVA SCRIPTS -->
     <!-- ✅ load jQuery (optional) ✅ -->
 <script
 src="https://code.jquery.com/jquery-3.6.0.min.js"
 integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
 crossorigin="anonymous"
></script>

<!-- ✅ load popper.js ✅ -->
<script
 src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
 integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
 crossorigin="anonymous"
></script>

<!-- ✅ load Bootstrap JS ✅ -->
<script
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
 integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
 crossorigin="anonymous"
></script>
    <script src="{{asset('fron_asset/js/slick.min.js')}}"></script>
    <script src="{{asset('fron_asset/js/jquery.sticky-sidebar.min.js')}}"></script>
    <script src="{{asset('fron_asset/js/custom.js')}}"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"
      integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script type="text/javascript" src="{{asset('fron_asset/js/propeller.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    
    <script>
      $(document).ready(function () {
        $("#myTable").DataTable({
          pageLength: 3,
          lengthMenu: [3,10,15],
        });
      });
    </script>
    @yield('script')
  </body>
</html>

