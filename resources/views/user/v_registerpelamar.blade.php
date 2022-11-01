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
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukkan Nama Lengkap">
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"  id="email" placeholder="Masukkan Email">
                          @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="formGroupExampleInput3" placeholder="Masukkan Password">
                          @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                        <input name="password_confirmation" type="password" class="form-control" id="formGroupExampleInput4" placeholder="Masukkan Password">
                      </div>
                      <div class="row">
                        <div class="col">
                        <label for="umur" class="form-label">Umur</label>
                          <input name="umur"  type="text" class="form-control @error('umur') is-invalid @enderror" value="{{ old('umur') }}"  placeholder="Umur" aria-label="umur">
                          @error('umur')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        <div class="col">
                          {{-- <label for="jeniskelamin" class="form-label">Jenis Kelamin</label> --}}
                          <label for="gender">Jenis Kelamin</label>
                          <select name="gender" type="text" class="form-control @error('gender') is-invalid @enderror" data-bs-toggle="dropdown" placeholder="Jenis Kelamin" value="{{ old('gender') }}"  aria-label="jeniskelamin" > 
                            <option selected disabled >--Pilih Jenis Kelamin--</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                          </select>
                          @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                      <br>
                      <div class="mb-3">
                        <label for="ttl" class="form-label">TTL</label>
                        <input name="ttl" type="text" class="form-control @error('ttl') is-invalid @enderror" value="{{ old('ttl') }}"  id="formGroupExampleInput5" placeholder="Masukkan Tempat Tanggal Lahir">
                        @error('ttl')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input name="alamatpel" type="text" class="form-control @error('alamatpel') is-invalid @enderror" value="{{ old('alamatpel') }}"  id="formGroupExampleInput6" placeholder="Masukkan Alamat">
                        @error('alamatpel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <!-- Upload image input-->
                        <label class="form-label">Foto Profil</label>
                            <input type="file" onchange="readURL(this);" class="form-control @error('foto') is-invalid @enderror" value="{{ old('foto') }}"  name="foto" placeholder="Logo ...">
                            @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        <!-- Uploaded image area-->
                        <div class="image-area mt-4"><img id="imageResult" src="#" alt=""></div> 
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