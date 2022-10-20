@extends('layouts.v_templateregister')
 @section('content1')  
  
<br>
<br>
    <div class="container py-4">  
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    <div class="card-body">
                      <form enctype="multipart/form-data" method="POST" action="{{ route('register.perusahaan') }}">
                        @csrf
                      <div class="mb-3">
                        <label for="name" class="form-label">Nama Perusahaan</label>
                        <input name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukkan Nama Lengkap">
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
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="formGroupExampleInput2" placeholder="Masukkan Email">
                      </div>
                      <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="formGroupExampleInput3" placeholder="Masukkan Password">
                      </div>
                      <div class="mb-3">
                        <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                        <input name="password_confirmation" type="password" class="form-control" id="formGroupExampleInput4" placeholder="Masukkan Password">
                      </div>
                    
                      <br>
                      <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input name="website" type="text" class="form-control" id="formGroupExampleInput5" placeholder="Masukkan website">
                      </div>
                      <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input name="deskripsi" type="textarea" class="form-control" id="formGroupExampleInput5" placeholder="Masukkan Deskripsi">
                      </div>
                      <div class="mb-3">
                        <label for="deskripsi" class="form-label">Alamat</label>
                        <input name="alamat" type="textarea" class="form-control" id="formGroupExampleInput6" placeholder="Masukkan Alamat">
                      </div>

                      <div class="mb-3">
                        <!-- Upload image input-->
                        <label class="form-label">Logo Perusahaan</label>
                            <input type="file" onchange="readURL(this);" class="form-control"  name="logo" placeholder="Logo ...">
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

  @endsection 
    

     
    