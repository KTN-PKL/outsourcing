@extends('layouts.v_templateregister')
 @section('content1')  
  
<br>
<br>
    <div class="container py-4">  
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('REGISTER PERUSAHAAN') }}</div>
                    <div class="card-body">
                      <form enctype="multipart/form-data" method="POST" action="{{ route('register.perusahaan') }}">
                        @csrf
                      <div class="mb-3">
                        <label for="name" class="form-label">Nama Perusahaan</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="formGroupExampleInput" placeholder="Masukkan Nama Lengkap">
                          @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                      <div class="row">
                        <div class="col">
                        <label for="industri" class="form-label">Industri</label>
                          <input name="industri"  type="text" class="form-control @error('industri') is-invalid @enderror" value="{{ old('industri') }}" placeholder="Industri" aria-label="industri">
                           @error('industri')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        <div class="col">
                          <label for="ukuran">Ukuran</label>
                          <select name="ukuran" type="text" class="form-control @error('ukuran') is-invalid @enderror" value="{{ old('ukuran') }}" placeholder="Ukuran" aria-label="ukuran">
                            <option selected disabled> -- Pilih Ukuran Perusahaan --</option>
                            <option value="Kecil">Kecil</option>
                            <option value="Menengah">Menengah</option>
                            <option value="Besar">Besar</option>
                          </select>
                            @error('ukuran')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                      <br>
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="formGroupExampleInput2" placeholder="Masukkan Email">
                        @error('email')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" id="formGroupExampleInput3" placeholder="Masukkan Password">
                        @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                        <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" id="formGroupExampleInput4" placeholder="Masukkan Password">
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    
                      <br>
                      <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input name="website" type="text" class="form-control @error('website') is-invalid @enderror" value="{{ old('website') }}" id="formGroupExampleInput5" placeholder="Masukkan website">
                        @error('website')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input name="deskripsi" type="textarea" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi') }}" id="formGroupExampleInput5" placeholder="Masukkan Deskripsi">
                        @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="prov">Provinsi</label>
                        <select name="prov" type="text" class="form-select @error('prov') is-invalid @enderror" value="{{ old('prov') }}" placeholder="prov" aria-label="prov" onchange="serahlu()" id="prov">
                          <option selected disabled>-- Pilih Provinsi --</option>
                          @foreach($Province as $provinces)
                          <option value="{{$provinces->id}}">{{$provinces->name}}</option>
                          @endforeach
                        </select>
                          @error('ukuran')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <div id="baca" class="mb-3">
                       
                      </div>
                      <div class="mb-3">
                        <label for="deskripsi" class="form-label">Alamat</label>
                        <input name="alamat" type="textarea" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" id="formGroupExampleInput6" placeholder="Masukkan Alamat">
                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <!-- Upload image input-->
                        <label class="form-label">Logo Perusahaan</label>
                            <input type="file" onchange="readURL(this);" class="form-control @error('logo') is-invalid @enderror" value="{{ old('logo') }}"  name="logo" placeholder="Logo ...">
                            @error('logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                       
                            <!-- Uploaded image area-->
                        <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                      </div>

                      <div class="row mb-0">
                        <div class="col-md-3 offset-md-10">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                      
                    </div>
                  </div>
            </div>
        </div>
      </div>
    </div>

  </form>
    <script>
     
    </script>

  @endsection 
    

     
    