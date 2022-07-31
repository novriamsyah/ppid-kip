@extends('permintaanuser::layouts.master')

@section('css')

    <style>
      table tr th {
    color:#000;
    }
    table tr td {
      color:rgb(22, 22, 22);
    }
      @media (min-width: 992px) {
    .modal-lg{
      min-width: 1000px !important;
    }
  }

    </style>
@endsection

@section('content')
<div class="container mt-3">
    <div class="row">
      <div class="col-md ">
        <!-- contact info item -->
        <div class="card text-white" style="background-color: #0e5179;">
          <div class="card-body">
            <div class="row">
                <div class="col-md text-center">
                  <h1 style="font-size: 5rem; font-weight:bold">4</h1> 
                </div>
                <div class="col-md text-center">
                  <span class="material-icons" style="font-size: 4rem;">
                  publish
                  </span>
                </div>
                <p class="text-center" style="font-weight: bold; font-size:1rem;">Jumlah Permintaan</p>
            </div>
          </div>
        </div>
        <div class="spacer" data-height="20"></div>
      </div>

      <div class="col-md">
        <!-- contact info item -->
        <div class="card text-white" style="background-color:#1474ae;">
          <div class="card-body">
            <div class="row">
              <div class="col-md text-center">
                <h1 style="font-size: 5rem; font-weight:bold">4</h1> 
              </div>
              <div class="col-md text-center">
                <span class="material-icons" style="font-size: 4rem;">
                refresh
                </span>
              </div>
              <p class="text-center" style="font-weight: bold; font-size:1rem;">Permintaan dalam proses</p>
          </div>
          </div>
        </div>
        <div class="spacer" data-height="20"></div>
      </div>
      <div class="col-md">
        <!-- contact info item -->
        <div class="card text-white" style="background-color: #72abce;">
          <div class="card-body">
            <div class="row">
              <div class="col-md text-center">
                <h1 style="font-size: 5rem; font-weight:bold">4</h1> 
              </div>
              <div class="col-md text-center">
                <span class="material-icons" style="font-size: 4rem;">
                  highlight_off
                </span>
              </div>
              <p class="text-center" style="font-weight: bold; font-size:1rem;">Permintaan ditolak</p>
          </div>
          </div>
        </div>
        <div class="spacer" data-height="20"></div>
      </div>
      <div class="col-md">
        <!-- contact info item -->
        <div class="card text-white" style="background-color: #1474ae;">
          <div class="card-body">
            <div class="row">
              <div class="col-md text-center">
                <h1 style="font-size: 5rem; font-weight:bold">5</h1> 
              </div>
              <div class="col-md text-center">
                <span class="material-icons" style="font-size: 4rem;">
                  error_outline
                </span>
              </div>
              <p class="text-center" style="font-weight: bold; font-size:1rem;">Keberatan</p>
          </div>
          </div>
        </div>
        <div class="spacer" data-height="20"></div>
      </div>
      <div class="col-md">
        <!-- contact info item -->
        <div class="card text-white" style="background-color: #0e5179;">
          <div class="card-body">
            <div class="row">
              <div class="col-md text-center">
                <h1 style="font-size: 5rem; font-weight:bold">0</h1> 
              </div>
              <div class="col-md text-center">
                <span class="material-icons" style="font-size: 4rem;">
                  sync_problem
                </span>
              </div>
              <p class="text-center" style="font-weight: bold; font-size:1rem;">Keberatan Diproses</p>
          </div>
          </div>
        </div>
        <div class="spacer" data-height="20"></div>
      </div>
    </div>
</div>

  <div class="container d-flex justify-content-center flex-column w-90" style="margin-top: 50px; margin-bottom:100px;background-color:#ffffff">
    <div><h2 style="text-align: center;">List Permintaan</h2></div>
    <div class="text-start mb-3">
      <a href="{{route('tambah.permintaan')}}">
          <button type="button" class="btn rounded-pill" style="background-color:#1474ae ;">Tambah Permintaan</button>
      </a>
   </div>
    <div class="overflow-auto row d-flex">
      @php
             \Carbon\Carbon::setLocale('id'); 
          @endphp
      <table class="table" id="myTable">
        <thead>
          <tr>
            <th scope="col">Tanggal Pengajuan</th>
            <th scope="col">Permintaan Informasi</th>
            <th scope="col">No. Registrasi</th>
            <th scope="col">Tanggal Registrasi</th>
            <th scope="col">Dokumen Pendukung</th>
            <th scope="col">Tanggal Jatuh Tempo</th>
            <th scope="col">Status</th>
            <th scope="col">Pemberitahuan Tertulis</th>
            <th scope="col">Keberatan</th>
          </tr>
        </thead>
        <tbody>
          
          <tr>
            @foreach ($ambil_data as $user_minta)
            <td>{{\Carbon\Carbon::parse($user_minta->created_at)->translatedFormat('d F Y')}}</td>
           
            <td>{{$user_minta->isi}}</td>
            <td>{{$user_minta->noreg}}</td>
            @if (!$user_minta->tgl_kirim)
            <td>-</td>
            @else
            <td>{{\Carbon\Carbon::parse($user_minta->tgl_kirim)->translatedFormat('d F Y')}}</td>
            @endif
            <td><button
              class="btn mb-4 lihat_pdf"
              type="button"
              style="background-color: #f71e1e; border-radius:50%"
              data-bs-toggle="modal"
              data-bs-target="#pdf_view" data-lihat="{{$user_minta->id}}">Lihat
            </button></td>
            @if (!$user_minta->jatuh_tempo)
            <td>-</td>
            @else
            <td>{{\Carbon\Carbon::parse($user_minta->jatuh_tempo)->translatedFormat('d F Y')}}</td>
            @endif
            
              @if ($user_minta->status == 0)
              <td>Diajukan</td>
              @elseif ($user_minta->status == 1)
              <td>Diproses</td>
              @elseif ($user_minta->status == 2)
              <td>Ditolak</td>
              @elseif ($user_minta->status == 3)
              <td>Selesai</td>
              @elseif ($user_minta->status == 4)
              <td>Keberatan</td>
              @else
              <td>batal</td>  
              @endif
            <td>
              <button
                class="btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect mb-4"
                type="button"
                style="background-color: #1474ae"
                data-bs-toggle="modal"
                data-bs-target="#pemberitahuan"
              >
                <i class="material-icons pmd-sm">visibility</i>
              </button>
            </td>
            <td>
              {{-- <button
                class="btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect mb-4 keberatan_get"
                type="button"
                style="background-color: #1474ae"
                data-bs-toggle="modal"
                data-bs-target="#keberatan"
                id-kbrtn="{{$user_minta->id}}"
              >
                <i class="material-icons pmd-sm">info</i>
              </button> --}}

              <a href="{{url('/lihat_keberatan/'.$user_minta->id)}}" class="btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect mb-4 keberatan_get" role="button" style="background-color: #1474ae"><i class="material-icons pmd-sm">info</i></a>
              <a href="{{route('tambah.keberatan')}}" class="btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect mb-4 keberatan_get" role="button" style="background-color: #008b35"><i class="material-icons pmd-sm">add_circle</i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>


    <!-- Modal view pdf -->
    <div
    class="modal overflow-auto fade"
    id="pdf_view"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div
      class="modal-dialog modal-lg modal-dialog-centered"
      role="document"
    >
      <div class="modal-content konten">
        <div class="modal-header">
          <h2
            class="modal-title"
            id="exampleModalCenterTitle"
            style="font-weight: bold"
          >
            Dokumen Pendukung
          </h2>
          <button
            type="button"
            class="close"
            data-bs-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body" id="lihat_pendukung">
          {{-- <iframe src="{{asset('/file/Pembahasan Pola Gambar.pdf')}}" width="950" height="690">Browser kamu tidak support</iframe> --}}
          {{-- <embed src="{{asset('/file/Pembahasan Pola Gambar.pdf')}}" type="application/pdf"> --}}
        </div>

      </div>
    </div>
  </div>

  <!-- Modal -->
  <div
    class="modal overflow-auto fade"
    id="pemberitahuan"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div
      class="modal-dialog modal-xl modal-dialog-centered"
      role="document"
    >
      <div class="modal-content">
        <div class="modal-header">
          <h2
            class="modal-title"
            id="exampleModalCenterTitle"
            style="font-weight: bold"
          >
            Pemberitahuan Tertulis
          </h2>
          <button
            type="button"
            class="close"
            data-bs-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Basic Table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Code</th>
                  <th>State/City</th>
                  <th>Incharge Name</th>
                  <th>Mobile</th>
                  <th>Type of Work</th>
                  <th>End Date of Work</th>
                  <th>Status</th>
                  <th>Timesheet</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-title="Name">Giacomo Guilizzoni</td>
                  <td data-title="Code">JONEA140</td>
                  <td data-title="State/City">Melbourne</td>
                  <td data-title="Incharge Name">Giacomo Guilizzoni</td>
                  <td data-title="Mobile">9625145236</td>
                  <td data-title="Type of Work">9625145236</td>
                  <td data-title="End Date of Work">1 June 2014</td>
                  <td data-title="Active">Active</td>
                  <td data-title="Timesheet">Timesheet</td>
                  <td data-title="">
                    <div class="dropdown">
                      <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-icons md-dark pmd-sm">more_vert</i>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>                          </div>
                    </div>
                   
                  </td>
                </tr>
                <tr>
                  <td data-title="Name">Giacomo Guilizzoni</td>
                  <td data-title="Code">JONEA140</td>
                  <td data-title="State/City">Melbourne</td>
                  <td data-title="Incharge Name">Giacomo Guilizzoni</td>
                  <td data-title="Mobile">9625145236</td>
                  <td data-title="Type of Work">9625145236</td>
                  <td data-title="End Date of Work">1 June 2014</td>
                  <td data-title="Active">Active</td>
                  <td data-title="Timesheet">Timesheet</td>
                  <td data-title="">
                    <div class="dropdown">
                      <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-icons md-dark pmd-sm">more_vert</i>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>                          </div>
                    </div>
                   
                  </td>
                </tr>
                <tr>
                  <td data-title="Name">Giacomo Guilizzoni</td>
                  <td data-title="Code">JONEA140</td>
                  <td data-title="State/City">Melbourne</td>
                  <td data-title="Incharge Name">Giacomo Guilizzoni</td>
                  <td data-title="Mobile">9625145236</td>
                  <td data-title="Type of Work">9625145236</td>
                  <td data-title="End Date of Work">1 June 2014</td>
                  <td data-title="Active">Active</td>
                  <td data-title="Timesheet">Timesheet</td>
                  <td data-title="">
                    <div class="dropdown">
                      <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-icons md-dark pmd-sm">more_vert</i>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>                          </div>
                    </div>
                   
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div
    class="modal overflow-auto fade"
    id="keberatan"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true"
  >
    <div
      class="modal-dialog modal-xl modal-dialog-centered"
      role="document"
    >
      <div class="modal-content">
        <div class="modal-header">
          <h2
            class="modal-title"
            id="exampleModalCenterTitle"
            style="font-weight: bold"
          >
            List Keberatan
          </h2>
          <button
            type="button"
            class="close"
            data-bs-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Basic Table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Code</th>
                  <th>State/City</th>
                  <th>Incharge Name</th>
                  <th>Mobile</th>
                  <th>Type of Work</th>
                  <th>End Date of Work</th>
                  <th>Status</th>
                  <th>Timesheet</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-title="Name">Giacomo Guilizzoni</td>
                  <td data-title="Code">JONEA140</td>
                  <td data-title="State/City">Melbourne</td>
                  <td data-title="Incharge Name">Giacomo Guilizzoni</td>
                  <td data-title="Mobile">9625145236</td>
                  <td data-title="Type of Work">9625145236</td>
                  <td data-title="End Date of Work">1 June 2014</td>
                  <td data-title="Active">Active</td>
                  <td data-title="Timesheet">Timesheet</td>
                  <td data-title="">
                    <div class="dropdown">
                      <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-icons md-dark pmd-sm">more_vert</i>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>                          </div>
                    </div>
                   
                  </td>
                </tr>
                <tr>
                  <td data-title="Name">Giacomo Guilizzoni</td>
                  <td data-title="Code">JONEA140</td>
                  <td data-title="State/City">Melbourne</td>
                  <td data-title="Incharge Name">Giacomo Guilizzoni</td>
                  <td data-title="Mobile">9625145236</td>
                  <td data-title="Type of Work">9625145236</td>
                  <td data-title="End Date of Work">1 June 2014</td>
                  <td data-title="Active">Active</td>
                  <td data-title="Timesheet">Timesheet</td>
                  <td data-title="">
                    <div class="dropdown">
                      <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-icons md-dark pmd-sm">more_vert</i>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>                          </div>
                    </div>
                   
                  </td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')

    <script>
      $(document).on('click', '.lihat_pdf', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-lihat');
        // console.log(id);

        $.ajax({
            url: "{{ url('/lihat_dokumen') }}/" + id,
            method: "GET",
            success:function(response) {
               var lihat =  $('#lihat_pendukung').html('<iframe src="/file/' +response.pendukung+'" width="950" height="690">Browser kamu tidak support</iframe>');
            }
        })
    });
    // $(document).on('click', '.keberatan_get', function(e) {
    //     e.preventDefault();
    //     var id = $(this).attr('id-kbrtn');
    //     // console.log(id);

    //     $.ajax({
    //         url: "{{ url('/proses_keberatan') }}/" + id,
    //         method: "GET",
    //         success:function(response) { 
    //           // console.log(tes);

    //         }
    //     })
    // });
   
    </script> 
    <script>
      @if ($message = Session::get('success'))
    toastr.success("{{ $message }}","Berhasil ", {
        timeOut:5e3,
        closeButton:!0,
        debug:!1,
        newestOnTop:!0,
        progressBar:!0,
        positionClass:"toast-top-right",
        preventDuplicates:!0,
        onclick:null,
        showDuration:"300",
        hideDuration:"1000",
        extendedTimeOut:"1000",
        showEasing:"swing",
        hideEasing:"linear",
        showMethod:"fadeIn",
        hideMethod:"fadeOut",
        tapToDismiss:!1
    });
    @endif
    @if ($message = Session::get('success_b'))
    toastr.success("{{ $message }}","Berhasil ", {
        timeOut:5e3,
        closeButton:!0,
        debug:!1,
        newestOnTop:!0,
        progressBar:!0,
        positionClass:"toast-top-right",
        preventDuplicates:!0,
        onclick:null,
        showDuration:"300",
        hideDuration:"1000",
        extendedTimeOut:"1000",
        showEasing:"swing",
        hideEasing:"linear",
        showMethod:"fadeIn",
        hideMethod:"fadeOut",
        tapToDismiss:!1
    });
    @endif
    @if ($message = Session::get('fail'))
    toastr.warning("{{ $message }}","Peringatan !", {
        timeOut:5e3,
        closeButton:!0,
        debug:!1,
        newestOnTop:!0,
        progressBar:!0,
        positionClass:"toast-top-right",
        preventDuplicates:!0,
        onclick:null,
        showDuration:"300",
        hideDuration:"1000",
        extendedTimeOut:"1000",
        showEasing:"swing",
        hideEasing:"linear",
        showMethod:"fadeIn",
        hideMethod:"fadeOut",
        tapToDismiss:!1
    });
    @endif
    @if ($message = Session::get('fail_b'))
    toastr.warning("{{ $message }}","Peringatan !", {
        timeOut:5e3,
        closeButton:!0,
        debug:!1,
        newestOnTop:!0,
        progressBar:!0,
        positionClass:"toast-top-right",
        preventDuplicates:!0,
        onclick:null,
        showDuration:"300",
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