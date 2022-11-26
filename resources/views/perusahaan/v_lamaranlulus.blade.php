@extends('layouts/v_template')
@section('title')
Portal Kerja
@endsection
@section('page')
<a href="{{url('perusahaan/pelamar')}}">Daftar Pelamar</a> / Pelamar Lulus
@endsection
@section('content')
<br>
<h3 style="margin-left:1em" ><b>Peserta Lulus</b></h3>
<br>
<div style="width:95%;margin-left:2em" class="card">
  <table style="width:100%" class="table table-bordered table-hover">
    <tr>
      <th>No</th>
      <th>Nama Pelamar</th>
      <th>Umur</th>
      <th >Jenis Kelamin</th>
      <th>Posisi</th>
      <th>Status</th>
      <th>Action</th>
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
    <td>{{$lamarans->umur}} Tahun</td>
    <td>{{$lamarans->gender}}</td>
    <td>{{$lamarans->posisi}}</td>
    <td>@if ($lamarans->status == "")
        Baru
    @else
    <span class="badge badge-success">{{$lamarans->status}}</span>
    @endif</td>
    <td>
      @if($lamarans->status == "Lulus")
      <a href="{{ route('lamaran.terima', $lamarans->id_lamaran) }}" class="btn btn-sm btn-success">Terima</a>   
      <a href="{{ route('lamaran.tidaklulus', $lamarans->id_lamaran) }}" class="btn btn-sm btn-danger">Tidak Lulus</a>
      <a><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail{{$lamarans->id_lamaran}}">
      Detail
      </button></a>
      @else
      <span class="badge badge-success">Pelamar sudah diterima</span>
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
            <div id="pembungkus" style="position: relative" class="col-md-4 offset-3">
              <img src="{{asset('/foto/'.$lamarans->foto)}}" alt="">
              <a style="position: absolute; top:100px;left:70px" href="{{asset('/foto/'.$lamarans->foto)}}" download> <button type="button" class="btn btn-outline-secondary">Download</button></a>
            </div>
            <table>
              <tr>
                <td style="width:50%">Nama</td>
                <td>: {{$lamarans->namapel}}</td>
              </tr>
              <tr>
                <td style="width:50%">Alamat</td>
                <td>: {{$lamarans->alamatpel}}</td>
              </tr>
              <tr>
                <td style="width:50%">Gender</td>
                <td>: {{$lamarans->alamatpel}}</td>
              </tr>
              {{-- <tr>
                <td style="width:50%">Email</td>
                <td>: {{$lamarans->email}}</td>
              </tr> --}}
              <tr>
                <td style="width:50%">Nomor Telepon</td>
                <td>: {{$lamarans->no_telp}}</td>
              </tr>
              <tr>
                <td style="width:50%;height:50%">File Dokumen</td>
                <td>: <a href="{{ route('perusahaan.lamaran.downloadcv', $lamarans->resume) }}" class="btn btn-primary"> <i class="fa fa-cloud-download-alt"></i> Download CV</a></td>
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

{{-- @foreach ($lamaran as $lamarans)                  
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
@endforeach --}}