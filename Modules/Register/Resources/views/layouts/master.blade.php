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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('fron_asset/images/favicon.png') }}" />

    <!-- STYLES -->
    <link rel="stylesheet" href="{{ asset('fron_asset/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('fron_asset/css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('fron_asset/css/slick.css') }}"/>
    <link rel="stylesheet" href="{{ asset('fron_asset/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('fron_asset/css/simple-line-icons.css') }}"/>
    <!-- Propeller css -->
    <link href="{{ asset('fron_asset/css/propeller.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    @yield('css')

  </head>

  <body>

    <div id="preloader">
      <div class="loading">
        <img src="{{ asset('fron_asset/images/Spinner-1s-200px.gif') }}">
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
            <!-- site logo -->
            <a class="navbar-brand" href="#"
              ><img style="max-width: 235px" src="{{ asset('fron_asset\images\logo.png') }}" alt="logo"
            /></a>

            <div class="collapse navbar-collapse" style="flex-grow: unset">
              <!-- menus -->
              @php
                $ambil_nama = Session::get('nama');
              @endphp
              <ul
                class="navbar-nav mr-auto"
                style="font-size: 14px; font-weight: bold">
                <li class="nav-item">
                  <a class="nav-link" href="#">Beranda</a>
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
                  <a class="nav-link" href="#">Regulasi</a>
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
                      <a class="dropdown-item dropdown-toggle dropdown-toggle-submenu" href="#">Laporan</a>
                      <ul class="submenu dropdown-menu">
                        <li><a class="dropdown-item" href="#">Laporan Pemeringkatan</a></li>
                        <li><a class="dropdown-item" href="#">Laporan Tahunan</a></li>
                      </ul>
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
                  <a class="nav-link" href="#">Laporan</a>
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
                    {{-- <li>
                      <a class="dropdown-item" href="#"
                        >Ubah Password</a
                      >
                    </li> --}}
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

      <!-- Floating Action Button like Google Material -->
      <div class="menu pmd-floating-action rounded-pill border border-2"  role="navigation" style="width: 254px; background-color: #253c80;"> 
        <button class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect  w-100" type="button">Komisi Informasi Pusat </button>
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
                <img class="pb-1" style="max-width: 100%;" src="{{ asset('fron_asset/images/image-removebg-preview.png') }}" alt="logo">
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
    <!-- end site wrapper -->

    <!-- canvas menu -->
    <div class="canvas-menu d-flex align-items-end flex-column">
      <!-- close button -->
      <button type="button" class="btn-close" aria-label="Close"></button>

      <!-- logo -->
      <div class="logo">
        <img src="{{ asset('fron_asset\images\logo.png')}}" alt="Logo" />
      </div>

      <!-- menu -->
      <nav>
        <ul class="vertical-menu" >
          <li class="active"><a href="#">Beranda</a></li>
          <li>
            <a href="#">Profile</a>
            <ul class="submenu">
              <li><a href="#">Profile Singkat</a></li>
              <li><a href="#">Tugas, Fungsi, dan Wewenang</a></li>
              <li><a href="#">Struktur</a></li>
              <li><a href="#">Visi dan Misi</a></li>
              <li><a href="#">Kontak</a></li>
            </ul>
          </li>
          <li ><a href="regulasi.html">Regulasi</a></li>
          <li>
            <a href="#">Informasi Publik</a>
            <ul class="submenu">
              <li><a href="#">Profile Singkat</a></li>
              <li><a href="#">Tugas, Fungsi, dan Wewenang</a></li>
              <li><a href="#">Struktur</a></li>
              <li><a href="#">Visi dan Misi</a></li>
              <li><a href="#">Kontak</a></li>
            </ul>
          </li>
          <li ><a href="#">Laporan</a></li>
          <li>
            <a href="#">Standar Layanan</a>
            <ul class="submenu">
              <li><a href="#">Profile Singkat</a></li>
              <li><a href="#">Tugas, Fungsi, dan Wewenang</a></li>
              <li><a href="#">Struktur</a></li>
              <li><a href="#">Visi dan Misi</a></li>
              <li><a href="#">Kontak</a></li>
            </ul>
          </li>
          <li><a href="login.html">Login</a></li>
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
    {{-- <script src="{{ asset('fron_asset/js/jquery.min.js') }}"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{ asset('fron_asset/js/popper.min.js') }}"></script>
    <script src="{{ asset('fron_asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('fron_asset/js/slick.min.js') }}"></script>
    <script src="{{ asset('fron_asset/js/jquery.sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('fron_asset/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js') }}"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"
      integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script type="text/javascript" src="{{ asset('fron_asset/js/propeller.min.js') }}"></script>
    <script src="{{ asset('fron_asset/js/diagram.js') }}"></script>

    @yield('script')

  </body>
</html>
