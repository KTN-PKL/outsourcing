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
          <input onkeyup="cariLowongan()" id="search" type="search" name="search"  class="form-control" placeholder="Cari Berdasarkan Posisi Kerja">
        </div>
      </div>
      <center>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h6>Filter Pencarian</h6>
            </div>
            <div class="row">
              <div class="col-md-6">
                <h6>Tipe Pekerjaan</h6>
                <table>
                  <tr>
                    <td>
                      <input onchange="filter()" type="checkbox" id="tipe1">
                      <label>Full-time</label>
                    </td>
                    <td>
                      <input onchange="filter()" type="checkbox" id="tipe2">
                      <label>Part-time</label>
                    </td>
                  </tr>
                  <tr>
                     <td>
                      <input onchange="filter()" type="checkbox" id="tipe3">
                      <label>Magang</label>
                     </td>
                     <td>
                      <input onchange="filter()" type="checkbox" id="tipe4">
                      <label>Freelance</label>
                     </td>
                  </tr>
                </table>
              </div>

              <div class="col-md-6">
                <h6>Pengalaman</h6>
                <table>
                  <tr>
                    <td>  
                      <input onchange="filter()" type="checkbox" id="pengalaman1">
                      <label>Kurang dari 1 Tahun</label>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <input onchange="filter()" type="checkbox" id="pengalaman2">
                      <label>1 - 3 Tahun</label>  
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <input onchange="filter()" type="checkbox" id="pengalaman3">
                      <label>3 - 5 Tahun</label>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <input onchange="filter()" type="checkbox" id="pengalaman4">
                      <label>5 - 10 Tahun</label>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <input onchange="filter()" type="checkbox" id="pengalaman5">
                      <label>Lebih dari 10 Tahun</label>
                    </td>
                  </tr>
                  
                </table>
              </div>

            </div>
          </div>
        </div>
        </center>
    
{{-- </section> --}}

          <div id="tablelowongan" class="col-md-12" id="full">

        </div>
       
          <table style="width: 100%;margin-left:auto;margin-right:auto">
            <tr>
              <td style="width: 40%"></td>
              <td> {{ $lowongan->links('vendor.pagination.bootstrap-4') }}</td>
              <td style="width: 40%"></td>
            </tr>
          </table>
         
         
       
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


<script>
   function filte1()
   {
    $("#tipe1").val("Full-time");
    filter()
   }
   function filte2()
   {
    $("#tipe2").val("Part-time");
    filter()
   }function filte3()
   {
    $("#tipe3").val("Magang");
    filter()
   }function filte4()
   {
    $("#tipe4").val("Freelance");
    filter()
   }
</script>





<script>
  $(document).ready(function() {
       tablelowongan()
   });

  
   function tablelowongan() {
           $.get("{{ url('lowongan/table') }}", {}, function(data, status) {
               $("#tablelowongan").html(data);
           });
       }
    function cariLowongan() {
           var search = $("#search").val();
           if (search == "") {
             tablelowongan()
           }
           else{
             $.ajax({
               type: "get",
               url: "{{ url('cek') }}",
               data: {
               "search": search,
               },
           success: function(data, status) {
               $("#tablelowongan").html(data);
               }
           });
           }
         
       }

       function filter(){
        var tipe1 = $("#tipe1").val();
        var tipe2 = $("#tipe2").val();
        var tipe3 = $("#tipe3").val();
        var tipe4 = $("#tipe4").val();
        var pengalaman1 = $("#pengalaman1").val();
        var pengalaman2 = $("#pengalaman2").val();
        var pengalaman3 = $("#pengalaman3").val();
        var pengalaman4 = $("#pengalaman4").val();
        var pengalaman5 = $("#pengalaman5").val();
        $.ajax({
               type: "get",
               url: "{{ url('filter') }}",
               data: {
               "tipe1": tipe1,
               "tipe2": tipe2,
               "tipe3": tipe3,
               "tipe4": tipe4,
               "pengalaman1": pengalaman1,
               "pengalaman2": pengalaman2,
               "pengalaman3": pengalaman3,
               "pengalaman4": pengalaman4,
               "pengalaman5": pengalaman5,
               },
           success: function(data, status) {
               $("#tablelowongan").html(data);
               }
           });
       }
</script>

 
