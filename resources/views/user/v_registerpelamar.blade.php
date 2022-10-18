@extends('layouts.v_templateregister')
 @section('content2')  


<br>
<br>
    <div class="container py-4">  
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('REGISTER PELAMAR') }}</div>
                    <div class="card-body">
                      <form enctype="multipart/form-data" method="POST" action="{{ route('register.pelamar') }}">
                        @csrf
                      <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukkan Nama Lengkap">
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
                      <div class="row">
                        <div class="col">
                        <label for="umur" class="form-label">Umur</label>
                          <input name="umur"  type="text" class="form-control" placeholder="Umur" aria-label="umur">
                        </div>
                        <div class="col">
                          <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                          <input name="gender" type="text" class="form-control" placeholder="Jenis Kelamin" aria-label="jeniskelamin">
                        </div>
                      </div>
                      <br>
                      <div class="mb-3">
                        <label for="ttl" class="form-label">TTL</label>
                        <input name="ttl" type="text" class="form-control" id="formGroupExampleInput5" placeholder="Masukkan Tempat Tanggal Lahir">
                      </div>
                      <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input name="alamatpel" type="text" class="form-control" id="formGroupExampleInput6" placeholder="Masukkan Alamat">
                      </div>
                      <div class="mb-3">
                        <!-- Upload image input-->
                        <label class="form-label">Foto Profil</label>
                            <input type="file" onchange="readURL(this);" class="form-control"  name="foto" placeholder="Logo ...">
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