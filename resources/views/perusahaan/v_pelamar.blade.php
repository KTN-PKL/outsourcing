@extends('layouts/v_template')
@section('title')
Portal Kerja
@endsection
@section('page')
Daftar Pelamar
@endsection

@section('content')
{{-- <h2 style="margin-left:1em"><b>Daftar Pelamar</b><a href="{{ route('perusahaan.lamaran.datalulus') }}" class="btn btn-success  offset-md-7">Peserta Lulus</a></h2> --}}

<br>
<div style="width:auto;margin-left:2em;" class="card">
  <table style="width:auto;" class="table table-bordered table-hover">
    <tr>
      <th>No</th>
      <th width="150px">Nama Pelamar</th>
      <th>Umur</th>
      <th>Jenis Kelamin</th>
      <th>Posisi</th>
      <th>Status</th>
      <th style="text-align:center" >Action</th>
    </tr>
    @php
        $i = 0;
    @endphp
    @foreach($lamaran as $lamarans)
    <tr>
    @php
        $i = $i+1;
    @endphp
    <td>{{ $i }}</td>
    <td>{{$lamarans->namapel}}</td>
    <td>{{$lamarans->umur}}</td>
    <td>{{$lamarans->gender}}</td>
    <td>{{$lamarans->posisi}}</td>
    <td>@if ($lamarans->status == "")
      <span class="badge badge-primary">Baru</span>
    @elseif($lamarans->status == "Lulus")
    <span class="badge badge-success">{{ $lamarans->status }}</span>
    @elseif($lamarans->status == "Diterima")
    <span class="badge badge-success">{{ $lamarans->status }}</span>
    @else
    <span class="badge badge-danger">{{ $lamarans->status }}</span>
    @endif</td>
    <td> 
      @if($lamarans->status == "")
        <a style="text-align:center;"><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail{{$lamarans->id_lamaran}}">
        Detail
        </button></a>
        <a href="{{ route('lamaran.lulus', $lamarans->id_lamaran) }}" class="btn btn-sm btn-success">Lulus</a>   
        <a href="{{ route('lamaran.tidaklulus', $lamarans->id_lamaran) }}" class="btn btn-sm btn-danger">Tidak Lulus</a>
        @elseif($lamarans->status == "Lulus")
        <span class="badge badge-success">Pelamar sudah dinyatakan Lulus dokumen</span>
        @elseif($lamarans->status == "Diterima")
        <span class="badge badge-success">Pelamar sudah dinyatakan Diterima</span>
        @else
        <span class="badge badge-danger">Pelamar sudah dinyatakan Tidak Lulus</span>
      @endif
    </td>
  </tr>
    @endforeach

  </table>
  <table style="width: 100%;margin-left:auto;margin-right:auto">
    <tr>
      <td style="width: 40%"></td>
      <td> {{ $lamaran->links('vendor.pagination.bootstrap-4') }}</td>
      <td style="width: 40%"></td>
    </tr>
  </table>
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