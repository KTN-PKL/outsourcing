<style>
  a.disabled {
  pointer-events: none;
  cursor: default;
}
</style>
@extends('layouts/v_template')
@section('title')
Portal Kerja
@endsection
@section('page')
Daftar Perusahaan
@endsection
@section('content')
<h2 style="margin-left: 1em" ><b>Daftar Perusahaan</b></h2>
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
<div style="width:50%;margin-left:2em" class="card">
  <div class="table-responsive">
  <table style="width:auto" class="table">
    <tr>
      <th>No</th>
      <th>Nama Perusahaan</th>
      <th>Industri</th>
      <th>Status</th>
      <th style="width:30%">Action</th>
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
    <td><span class="badge badge-success">Sudah di verifikasi</span></td>      
    @else
    <td><span class="badge badge-danger">Belum di verifikasi</span></td>
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
  <table style="width: 100%;margin-left:auto;margin-right:auto">
    <tr>
      <td style="width: 40%"></td>
      <td> {{ $perusahaan->links('vendor.pagination.bootstrap-4') }}</td>
      <td style="width: 40%"></td>
    </tr>
  </table>
</div>
</div>


                  <!-- Modal Detail Perusahaan -->
                  @foreach ($perusahaan as $perusahaans)                  
                  <div class="modal fade" id="detail{{$perusahaans->id_perusahaan}}">
                    <div class="modal-dialog" style="width:auto">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title">{{$perusahaans->nama}}</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              @if($perusahaans->fotodepan <> null)
                              <div style="position:relative" class="col-md-4 offset-3"><h4><span class="badge badge-success">Foto Sisi Depan Kantor</span></h4>
                              </div> 
                              <center>
                                <img src="{{asset('/verifikasi/fotokantor/fotodepan/'.$perusahaans->fotodepan)}}" style="display:block" width="150px" height="150px"  alt="...">
                              <a style="position: absolute; top:100px;left:200px" href="{{asset('verifikasi/fotokantor/fotodepan/'.$perusahaans->fotodepan)}}" download> <button type="button" class="btn btn-outline-secondary">Download</button></a>
                              </center>
                              <div class="row">
                                @if($perusahaans->fotokiri<>null)
                                <div style="position: relative"  class="col-md-6"><h4><span class="badge badge-success" style="display: flex">Foto Sisi Kiri Kantor</span></h4>
                                  <center>
                                  <img src="{{asset('verifikasi/fotokantor/fotokiri/'.$perusahaans->fotokiri)}}" style="display:block;margin:auto" width="150px" height="150px" alt="...">
                                  <a style="position: absolute; top:100px;left:70px" href="{{asset('verifikasi/fotokantor/fotokiri/'.$perusahaans->fotokiri)}}" download> <button type="button" class="btn btn-outline-secondary">Download</button></a>
                                </div>
                                @else
                                <div style="position: relative"  class="col-md-6"><h4><span class="badge badge-success" style="display: flex">Foto Sisi Kiri Kantor</span></h4>
                                  <center>
                                  <i class="fa fa-image fa-9x"></i>
                                  <br>
                                  <small>Tidak Ada Gambar</small>
                                </div>
                                @endif

                                @if($perusahaans->fotokanan<>null)
                                <div style="position: relative;" class="col-md-6"><h4><span class="badge badge-success" style="display: flex" >Foto Sisi Kanan Kantor</span></h4>
                                  <center>
                                  <img src="{{asset('verifikasi/fotokantor/fotokanan/'.$perusahaans->fotokanan)}}"  style="display:block;margin:auto" width="150px" height="200px" alt="...">
                                  <a style="position: absolute; top:100px;left:70px" href="{{asset('verifikasi/fotokantor/fotokanan/'.$perusahaans->fotokanan)}}" download> <button type="button" class="btn btn-outline-secondary">Download</button></a>
                                </div>
                                @else
                                <div style="position: relative"  class="col-md-6"><h4><span class="badge badge-success" style="display: flex">Foto Sisi Kanan Kantor</span></h4>
                                  <center>
                                  <i style="display: block" class="fa fa-image fa-9x"></i>
                                  <small>Tidak Ada Gambar</small>
                                </div>
                                @endif

                                @if($perusahaans->fotobelakang<>null)
                                <div style="position: relative" class="col-md-6"><h4><span class="badge badge-success">Foto Sisi Belakang Kantor</span></h4>
                                  <center>
                                  <img src="{{asset('verifikasi/fotokantor/fotobelakang/'.$perusahaans->fotobelakang)}}" width="150px" height="150px" alt="...">
                                  <a style="position: absolute; top:100px;left:70px" href="{{asset('verifikasi/fotokantor/fotobelakang/'.$perusahaans->fotobelakang)}}" download> <button type="button" class="btn btn-outline-secondary">Download</button></a>
                                </div>
                                @else
                                <div style="position: relative"  class="col-md-6"><h4><span class="badge badge-success" style="display: flex">Foto Sisi Belakang Kantor</span></h4>
                                  <center>
                                  <i style="display: block" class="fa fa-image fa-9x"></i>
                                  <small>Tidak Ada Gambar</small>
                                </div>
                                @endif

                                @if($perusahaans->fotodalam<>null)
                                <div style="position: relative" class="col-md-6"><h4><span class="badge badge-success">Foto Sisi Dalam Kantor</span></h4>
                                 <center> 
                                  <img src="{{asset('verifikasi/fotokantor/fotodalam/'.$perusahaans->fotodalam)}}" width="150px" height="150px" alt="...">
                                  <a style="position: absolute; top:100px;left:70px" href="{{asset('verifikasi/fotokantor/fotodalam/'.$perusahaans->fotodalam)}}" download> <button type="button" class="btn btn-outline-secondary">Download</button></a>
                                </div>
                                @else
                                <div style="position: relative"  class="col-md-6"><h4><span class="badge badge-success" style="display: flex">Foto Sisi Dalam Kantor</span></h4>
                                  <center>
                                  <i style="display: block" class="fa fa-image fa-9x"></i>
                                  <small>Tidak Ada Gambar</small>
                                </div>
                                @endif
                              </div>
                            </div>
                            <div class="modal-body"> 
                              <table>
                                <tr>
                                  <td style="width: 100px"><b>NPWP</b></td>
                                  <td>: {{$perusahaans->npwp}}</td>
                                </tr>
                              </table>
                             
                             <div class="row">
                              <p>File Dokumen  :
                                <div class="col-md-4">
                                    <a href="/admin/perusahaan/downloadnib/{{$perusahaans->nib}}" class="btn btn-primary"><i class="fa fa-cloud-download-alt" ></i> Download NIB</a> 
                                </div>
                                <div class="col-md-4">
                                  <a href="/admin/perusahaan/downloadktp/{{$perusahaans->ktp}}" class="btn btn-primary"><i class="fa fa-cloud-download-alt" ></i> Download KTP</a>
                                </div>
                                
                                <div class="col-md-4">
                                  @if($perusahaans->pkp<>null)
                                  <a href="/admin/perusahaan/downloadpkp/{{$perusahaans->pkp}}" class="btn btn-primary"> <i class="fa fa-cloud-download-alt" > </i> Download PKP</a></p>
                                  @else
                                  <a href="/admin/perusahaan/downloadpkp/{{$perusahaans->pkp}}" class="btn btn-primary disabled"> <i class="fa fa-cloud-download-alt" > </i> Download PKP</a></p>
                                  @endif
                                </div>
                            </div>
                           
                            <div class="modal-footer">
                              @if($perusahaans->status == 0)
                                <a href="{{ route('admin.perusahaan.verifikasi', $perusahaans->id) }}" class="btn btn-outline-success float-left">Verifikasi</a>
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal Verifikasi</button>
                                @else 
                                <span class="badge badge-success">Perusahaan sudah diverifikasi</span>
                              @endif
                                
                            </div>
                            @else 
                            <h5>Perusahaan Belum Mengirim Dokumen Verifikasi</h5>
                           @endif
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
                              <span class="text-danger" id="nameError"></span>
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
                              <input name="password" type="password" class="form-control" pattern="(?=.*\d)(?=.).{8,}" id="formGroupExampleInput3" placeholder="Masukkan Password" >
                              <p id="invalid-passowrd" style="display:none;color:red">Panjang password minimal 8 kareter, dan harus mengandung huruf kapital, angka, dan simbol</p>
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
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
                              <input type="text" class="form-control" name="name" placeholder="Masukan Nama Perusahaan" value="{{$perusahaans->name}}" >
    
                            </div>
                            <div class="row">
                              <div class="col">
                              <label for="industri" class="form-label">Industri</label>
                                <input name="industri"  type="text" class="form-control" placeholder="Industri" aria-label="industri" value="{{$perusahaans->industri}}">
                              </div>
                              <div class="col">
                                <label for="ukuran">Ukuran</label>
                                <select name="ukuran" type="text" class="form-select" placeholder="Ukuran" aria-label="ukuran">
                                  <option selected disabled> -- Pilih Ukuran Perusahaan --</option>
                                  @if($perusahaans->ukuran == "Kecil")
                                  <option value="Kecil" selected>Kecil</option>
                                  <option value="Menengah">Menengah</option>
                                  <option value="Besar">Besar</option>
                                  @elseif($perusahaans->ukuran == "Menengah")
                                  <option value="Kecil" >Kecil</option>
                                  <option value="Menengah" selected>Menengah</option>
                                  <option value="Besar">Besar</option>
                                  @else
                                  <option value="Kecil" >Kecil</option>
                                  <option value="Menengah">Menengah</option>
                                  <option value="Besar" selected>Besar</option>
                                  @endif
                                </select>
                                  @error('ukuran')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Email</label>
                              <input type="text" class="form-control" name="email" placeholder="Masukan Email" value="{{$perusahaans->email}}" readonly>
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
                              <input type="test" class="form-control" name="alamat" placeholder="Masukan Alamat" value="{{$perusahaans->alamat}}">
                          </div>
                            <div class="mb-3">
                              <label class="form-label">Ganti Password Baru</label>
                              <input type="password" class="form-control" name="password" placeholder="Masukan Password Baru" >
                            </div>
                          <div>
                                <div class="row">
                                  <div class="col-md-6">
                                        <!-- Upload image input-->
                                        <label class="form-label">Logo</label>    
                                        <input type="file" onchange="readURL{{ $perusahaans->id_perusahaan }}(this);" class="form-control"  name="logo" placeholder="Logo ...">
                                  </div>
                                  <div class="col-md-6">     
                                        <!-- Uploaded image area-->
                                        <div class="image-area mt-4"><img style="height:50px" id="imageResult{{ $perusahaans->id_perusahaan }}" src="{{asset('/logo/'. $perusahaans->logo)}}" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                                  </div> 
                                </div>
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


@endsection