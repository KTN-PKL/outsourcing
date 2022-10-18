

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
          @auth
          <ul class="navbar-nav mr-3">
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  User
              </a>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </li>
          @endauth
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
            
              <a href="{{url('perusahaan')}}" class="btn btn-primary" >UNTUK PERUSAHAAN <i class="fa fa-angle-double-right"></i></a>
            

          </ul>
          

          @endguest
        </div>
      </div>
    </nav>

  

     
      <div class="jumbotron p-5 rounded-3">
        <div class="container py-4">
          <div class="row">
            <div class="col-sm-6">
              <h1>Portal Loker</h1>
              <h2>Cari kerjaan online</h2>
              <div class="desc">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa, molestias maiores non doloribus impedit ut illo, fugiat quam nisi autem accusamus nobis, similique sapiente eius provident vel aperiam quaerat pariatur?</p>
              </div>
              <div class="hero1 text-center">
                <img src="./template2/landingpage/img/ilus2.svg" alt="" />
              </div>
            </div>
            <div class="col-sm-6">
              <div class="hero"><img src="./template2/landingpage/img/ilust4.svg" alt="" /></div>
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <section id="search" class="search py-5">
      <div class="search-bar px-2">
        <div class="container">
          <div class="card search-card">
            <label for="Search" class="form-label"><i class="fas fa-search"></i> Cari Pekerjaan 
              <br /></label>
            <div class="mb-3 text-center">
              <input type="text"  id="lowongan" class="form-control" id="Search" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="tablesec">
      <div class="container shadow">
        <div class="card-table">
          <h3 class="text-center py-2">Data Loker</h3>
          <div id="result"></div>
          
        </div>
      </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path
        fill="#0099ff"
        fill-opacity="1"
        d="M0,288L80,261.3C160,235,320,181,480,181.3C640,181,800,235,960,229.3C1120,224,1280,160,1360,128L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"
      ></path>
    </svg>
    <footer>
      <p class="text-center">Copyright©2022</p>
    </footer>

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
            <h6>Tidak Punya Akun?</h6><a href="{{route('register')}}">Daftar</a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
            <div class="card" style="width: 18rem;">
              <a href="{{url('/perusahaan')}}">
              <img class="card-img-top" src="./" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Pelamar</p>
              </a>
              </div>
            </div>
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="..." alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Perusahaan</p>
              </div>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    {{-- <script>
    function login() {
      var formElement = document.getElementById("form-login");
      var formData = new FormData(formElement);
      const xhttp = new XMLHttpRequest();

      xhttp.open("POST", "http://localhost/outsourcings/outsourcings/User/login/");
      xhttp.onload = function() {
        var obj = JSON.parse(this.response);

        switch (obj.status) {
          case 'sukses':
            switch (obj.level) {
              case 'admin':
                window.location.href = "http://localhost/outsourcings/outsourcings/admin"
                break;
              case 'user':
                window.location.href = "http://localhost/outsourcings/outsourcings/user"
                break;
              case 'perusahaan':
                window.location.href = "http://localhost/outsourcings/outsourcings/perusahaan"
                break;

              default:
                break;
            }
            break;

          case 'error':
            document.getElementById("alert").innerHTML = `<div class="alert alert-danger" role="alert">
                                                                    ${obj.pesan}
                                                                  </div>`;
            document.getElementById("tombol_login").innerHTML = `<input class="btn btn-primary" type="submit" value="Masuk">`;
          default:
            break;
        }
        console.log(obj);
      }

      xhttp.onprogress = function() {
        document.getElementById("tombol_login").innerHTML = `<div class="loader"></div>`;
      }

      xhttp.send(formData);
      return false;
    }
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#Table_ID').DataTable();
    });
  </script>
  <script>
    $(document).ready(function() {
      load_data();

      function load_data(query) {
        $.ajax({
          url: "http://localhost/outsourcings/outsourcings/Welcome/search",
          method: "POST",
          data: {
            query: query
          },
          success: function(data) {
            $('#result').html(data);
          }
        });
      }
      $('#lowongan').keyup(function() {
        let search = $(this).val();
        if (search != '') {
          load_data(search);
        } else {
          load_data();
        }
      });
      $('#wilayah').keyup(function() {
        let search = $(this).val();
        if (search != '') {
          load_data(search);
        } else {
          load_data();
        }
      });
    });
  </script> --}}

  </body>
</html>
