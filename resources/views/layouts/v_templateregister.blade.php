

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <link rel="icon" type="image/png" href="./template2/landingpage/img/ktn.png">
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
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    
  <meta name="csrf-token" content="{{ csrf_token() }}">
 
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
      @include('layouts.nav')
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
                
                  <div class="icon-demo d-flex align-items-center justify-content-center p-3 py-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="" class="bi bi-person-fill" viewBox="0 0 16 16">
                      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                    <i class="bi bi-person-fill"></i>
                    </div>
                <div class="card-body">
                  <h5 style="color:black" class="text-center">PELAMAR</h5>
                </div>
                <a href="{{url('/registerpelamar')}}" class="stretched-link"></a>
              </div>
              <div class="card">
               
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
                <a href="{{url('/registerperusahaan')}}" class="stretched-link"></a>
              </div>
                        
            </div>
          

          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Modal Login-->
  @include('login')
  
  
  
  
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
  

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@auth
<script>
   $(document).ready(function() {
         notif(),
         readfoto()
     });

     function notif() {
         $.get("{{ url('user/read') }}", {}, function(data, status) {
             $("#jumlah").html(data);  
         });
     }

     function readfoto() {
         $.get("{{ url('user') }}" , {}, function(data, status) {
             $("#navbar").html(`<img width="40px" height="40px" alt="Profile" class="rounded-circle" src="{{asset('/foto/`+data+`')}}" >`);  

             
         });
     }
  
</script>
@endauth
<script>
  function serahlu(){ 
        var id = $("#prov").val();
        $.get("{{ url('kota') }}/" + id, {}, function(data, status) {
          $("#baca").html(data);
      });
    }
</script>




















  
  
  
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
  {{-- @yield('scripts') --}}
  
  </body>

</html>
