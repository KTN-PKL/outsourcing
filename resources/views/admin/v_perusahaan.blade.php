@extends('layouts/v_template')
@section('title')
Portal Kerja
@endsection
@section('page')
Daftar Perusahaan
@endsection
@section('content')
<h2 style="margin-left: 1em" ><b>Daftar Perusahaan</h2>
<br>
@if (session()->has('verified'))
<div class="alert alert-success alert-block" id="alert">
  <button type="button" class="close" data-dismiss="alert">x</button>
      <strong>{{session()->get('verified')}}</strong>
</div>
  @endif
<button style="margin-left: 2em" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
  <i class="fa fa-plus"></i>  Tambah Perusahaan
</button>
<br>
<br>
<div style="width:700px;margin-left:2em" class="card">
  <table style="width:700px" class="table table-bordered table-hover">
    <tr>
      <th style="width:50px">No</th>
      <th>Nama Perusahaan</th>
      <th>Industri</th>
      <th>Status</th>
      <th style="width:200px">Action</th>
    </tr>
    @php
        $i=0;
    @endphp
    @foreach($perusahaan as $perusahaans)
    @php
        $i=$i+1;
    @endphp
    <tr>
    <td>{{$i}}</td>
    <td>{{$perusahaans->nama}}</td>
    <td>{{$perusahaans->industri}}</td>
    @if ($perusahaans->status == 1)
    <td>Verified</td>      
    @else
    <td>Not Verified</td>
    @endif
    
    <td>
      <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail{{$perusahaans->id_perusahaan}}">
        Detail
      </button>
      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit{{$perusahaans->id_perusahaan}}">
        Edit
      </button>
      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$perusahaans->id_perusahaan}}">
        Delete
      </button>
    </td>
  </tr>
@endforeach
  </table>

</div>

@endsection
                  <!-- Modal Detail Perusahaan -->
                  @foreach ($perusahaan as $perusahaans)                  
                  <div class="modal fade" id="detail{{$perusahaans->id_perusahaan}}">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title">{{$perusahaans->nama}}</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('admin.perusahaan.verifikasi', $perusahaans->id) }}" class="btn btn-outline-success float-left">Verifikasi</a>
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal Verifikasi</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                  </div>
                  @endforeach

                  {{-- Modal Tambah Perusahaan --}}
                  <div class="modal fade" id="tambah">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <div>
                            <h4 class="modal-title" id="exampleModalLabel"><b>Tambah Perusahaan</b></h4>
                          </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                          </div>
                          <form enctype="multipart/form-data" method="POST" action="{{ route('admin.perusahaan.store') }}">
                            @csrf
                          <div class="modal-body">
                            <div id="alert"></div>
                            <div class="mb-3">
                              <label class="form-label">Nama Perusahaan</label>
                              <input type="text" class="form-control" name="name" placeholder="Masukan Nama Perusahaan">
                            </div>
                            <div class="row">
                              <div class="col">
                              <label for="industri" class="form-label">Industri</label>
                                <input name="industri"  type="text" class="form-control" placeholder="Industri" aria-label="industri">
                              </div>
                              <div class="col">
                                <label for="ukuran" class="form-label">Ukuran</label>
                                <input name="ukuran" type="text" class="form-control" placeholder="Ukuran" aria-label="ukuran">
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Email</label>
                              <input type="text" class="form-control" name="email" placeholder="Masukan Email">
                            </div>
                            <div class="mb-3">
                              <label for="password" class="form-label">Password</label>
                              <input name="password" type="password" class="form-control" id="formGroupExampleInput3" placeholder="Masukkan Password">
                            </div>
                            <div class="mb-3">
                              <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                              <input name="password_confirmation" type="password" class="form-control" id="formGroupExampleInput4" placeholder="Masukkan Password">
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Website</label>
                              <input name="website" type="text" class="form-control" placeholder="Masukkan Website">
                            </div>
                            <div class="row mb-3">                       
                              <label class="form-label">Deskripsi</label>
                              <div class="col-md-16">
                               <textarea name="deskripsi" class="my-editor form-control" id="my-editor" cols="30" rows="10"></textarea>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Alamat</label>
                              <input type="test" class="form-control" name="alamat" placeholder="Masukan Alamat">
                          </div>
                          <div class="mb-3">
                                  <!-- Upload image input-->
                                  <label class="form-label">Logo</label>
                                      <input type="file" onchange="readURL(this);" class="form-control"  name="logo" placeholder="Logo ...">
                                  <!-- Uploaded image area-->
                                  <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>                            
                          </div>
                          </div>
                          <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                            <div id="tombol_login">
                              <input class="btn btn-primary" type="submit" value="Tambah">
                            </div>
                          </div>
                        </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                  </div>
                  @foreach ($perusahaan as $perusahaans)   
                  <div class="modal fade" id="edit{{$perusahaans->id_perusahaan}}">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Perusahaan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                          </div>
                          <form enctype="multipart/form-data" method="POST" action="{{ route('admin.perusahaan.update', $perusahaans->id_perusahaan) }}">
                            @csrf
                          <div class="modal-body">
                            <div id="alert"></div>
                            <div class="mb-3">
                              <label class="form-label">Nama Perusahaan</label>
                              <input type="text" class="form-control" name="name" placeholder="Masukan Nama Perusahaan" value="{{$perusahaans->name}}">
                            </div>
                            <div class="row">
                              <div class="col">
                              <label for="industri" class="form-label">Industri</label>
                                <input name="industri"  type="text" class="form-control" placeholder="Industri" aria-label="industri" value="{{$perusahaans->industri}}">
                              </div>
                              <div class="col">
                                <label for="ukuran" class="form-label">Ukuran</label>
                                <input name="ukuran" type="text" class="form-control" placeholder="Ukuran" aria-label="ukuran" value="{{$perusahaans->ukuran}}">
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Email</label>
                              <input type="text" class="form-control" name="email" placeholder="Masukan Email" value="{{$perusahaans->email}}">
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Website</label>
                              <input name="website" type="text" class="form-control" placeholder="Masukkan Website" value="{{$perusahaans->website}}">
                            </div>
                            <div class="row mb-3">                       
                              <label class="form-label">Deskripsi</label>
                              <div class="col-md-16">
                               <textarea name="deskripsi" class="my-editor form-control" id="my-editor{{$perusahaans->id_perusahaan}}" cols="30" rows="10">{{$perusahaans->deskripsi}}</textarea>
                              </div>
                              
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Alamat</label>
                              <input type="test" class="form-control" name="alamat" placeholder="Masukan Alamat" value="{{$perusahaans->email}}" readonly>
                          </div>
                          <div class="mb-3">
                                  <!-- Upload image input-->
                                  <label class="form-label">Logo</label>
                                      <input type="file" onchange="readURL{{ $perusahaans->id_perusahaan }}(this);" class="form-control"  name="logo" placeholder="Logo ...">
                                  <!-- Uploaded image area-->
                                  <div class="image-area mt-4"><img id="imageResult{{ $perusahaans->id_perusahaan }}" src="{{asset('/logo/'. $perusahaans->logo)}}" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                      
                             
                          </div>
                          </div>
                          <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                            <div id="tombol_login">
                              <input class="btn btn-primary" type="submit" value="Edit">
                            </div>
                          </div>
                        </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                  </div>

                  @endforeach

                  @foreach ($perusahaan as $perusahaans)                  
                  <div class="modal fade" id="delete{{$perusahaans->id_perusahaan}}">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content bg-danger">
                            <div class="modal-header">
                                <h6 class="modal-title">{{$perusahaans->nama}}</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda Ingin Mengahpus Perusahaan yang Bernama <b>{{$perusahaans->nama}} ?</b>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('admin.perusahaan.destoy', $perusahaans->id) }}" class="btn btn-outline-light pull-left">Yes</a>
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                  </div>
                  @endforeach




<script>
  function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#imageResult')
              .attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
  }
}



$(function () {
  $('#upload').on('change', function () {
      readURL(input);
  });
});

</script>
@foreach ($perusahaan as $perusahaans)
<script>
  function readURL{{ $perusahaans->id_perusahaan }}(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#imageResult{{ $perusahaans->id_perusahaan }}')
              .attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
  }
}



$(function () {
  $('#upload').on('change', function () {
      readURL(input);
  });
});

</script>
@endforeach

  
@push('scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<script>
  CKEDITOR.replace('my-editor');
</script>

@foreach ($perusahaan as $perusahaans)
<script>
  CKEDITOR.replace('my-editor{{ $perusahaans->id_perusahaan }}');
</script>
@endforeach
@endpush
