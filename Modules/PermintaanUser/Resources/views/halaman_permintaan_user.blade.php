@extends('permintaanuser::layouts.master')

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

  <div class="container d-flex justify-content-center flex-column w-75" style="margin-top: 50px">
    <div><h2 style="text-align: center">List Permintaan</h2></div>
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
            <th scope="col">List Keberatan</th>
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
            <td style="word-break: break-word">{{$user_minta->pendukung}}</td>
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
              <button
                class="btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect mb-4"
                type="button"
                style="background-color: #1474ae"
                data-bs-toggle="modal"
                data-bs-target="#keberatan"
              >
                <i class="material-icons pmd-sm">info</i>
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div class="container d-flex justify-content-center flex-column w-75" style="margin-top: 100px">
    <div><h2 style="text-align: center">List Keberatan</h2></div>
    <div class="text-start mb-3">
      <a href="{{route('tambah.keberatan')}}">
          <button type="button" class="btn rounded-pill" style="background-color:#1474ae ;">Tambah keberatan</button>
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
            <th scope="col">Nomor Pendaftaran</th>
            <th scope="col">Permintaan Informasi</th>
            <th scope="col">No. register Keberatan</th>
            <th scope="col">Tanggal Registrasi Keberatan</th>
            <th scope="col">Alasan Keberatan</th>
            <th scope="col">Alasan Keberatan Detail</th>
            <th scope="col">Tanggal Jatuh Tempo</th>
            <th scope="col">Status</th>
            <th scope="col">Dokumen Pendukung</th>
            <th scope="col">Tanggal Keberatan</th>
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
            <td style="word-break: break-word">{{$user_minta->pendukung}}</td>
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
              
            </td>
            <td>
             
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal -->
  <div
    class="modal overflow-auto fade"
    id="pemberitahuan"
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
