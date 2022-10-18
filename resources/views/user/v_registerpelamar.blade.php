

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Portal Kerja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('template2')}}/landingpage/style.css" />
  </head>

  <body>
   
    <nav class="navbar navbar-expand-lg fixed-top bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><h4>PORTAL KERJA</h4></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">LOWONGAN KERJA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">PERUSAHAAN</a>
            </li>
          </ul>
        </ul>
          @guest
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link px-2" href="#" data-bs-toggle="modal" data-bs-target="#pilihRegister">DAFTAR</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-2" href="{{ route('register')}}"  data-bs-toggle="modal" data-bs-target="#register">BACKUP</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-2" href="{{ route('login')}}"  data-bs-toggle="modal" data-bs-target="#masuk">MASUK</a>
            </li>
            

          </ul>
        

          @endguest
        </div>
      </div>
    </nav>

<br>
<br>
    <div class="container py-4">  
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
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
                        <label class="form-label">Upload Foto</label>
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
    

     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
      
  @push('scripts')
  <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
  <script>
      CKEDITOR.replace('my-editor');
      </script>
  @endpush   
  </body>

</html>
