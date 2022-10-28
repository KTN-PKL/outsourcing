<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('layouts.v_templateregister')
 @section('content1')  
<br>
<br>


  @guest
  @if (session()->has('register'))
<div class="alert alert-success alert-block" id="alert">
  <button type="button" class="close" data-dismiss="alert">x</button>
      <strong>{{session()->get('register')}}</strong>
</div>
  @endif
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
  @endguest
  <div class="search-bar px-2">
    <div class="container">
      <div class="card search-card">
        <label><i class="fas fa-search"></i>Cari Loker<br /></label>
        <div class="mb-3 text-center">
          <input id="search" type="" name=""  class="form-control" placeholder="Cari Berdasarkan Posisi Kerja">
        </div>
      </div>
    
{{-- </section> --}}

          <div class="col-md-12" id="full">
            <div class="row" id="full">
              @foreach ($lowongan as $lowongans)
                  <div class="col-md-3 ">
                      <div class="card-header" style="margin-bottom: 2em">
                          <h1 class="card-title">{{ $lowongans->nama }}</h1>
                          <br><br>
                          <div class="card-body">
                              <h4>{{$lowongans->posisi}}</h4>
                              <br>
                              <h6>{{$lowongans->alamat}}</h6>
                         </div>
                          <div class="card-footer">
                            @php
                                $encrypted = Crypt::encryptString($lowongans->id_lowongan);
                            @endphp
                            
                            <a href="{{url('/detailLowongan')}}/{{$lowongans->id_lowongan}}" class="btn btn-primary mt-3">Detail <span class="badge bg-secondary"></span> </a><br>
                          </div>
                         
                      </div>
                  </div> 
  
              @endforeach
            </div>
          </div>
          <div class="col-md-12">
              
              <div id="searchResult" class="row">
              
              
            </div>
            
        
          </div>
          <table style="width: 100%;margin-left:auto;margin-right:auto">
            <tr>
              <td style="width: 40%"></td>
              <td> {{ $lowongan->links('vendor.pagination.bootstrap-4') }}</td>
              <td style="width: 40%"></td>
            </tr>
          </table>
         
         
        </div>
      </div>

    {{-- <section id="search" class="search py-5">
      <div class="search-bar px-2">
        <div class="container">
          <div class="card search-card">
            <label for="Search" class="form-label"><i class="fas fa-search"></i> Cari Pekerjaan 
              <br /></label>
            <div class="mb-3 text-center">
             
              <form action="{{ route('cari') }}" method="POST">
                @csrf
              <input type="text" name="cari"  class="form-control"  />
              </form>
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
           --}}

          {{-- daftar loker --}}
         
          {{-- <div class="row">
            @foreach($lowongan as $lowongans)
          <div class="col-md-4 mb-3">
            <div class="card shadow" style="margin-left: 1em; margin-top:1em;">
                <div class="card-header">
                    <h4>{{$lowongans->posisi}}</h4>
                </div>
                <div class="card-body" style="width:24rem">
                     <p><img height="30px" width="60px" src="{{asset('/logo/'. $lowongans->logo)}}" alt="logo">{{$lowongans->nama}}</p> <br>
                    <i class="bi bi-geo-alt-fill" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                      <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                    </svg>{{$lowongans->alamat}}</i><br>
                    
                    <a href="{{url('/detailLowongan')}}/{{$lowongans->id_lowongan}}" class="btn btn-primary mt-3">Detail <span class="badge bg-secondary"></span> </a><br>
                    
                  
                  </div>
            </div>
          </div>   
          @endforeach 
      </div> --}}
      
      
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

   


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script type="text/javascript">

      $("document").ready(function()
      {
        setTimeout(function()
        {
          $("div.alert").remove();
        }, 5000);
      });

    </script>
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

  <script type="text/javascript">
    $(document).ready(function(){
    
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      })
      $('#search').on('keyup', function(){
        $search = $(this).val();
        if($search == ''){
          document.getElementById("full").style.display="block";
          $('#searchResult').html('');
          $('#searchResult').hide('');
          document.getElementById("searchResult").style.display="none";
        }else{
          document.getElementById("full").style.display="none";
          $.ajax({
            method:"post",
            url:'cek',
            data:JSON.stringify({
              search:$search
            }),
            headers:{
              'Accept':'application/json',
              'Content-Type':'application/json'
            },
            success: function(data){
      
              var searchResultAjax='';
              data = JSON.parse(data);
              console.log(data);
              $('#searchResult').show();
              for(let i=0; i<data.length;i++){
                searchResultAjax += 
                ` <div class="col-md-3 ">
                      <div class="card-header"  style="margin-bottom: 2em">
                          <h1 class="card-title">`+data[i].nama+`</h1>
                          <br><br>
                          <div class="card-body">
                              <h4>`+data[i].posisi+`</h4>
                              <br>
                              <h6>`+data[i].alamat+`</h6>
                         </div>
                          <div class="card-footer">
                            <a href="{{url('/detailLowongan')}}/`+data[i].id_lowongan+`" class="btn btn-primary mt-3">Detail <span class="badge bg-secondary"></span> </a><br>
                          </div>
                         
                      </div>
                  </div> `
              }
              $('#searchResult').html(searchResultAjax);
            }
          })
        }
      })
    })
    </script>
