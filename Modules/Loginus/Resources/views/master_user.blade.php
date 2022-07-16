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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('fron_asset/images/favicon.png')}}" />

    <!-- STYLES -->
    <link rel="stylesheet" href="{{ asset('fron_asset/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('fron_asset/css/all.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('fron_asset/css/slick.css')}}"/>
    <link rel="stylesheet" href="{{ asset('fron_asset/css/style.css')}}"/>
    <link rel="stylesheet" href="{{ asset('fron_asset/css/simple-line-icons.css')}}"/>
    <!-- Propeller css -->
    <link href="{{ asset('fron_asset/css/propeller.min.css')}}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    @yield('css')
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
              </ul>
            </div>
          </div>
        </div>
        

        <nav class="navbar navbar-expand-lg">
          <div class="container">
            <!-- site logo -->
            <a class="navbar-brand" href="index.html"
              ><img style="max-width: 235px" src="{{asset('fron_asset/images\logo.png')}}" alt="logo"
            /></a>

            <div class="collapse navbar-collapse" style="flex-grow: unset">
              <!-- menus -->
              @php
                $ambil_nama = Session::get('nama');
                @endphp
              <ul
                class="navbar-nav mr-auto"
                style="font-size: 1rem; font-weight: bold"
              >
                <li class="nav-item">
                  <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="profile.html">Profile</a>
                </li>
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="category.html"
                    >Publikasi</a
                  >
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="e-lhkpn.html"
                        >E-LHKPN</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="video.html"
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
                            href="laporan/pemeringkatan.html"
                            >Laporan Pemeringkatan</a
                          >
                        </li>
                        <li>
                          <a
                            class="dropdown-item"
                            href="laporan/tahunan.html"
                            >Laporan Tahunan</a
                          >
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a class="dropdown-item" href="kerjasama.html"
                        >Kerjasama</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="pustaka.html"
                        >Pustaka</a
                      >
                    </li>
                    <li><a class="dropdown-item" href="#">KI Provinsi</a></li>
                    <li>
                      <a class="dropdown-item" href="rakernis.html"
                        >RAKERNIS</a
                      >
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="regulasi.html"
                    >Regulasi</a
                  >
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="undang-undang.html"
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
                            href="pemerintah/pemerintah.html"
                            >Peraturan Pemerintah</a
                          >
                        </li>
                        <li>
                          <a
                            class="dropdown-item"
                            href="pemerintah/menteri.html"
                            >Peraturan Menteri</a
                          >
                        </li>
                        <li>
                          <a
                            class="dropdown-item"
                            href="pemerintah/mahkamah-agung.html"
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
                            href="presiden/keputusan.html"
                            >Keputusan Presiden</a
                          >
                        </li>
                        <li>
                          <a
                            class="dropdown-item"
                            href="presiden/peraturan.html"
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
                            href="komisi-informasi/keputusan.html"
                            >Peraturan Komisi Informasi</a
                          >
                        </li>
                        <li>
                          <a
                            class="dropdown-item"
                            href="komisi-informasi/peraturan.html"
                            >Keputusan Komisi Informasi</a
                          >
                        </li>
                        <li>
                          <a
                            class="dropdown-item"
                            href="komisi-informasi/intruksi.html"
                            >Intruksi Komisi Informasi</a
                          >
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a class="dropdown-item" href="surat-edaran.html"
                        >Surat Edaran</a
                      >
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="ppid.html">PPID</a>
                </li>
                @if (session()->has('id'))
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

      <!-- portal -->
      <style>
        .card-body{
          position: absolute;
          bottom: 0;
          left: 0;
          right: 0;
          color: white;
          background: rgba(186, 19, 26, 0.2);
        }

        .card-title{
          font-size: 1rem;
          font-weight: bold;
        }
      </style>



      <!-- section main content -->
      <section class="main-content">
        <div class="container">
            @yield('content')
        </div>
      </section>

      <!-- Floating Action Button like Google Material -->
      <div class="menu pmd-floating-action rounded-pill border border-2"  role="navigation" style="width: 254px; background-color: #ba131a;"> 
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
                <img class="pb-1" style="max-width: 100%;" src="{{ asset('fron_asset/images/image-removebg-preview.png')}}" alt="logo">
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
        <ul class="vertical-menu">
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="profile.html">Profile</a></li>
          <li>
            <a href="category.html">Publikasi</a>
            <ul class="submenu">
              <li><a href="e-lhkpn.html">E-LHKPN</a></li>
              <li><a href="e-lhkpn.html">Video</a></li>
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
    <script src="{{ asset('fron_asset/js/jquery.min.js')}}"></script>
    <script src="{{ asset('fron_asset/js/popper.min.js')}}"></script>
    <script src="{{ asset('fron_asset/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('fron_asset/js/slick.min.js')}}"></script>
    <script src="{{ asset('fron_asset/js/jquery.sticky-sidebar.min.js')}}"></script>
    <script src="{{ asset('fron_asset/js/custom.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"
      integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script type="text/javascript" src="{{ asset('fron_asset/js/propeller.min.js')}}"></script>
    <script src="{{ asset('fron_asset/js/diagram.js')}}"></script>
    @yield('script')
  </body>
</html>
