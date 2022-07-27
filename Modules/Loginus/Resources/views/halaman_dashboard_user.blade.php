@extends('loginus::layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}">
<link href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
<style>
  .card-body{
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    color: white;
    background: rgb(20, 116, 174, 0.2);
  }

  .card-title{
    font-size: 1rem;
    font-weight: bold;
  }
</style>
@endsection
@section('content')
     <!-- hero section -->
     <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner" >
        <div class="carousel-item active"  style="background-image: url(' https://komisiinformasi.go.id/images/slider/20220315091141-DESA_1.jpeg');">
          <div class="carousel-caption text-left">
            <h1 class="title-caption">First slide label</h1>
            <p class="sub-caption">Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item"  style="background-image: url('https://bppk.kemenkeu.go.id/storage/basecontent-banner/331a7d98-a208-4d92-9b80-2d182538f395')">
          <div class="carousel-caption text-left">
            <h1 class="title-caption">First slide label</h1>
            <p class="sub-caption">Some representative placeholder content for the first slide.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
      
      <div class="marquee">
        <div class="container-xl">
          <marquee behavior="scroll" scrollamount="5" class="marquee">
            <a href="#" style="margin-right: 180px; color: white;">Test Link</a>
            Buka Informasi Publik, Hak Anda Untuk Tahu
            <a href="#" style="margin-left: 180px; color: white;">Test Link</a>


          </marquee>
        </div>
      </div>

    <!-- portal -->

    <div class="container mt-3">
      <div class="row">
        <div class="col-md-3 text-center ">
          <!-- contact info item -->
          <a href="#">
            <div class="card shadow-sm">
              <img src="https://images.unsplash.com/photo-1579621970795-87facc2f976d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-title">PPID</p>
              </div>
            </div>
          </a>
          <div class="spacer" data-height="20"></div>
        </div>

        <div class="col-md-3 text-center">
          <!-- contact info item -->
          <a href="#">

            <div class="card shadow-sm">
              <img src="https://images.unsplash.com/photo-1579621970795-87facc2f976d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-title">SIMSI</p>
              </div>
            </div>
          </a>
          <div class="spacer" data-height="20"></div>
        </div>

        <div class="col-md-3 text-center">
          <!-- contact info item -->
          <a href="#">

            <div class="card shadow-sm">
              <img src="https://images.unsplash.com/photo-1579621970795-87facc2f976d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-title">JDIH</p>
              </div>
            </div>
          </a>
          <div class="spacer" data-height="20"></div>
        </div>

        <div class="col-md-3 text-center">
          <!-- contact info item -->
          <a href="#">

            <div class="card shadow-sm">
              <img src="https://images.unsplash.com/photo-1579621970795-87facc2f976d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-title">E-MONEV

                </p>
              </div>
            </div>
          </a>
          <div class="spacer" data-height="20"></div>
        </div>
      </div>
    </div>


    <div class="container d-flex flex-column justify-content-center text-center">
      
      <p style="font-size: 2rem; font-weight: bold" id="judulInformasi"> Statistik Permintaan
      </p>
      <div class="statistik">
        <div class="d-flex">
          <select class="form-select form-select w-25 " id="jenisData" aria-label=".form-select-lg example" onchange="updateJenisLaporan(this)">
            <option value="permintaan" selected>Permintaan</option>
            <option value="disetujui">Disetujui</option>
            <option value="ditolak">Ditolak</option>
            <option value="keberatan">keberatan</option>
          </select>
         <button type="button" class="btn " style="margin-left: 10px; background-color: #1474ae;">Report</button>
        </div>
        <canvas id="myChart"></canvas>
        <canvas id="myChart2" style="display: none;"></canvas>
        <button id="kembali" class="btn rounded-circle" style="background-color: #1474ae; display: none;"><span class="material-icons">
          arrow_back
          </span></button>
      </div>
    </div>

    <!-- section main content -->
    <section class="main-content">
      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-9">
            <div class="spacer" data-height="30"></div>

            <!-- section header Video -->
            <div class="section-header">
              <h3 class="section-title" >Video</h3>
            </div>

            <div class="padding-30 rounded bordered" style="height: 90%">
              <iframe
                width="100%"
                height="100%"
                src="https://www.youtube.com/embed/hiUhWL7-TcY"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
              ></iframe>
            </div>

            <div class="spacer" data-height="30"></div>
          </div>
          <div class="col-lg-3">
            <div class="spacer" data-height="30"></div>

            <!-- sidebar -->
            <div class="sidebars">
              <!-- widget about -->
              <div class="widget-twitter">
                <!-- <div class="widget-about text-center">
                </div> -->
                <blockquote class="twitter-tweet">
                  <p lang="in" dir="ltr">
                    Halo Sahabat Transparansi<br /><br />Dalam memperingati
                    &quot;HARI HAK UNTUK TAHU SEDUNIA&quot; yang akan
                    diselenggarakan pada tanggal 28 September 2021.
                    <a href="https://twitter.com/KIPusat?ref_src=twsrc%5Etfw"
                      >@KIPusat</a
                    >
                    mengadakan lomba vidio kreatif.<br /><br />silahkan klik
                    link di bio ya kalau mau daftar, dilihat baik baik form
                    nya butuh apa saja, thank you😌🥰
                    <a href="https://t.co/MAq6xc2BrL"
                      >pic.twitter.com/MAq6xc2BrL</a
                    >
                  </p>
                  &mdash; #HakAndaUntukTahu (@KIPusat)
                  <a
                    href="https://twitter.com/KIPusat/status/1432160076861566979?ref_src=twsrc%5Etfw"
                    >August 30, 2021</a
                  >
                </blockquote>
                <script
                  async
                  src="https://platform.twitter.com/widgets.js"
                  charset="utf-8"
                ></script>
              </div>
            </div>
          </div>
        </div>

        <!-- partner -->
        <div class="spacer" data-height="50"></div>

        <div class="row post-carousel-featured post-carousel post-partner">
          <!-- post -->
          <div class="post featured-post-md">
            <a href="blog-single.html">
              <div class="thumb rounded">
                <img
                  src="https://komisiinformasi.go.id/images/slider/20211110041909-OMBUDSMAN.png"
                  alt="insta-title"
                />
              </div>
            </a>
          </div>
          <!-- post -->
          <div class="post featured-post-md">
            <a href="blog-single.html">
              <div class="thumb rounded">
                <img
                  src="https://komisiinformasi.go.id/images/slider/20211110042027-mahkamah.png"
                  alt="insta-title"
                />
              </div>
            </a>
          </div>
          <!-- post -->
          <div class="post featured-post-md">
            <a href="blog-single.html">
              <div class="thumb rounded">
                <img
                  src="https://komisiinformasi.go.id/images/slider/20211110042300-KPK.png"
                  alt="insta-title"
                />
              </div>
            </a>
          </div>
          <!-- post -->
          <div class="post featured-post-md">
            <a href="blog-single.html">
              <div class="thumb rounded">
                <img
                  src="https://komisiinformasi.go.id/images/slider/20211110042320-Untitled-1setaf-presiden.png"
                  alt="insta-title"
                />
              </div>
            </a>
          </div>
          <!-- post -->
          <div class="post featured-post-md">
            <a href="blog-single.html">
              <div class="thumb rounded">
                <img
                  src="https://komisiinformasi.go.id/images/slider/20211110042511-MK.png"
                  alt="insta-title"
                />
              </div>
            </a>
          </div>
          <!-- post -->
          <div class="post featured-post-md">
            <a href="blog-single.html">
              <div class="thumb rounded">
                <img
                  src="https://komisiinformasi.go.id/images/slider/20211110042529-HAM.png"
                  alt="insta-title"
                />
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
@endsection
@section('script')
<script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins-init/sweetalert.init.js')}}"></script>
<script src="{{asset('assets/vendor/toastr/js/toastr.min.js')}}"></script>
    <script>
       @if ($message = Session::get('keluar'))
    toastr.success("{{ $message }}","perhatian !!", {
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
    </script>
@endsection



