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
<div style="width:75%;margin-left:2em;" class="card">
  <div class="table-responsive">
  <table style="width:auto;" class="table">
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
    <span class="badge badge-warning">{{ $lamarans->status }}</span>
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
</div> 
  <table style="width: 100%;margin-left:auto;margin-right:auto">
    <tr>
      <td style="width: 40%"></td>
      <td> {{ $lamaran->links('vendor.pagination.bootstrap-4') }}</td>
      <td style="width: 40%"></td>
    </tr>
  </table>
</div>


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
            <center>
            <div id="pembungkus" style="position: relative">
              <a id="download" style="position: absolute;" href="{{asset('foto/'.$lamarans->foto)}}" download> <button type="button" class="btn btn-outline-secondary"><i class="fa fa-download"></i></button></a>
              <img class="img-thumbnail" src="{{asset('/foto/'.$lamarans->foto)}}" width="50%" alt="">
             
            </div>
            </center>
            <table>
              <tr>
                <td style="width:30%">Nama</td>
                <td>:</td>
                <td>{{$lamarans->namapel}}</td>
              </tr>
              <tr>
                <td style="width:30%;align-top">Alamat</td>
                <td>:</td>
                <td>{{$lamarans->alamatpel}}</td>
              </tr>
              <tr>
                <td style="width:30%">Gender</td>
                <td>:</td>
                <td>{{$lamarans->gender}}</td>
              </tr>
              <tr>
                <td style="width:30%">Email</td>
                <td>:</td>
                <td>{{$lamarans->email}}</td>
              </tr>
              <tr>
                <td style="width:30%">Nomor Telepon</td>
                <td>:</td>
                <td>{{$lamarans->no_telp}}</td>
              </tr>
              <tr>
                <td style="width:30%;height:50%">File Dokumen</td>
                <td>:</td>
                <td><a href="{{ route('perusahaan.lamaran.downloadcv', $lamarans->resume) }}" class="btn btn-primary"> <i class="fa fa-cloud-download-alt"></i> Download CV</a></td>
              </tr>
          </table>
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
@endsection

