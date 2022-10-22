

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template') }}/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template') }}/dist/css/adminlte.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      #upload {
      opacity: 0;
  }
  
  #upload-label {
      position: absolute;
      top: 50%;
      left: 1rem;
      transform: translateY(-50%);
  }
  
  .image-area {
      border: 2px dashed rgba(255, 255, 255, 0.7);
      padding: 1rem;
      position: relative;
  }
  
  .image-area::before {
      content: 'Uploaded image result';
      color: #fff;
      font-weight: bold;
      text-transform: uppercase;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 0.8rem;
      z-index: 1;
  }
  
  .image-area img {
      z-index: 2;
      position: relative;
  }
  </style>
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
              <a class="nav-link active" aria-current="page" href="{{url('/')}}">LOWONGAN KERJA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/daftarPerusahaan')}}">PERUSAHAAN</a>
            </li>
          </ul>
        </ul>
          @guest
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link px-2" href="#" data-bs-toggle="modal" data-bs-target="#pilihRegister">DAFTAR</a>
            </li>
             <li class="nav-item">
              <a class="nav-link px-2" href="{{ route('login')}}"  data-bs-toggle="modal" data-bs-target="#masuk">MASUK</a>
            </li>
            

          </ul>
        

          @endguest
           @auth
          <ul class="navbar-nav ms-3">
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{url('/')}}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{Auth::user()->name}}
              </a>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a href="{{url('/lamaranSaya')}}" class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
                  <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                </svg>Lamaran Saya</a>

                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                     <i class="fa fa-sign-out"></i>{{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </li>
          
        </ul>
        @endauth
        </div>
      </div>
    </nav>

<br>
<br>
<section class="content1">
      

    <!-- Default box -->
    @yield('content1')
    <!-- /.card -->

  </section>

  <section class="content2">
      

    <!-- Default box -->
    @yield('content2')
    <!-- /.card -->

  </section>

  <section class="content3">
      

    <!-- Default box -->
    @yield('content3')
    <!-- /.card -->

  </section>


 <!-- Modal Pilih -->
 <div class="modal fade" id="pilihRegister" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Register</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

          <div class="modal-body">
            <div style="margin-center:4em" class="card-group">
              <div class="card">
                <a href="{{url('/registerpelamar')}}">
                  <div class="icon-demo d-flex align-items-center justify-content-center p-3 py-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="" class="bi bi-person-fill" viewBox="0 0 16 16">
                      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                    <i class="bi bi-person-fill"></i>
                    </div>
                <div class="card-body">
                  <h5 style="color:black" class="text-center">PELAMAR</h5>
                </div>
              </a>
              </div>
              <div class="card">
                <a href="{{url('/registerperusahaan')}}">
                  <div class="icon-demo d-flex align-items-center justify-content-center p-3 py-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="black" class="bi bi-building" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
                      <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
                    </svg>
                    <i class="bi bi-building"></i>
                    </div>
                <div class="card-body">
                  <h5 style="color: black" class="text-center">PERUSAHAAN</h5>
                </div>
              </a>
              </div>
                        
            </div>
          

          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Modal Login-->
  <div class="modal fade" id="masuk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form id="form-login" method="POST" action="{{ route('login') }}">
                @csrf
          <div class="modal-body">
            <div id="alert"></div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" name="password">
            </div>
          </div>
          <div class="modal-footer">
            <h6>Tidak Punya Akun? <a href="#" data-bs-toggle="modal" data-bs-target="#pilihRegister" data-bs-dismiss="modal">Daftar</a>
            </h6>
            <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <div id="tombol_login">
              <input class="btn btn-primary" type="submit" value="Masuk">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

        <!-- Modal Register -->
    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registrasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST" action="{{ route('register') }}">
              @csrf
            <div class="modal-body">
              <div id="alert"></div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name" placeholder="Full Name ...">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Email Address ...">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password ...">
                <input type="hidden" name="level" value="user">
              </div>
              <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password ...">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <div id="tombol_login">
                <input class="btn btn-primary" type="submit" value="Register">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  
  
  
    <!-- Modal Pilih -->
    <div class="modal fade" id="pilihRegister" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Register</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
  
            <div class="modal-body">
              <div style="margin-center:4em" class="card-group">
                <div class="card">
                  <a href="{{url('/registerpelamar')}}">
                  <img src="./template2/landingpage/img/job.png" class="card-img-top" style="margin:center" alt="...">
                  <div class="card-body">
                    <h5 style="color:black" class="text-center">PELAMAR</h5>
                  </div>
                </a>
                </div>
                <div class="card">
                  <a href="{{url('/registerperusahaan')}}">
                  <img src="./template2/landingpage/img/perusahaan.png" class="card-img-top" style="margin:center" alt="...">
                  <div class="card-body">
                    <h5 style="color: black" class="text-center">PERUSAHAAN</h5>
                  </div>
                </a>
                </div>
                          
              </div>
            
  
            </div>
          </form>
        </div>
      </div>
    </div>
  
  
  
  
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>

</html>
