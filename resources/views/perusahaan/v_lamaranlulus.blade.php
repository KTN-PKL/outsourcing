@extends('layouts/v_template')
@section('title')
Portal Kerja
@endsection
@section('page')
@endsection

@section('content')
<br>
<h3>PESERTA LULUS</h3>
<br>
<div style="width:1000px" class="card">
  <table style="width:1000px" class="table table-bordered table-hover">
    <tr>
      <th>No</th>
      <th>Nama Pelamar</th>
      <th>Umur</th>
      <th>Jenis Kelamin</th>
      <th>Posisi</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
    @foreach($lamaran as $lamarans)
    <tr>
    <td>1</td>
    <td>{{$lamarans->namapel}}</td>
    <td>{{$lamarans->umur}}</td>
    <td>{{$lamarans->gender}}</td>
    <td>{{$lamarans->posisi}}</td>
    <td>@if ($lamarans->status == "")
        Baru
    @else
        {{ $lamarans->status }}
    @endif</td>
    <td>
      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail{{$lamarans->id_lamaran}}">
      Detail
      </button>
    </td>
  </tr>
    @endforeach
  </table>

</div>
@endsection


@foreach ($lamaran as $lamarans)                  
<div class="modal fade" id="detail{{$lamarans->id_lamaran}}">
  <div class="modal-dialog modal-lg">
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
             <p>File Dokumen  : <a href="{{ route('perusahaan.lamaran.downloadcv', $lamarans->resume) }}" class="btn btn-priary">Download CV</a></p>

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