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
@if ($kebrtan->count() == 0)
                
                <div class="container d-flex justify-content-center flex-column w-90" style="margin-top: 40px; margin-bottom:100px; background-color:#ffffff;">
                  <div><h2 style="text-align: center">List Keberatan</h2></div>
                  <div class="text-start mb-3">
                    {{-- <a href="{{route('tambah.keberatan')}}">
                        <button type="button" class="btn rounded-pill" style="background-color:#1474ae ;">Tambah keberatan</button>
                    </a> --}}
                    <a href="{{route('user.minta')}}">
                        <button type="button" class="btn rounded-pill" style="background-color:#1474ae ;">Kembali</button>
                    </a>
                 </div>
                  <div class="overflow-auto row d-flex">
                    <table class="table" id="myTable2">
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

                      </tbody>
                    </table>
                  </div>
                </div>   
@else

<div class="container d-flex justify-content-center flex-column w-90" style="margin-top: 40px; margin-bottom:100px; background-color:#ffffff">
    <div><h2 style="text-align: center">List Keberatan</h2></div>
    <div class="text-start mb-3">
      {{-- <a href="{{route('tambah.keberatan')}}">
          <button type="button" class="btn rounded-pill" style="background-color:#1474ae ;">Tambah keberatan</button>
      </a> --}}
      <a href="{{route('user.minta')}}">
        <button type="button" class="btn rounded-pill" style="background-color:#1474ae ;">Kembali</button>
    </a>
   </div>
    <div class="overflow-auto row d-flex">
      
      <table class="table" id="myTable2">
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
          @php
             \Carbon\Carbon::setLocale('id'); 
          @endphp
          <tr>
            
            @foreach ($kebrtan as $kbrtan)
            <td>{{\Carbon\Carbon::parse($kbrtan->created_at)->translatedFormat('d F Y')}}</td>
            <td>-</td>
            <td>
              @php
              $isi = \Modules\PermintaanUser\Entities\Permintaan::select('permintaan_users.*')->where('id', $kbrtan->id_permintaan)->first();
              @endphp
              {{$isi->isi}}
            </td>
            <td>{{$kbrtan->noreg_keberatan}}</td>
            <td>-</td>
            <td> 
              @php
              $alasan = \Modules\Keberatan\Entities\AlasanKeberatan::select('alasan_keberatan.*')->where('id', $kbrtan->alasan)->first();
              @endphp
              {{$alasan->alasan_keberatan}}
          </td>
            <td>{{$kbrtan->detail_alasan}}</td>
            @if (!$kbrtan->jatuh_tempo)
            <td>-</td>
            @else
            <td>{{\Carbon\Carbon::parse($kbrtan->jatuh_tempo)->translatedFormat('d F Y')}}</td>
            @endif
            @if ($kbrtan->status == 0)
              <td>Diajukan</td>
              @elseif ($kbrtan->status == 1)
              <td>Diproses</td>
              @elseif ($kbrtan->status == 2)
              <td>Ditolak</td>
              @elseif ($kbrtan->status == 3)
              <td>Selesai</td>
              @elseif ($kbrtan->status == 4)
              <td>Keberatan</td>
              @else
              <td>batal</td>  
            @endif
            <td><button
              class="btn mb-4 lihat_pdf"
              type="button"
              style="background-color: #ff0505; border-radius:50%; text-transform:capitalize"
              data-bs-toggle="modal"
              data-bs-target="#pdf_view" data-lihat="{{$kbrtan->id}}">Lihat
            </button></td>

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
          Dokumen Pendukung Keberatan
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
      </div>

    </div>
  </div>
</div>
@endif
@endsection
@section('script')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function () {
        $("#myTable2").DataTable({
          pageLength: 3,
          lengthMenu: [10,25,30],
          "bDestroy": true,
        });
      });
      $(document).on('click', '.lihat_pdf', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-lihat');
        // console.log(id);

        $.ajax({
            url: "{{ url('/lihat_dokumen_keberatan') }}/" + id,
            method: "GET",
            success:function(response) {
               var lihat =  $('#lihat_pendukung').html('<iframe src="/file/' +response.pendukung+'" width="950" height="690">Browser kamu tidak support</iframe>');
            }
        })
    });
</script>
@endsection