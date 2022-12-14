@extends('layouts/v_template')
@section('title')
Portal Kerja
@endsection
@section('page')
<a href="{{url('perusahaan/pelamar')}}">Daftar Pelamar</a> / Pelamar Lulus
@endsection
@section('content')
<br>
<h3 style="margin-left:1em" ><b>Jadwal Wawancara</b></h3>
@if($errors->any())
<div class="alert alert-warning">
<h6>{{$errors->first()}}</h6>
</div>
@endif
<br>
<div style="width:95%;margin-left:2em" class="card">
  <div class="table-responsive">
  <table style="width:auto" class="table">
    <tr>
      <th style="width: 3%">No</th>
      <th style="width: 15%">Nama Pelamar</th>
      <th style="width: 20%">Posisi</th>
      <th style="width: 10%">Tanggal</th>
      <th style="width: 20%">Waktu</th>
      <th style="width: 15%">Jenis Wawancara</th>
      <th style="width: 15%">Aksi</th>
      <th style="width:5%">Status</th>
      @php
      $i = 0;
      @endphp
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
      @if($lamarans->jadwal == "++++")
       <span>Belum</span>
      @elseif(($lamarans->jadwal == null))
      <span>Belum</span>
      @else
      {{$data[0]}}
      @endif  
    </td>
    <td>
      @if($lamarans->jadwal == "++++")
         <span>Belum</span>
      @elseif($lamarans->jadwal == null)
         <span>Belum</span>
      @else
      {{$data[1]}} -  {{$data[2]}}
      @endif   
    </td>
    <td>
      <div class="col">
        @if($lamarans->tipewawancara <> null)
        <span>{{$lamarans->tipewawancara}}</span>
        @elseif(($lamarans->tipewawancara == null))
         <span>Belum</span>
        </select>
        @endif 
      </div>
    </td>

    <td>
     
      <a style="text-align: center" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$lamarans->id_lamaran}}"><i class="fa fa-edit">Atur Jadwal</i></a> 
    </td>
    <td>
      @if($lamarans->jadwal <> "++++" && $lamarans->linkwawancara <> null && $lamarans->tipewawancara <> null)
      <span class="badge badge-success">Lengkap </span>
      @elseif($lamarans->jadwal <> "++++" && $lamarans->alamatwawancara <> null && $lamarans->tipewawancara <> null)
      <span class="badge badge-success">Lengkap </span>
      @else 
      <span class="badge badge-danger" >Belum <br> Lengkap</span>
      @endif
    </td>
  </tr>
    @endforeach
  </table>
</div>
</div>

{{-- Detail Pelamar --}}
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
  </div>
</div>
@endforeach


{{-- Modal edit jadwal --}}
@foreach ($lamaran as $lamarans)                  
<div class="modal fade" id="edit{{$lamarans->id_lamaran}}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h6 class="modal-title">Detail Wawancara</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form action="{{route('wawancara.edit',$lamarans->id_lamaran)}}" method="POST" >
              @csrf
            <div class="mb-3" >
              <label for="namapel">Nama Pelamar</label>
              <input type="text" class="form-control" value="{{$lamarans->namapel}}" readonly>
            </div>
            <div class="mb-3" >
              <label for="namapel">Posisi</label>
              <input type="text" class="form-control" value="{{$lamarans->posisi}}" readonly>
            </div>
            <label for="tipewawancara">Tipe Wawancara</label>
            <select id="selectAModal{{$lamarans->id_lamaran}}" onclick="displayModal({{$lamarans->id_lamaran}})" name="tipewawancara" type="text" class="form-select @error('tipewawancara') is-invalid @enderror" data-bs-toggle="dropdown"> 
              <option @if($lamarans->tipewawancara=="Offline") selected @endif value="Offline">Offline</option>
              <option @if($lamarans->tipewawancara=="Online") selected @endif value="Online">Online</option>
              <script>
                function displayModal(id){
                  var x = document.getElementById('selectAModal'+id).value;
              
                  if(x=="Online"){
                    document.getElementById('onlineformModal'+id).style.display="block";
                    document.getElementById('offlineformModal'+id).style.display="none";
      
                  } else if(x=="Offline"){
                    document.getElementById('onlineformModal'+id).style.display="none";
                    document.getElementById('offlineformModal'+id).style.display="block";
      
                  }
               
                }
               
              </script>
    
              
            </select>
            <div></div>
            <div class="mb-3" style="display: none" id="onlineformModal{{$lamarans->id_lamaran}}">
              <label for="linkwawancara">Link Wawancara</label>
              <input type="text" class="form-control" name="linkwawancara" placeholder="Link Wawancara" value="{{$lamarans->linkwawancara}}">
            </div>
            <div  class="mb-3"  style="display: none"id="offlineformModal{{$lamarans->id_lamaran}}">
              <label for="alamatwawancara">Lokasi Wawancara</label>
              <input type="text" class="form-control" name="alamatwawancara" placeholder="Lokasi Wawancara " value="{{$lamarans->alamatwawancara}}">
            </div>
            <div  class="mb-3">
              <label for="alamatwawancara">Tanggal Wawancara</label>
              <input class="form-control" type="date" name="tanggal" @if ($lamarans->jadwal <> null)
              value="{{ $data[0] }}"
              @endif>
            </div>
          
            <div  class="mb-3">
              <label for="alamatwawancara">Waktu Wawancara</label>
              <div class="form-row">
                <div class="col">  
                  <input class="form-control" type="time" name="mulai" @if ($lamarans->jadwal <> null)
                  value="{{ $data[1] }}"
                  @endif>
                </div>
                <div class="col">
                  <input class="form-control" type="time" name="selesai" @if ($lamarans->jadwal <> null)
                  value="{{ $data[2] }}"
                  @endif > 
                </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">SAVE</button>
            </form>
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


