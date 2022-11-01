@extends('layouts/v_template')
@section('title')
Portal Kerja
@endsection
@section('page')
<a href="{{url('perusahaan/pelamar')}}">Daftar Pelamar</a> / Pelamar Lulus
@endsection
@section('content')
<br>
<h3 style="margin-left:1em" ><b>Jdawal Wawancara</b></h3>
<br>
<div style="width:1000px;margin-left:2em" class="card">
  <table style="width:1000px" class="table table-bordered table-hover">
    <tr>
      <th style="width: 4%">No</th>
      <th style="width: 28%">Nama Pelamar</th>
      <th style="width: 28%">Posisi</th>
      <th style="width: 20%">Tanggal</th>
      <th style="width: 20%">Waktu</th>
      @php
      $i = 0;
      @endphp
       <form method="POST" action="{{ route('wawancara.simpan',$id) }}">
        @csrf
    @foreach($lamaran as $lamarans)
    <tr>
      @php
      $i = $i+1;
      $data = explode("++", $lamarans->jadwal);
      @endphp
    <td>{{ $i }}</td>
    <td>{{$lamarans->namapel}}</td>
    <td>{{$lamarans->posisi}}</td>
    <td>
        <input type="date" name="tanggal{{ $lamarans->id_lamaran }}" @if ($lamarans->jadwal <> null)
        value="{{ $data[0] }}"
        @endif >
    </td>
    <td>
        <input type="time" name="mulai{{ $lamarans->id_lamaran }}" @if ($lamarans->jadwal <> null)
        value="{{ $data[1] }}"
        @endif> - <input type="time" name="selesai{{ $lamarans->id_lamaran }}" @if ($lamarans->jadwal <> null)
        value="{{ $data[2] }}"
        @endif>
    </td>
  </tr>
    @endforeach
  </table>
  <div class="card-footer"><button class="btn btn-sm btn-success col-md-2 offset-md-10">Simpan</button></div>
</form>
</div>
@endsection


@foreach ($lamaran as $lamarans)                  
<div class="modal fade" id="detail{{$lamarans->id_lamaran}}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h6 class="modal-title">Detail Pelamar</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
             <p>Nama          : {{ $lamarans->namapel }}</p>
             <p>Alamat        : {{ $lamarans->alamatpel }}</p>
             <p>Jenis Kelamin : {{ $lamarans->gender }}</p>
             <p>No Telepon    : {{ $lamarans->no_telp }}</p>
             
             <p>File Dokumen  : <a href="{{ route('perusahaan.lamaran.downloadcv', $lamarans->resume) }}" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cloud-arrow-down" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M7.646 10.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 9.293V5.5a.5.5 0 0 0-1 0v3.793L6.354 8.146a.5.5 0 1 0-.708.708l2 2z"/>
              <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
            </svg>  Download CV</a></p>

          </div>
          <div class="modal-footer">
              <a href="#" class="btn btn-outline-light pull-left">Yes</a>
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
          </div>
      </div>
      <!-- /.modal-content -->
  </div>
</div>
@endforeach