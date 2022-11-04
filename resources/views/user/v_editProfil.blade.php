@extends('layouts.v_templateregister')
<link rel="stylesheet" href="{{asset('template3')}}/css/profile.css" />
@section('content1') 
<br>
<br>
<div class="container">
    <div class="row gutters">
    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
    <div class="card h-100">
        <div class="card-body">
            <div class="account-settings">
                <div class="user-profile">
                    <div class="user-avatar">
                        <img src="{{asset('/foto/'. $pelamar->foto)}}" alt="foto">
                    </div>
                    <h5 class="user-name">{{$pelamar->name}}</h5>
                    {{-- <h6 class="user-email">{{$pelamar->email}}</h6> --}}
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
    <div class="card h-100">
        <form enctype="multipart/form-data" method="POST" action="{{ route('profil.edit')}}">
            @csrf
        <div class="card-body">
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h4 class="mb-2 text-primary">Edit Profil</h4>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="fullName">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" value="{{$pelamar->name}}" placeholder="Masukkan Nama">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="umur">Umur</label>
                        <input type="text" class="form-control" id="umur" name="umur" value="{{$pelamar->umur}}" placeholder="Masukkan Umur">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <select name="gender" type="text" class="form-control @error('gender') is-invalid @enderror" data-bs-toggle="dropdown" placeholder="Jenis Kelamin" value="{{ old('gender') }}"  aria-label="jeniskelamin" > 
                            <option selected disabled >--Pilih Jenis Kelamin--</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                          </select>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="Street">Tempat Tanggal Lahir</label>
                        <input type="text" class="form-control" id="ttl" name="ttl" value="{{$pelamar->ttl}}" placeholder="Masukkan Tempat Tanggal Lahir">
                    </div>
                </div>
            </div>
            <div class="row gutters">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="ciTy">Alamat</label>
                        <input type="name" class="form-control" id="alamatpel" name="alamatpel" value="{{$pelamar->alamatpel}}" placeholder="Masukkan Alamat">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <!-- Upload image input-->
                <label class="form-label">Ganti Foto Profil</label>
                    <input type="file" onchange="readURL(this);" class="form-control" value="{{$pelamar->foto}}"  name="foto" placeholder="Foto ...">
                <!-- Uploaded image area-->
                <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>                            
        </div>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="text-right">
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    </div>
    </div>
    </div>









@endsection