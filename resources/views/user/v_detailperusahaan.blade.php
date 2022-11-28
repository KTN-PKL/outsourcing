{{-- Style Alert --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
  .img-size{
/* 	padding: 0;
	margin: 0; */
	height: 450px;
	width: 800px;
	background-size: cover;
	overflow: hidden;
}
.modal-content {
   width: 700px;
  border:none;
}
.modal-body {
   padding: 0;
}

.carousel-control-prev-icon {
	width: 30px;
	height: 48px;
  color: black;
}
.carousel-control-next-icon {
	width: 30px;
	height: 48px;
  color: black
}
</style>
{{-- Halaman --}}
@extends('layouts.v_templateregister')
 @section('content1') 
 <br>
 @if (session()->has('create'))
<div class="alert alert-success alert-block" id="alert">
  <button type="button" class="close" data-dismiss="alert">x</button>
      <strong>{{session()->get('create')}}</strong>
</div>
  @endif
 
@if (session()->has('eror'))
<div class="alert alert-danger alert-block" id="alert">
  <button type="button" class="close" data-dismiss="alert">x</button>
      <strong>{{session()->get('eror')}}</strong>
</div>
  @endif
  <div class="card" style="background-color:white;margin-left:3em;margin-right:3em;border:none">
    <div class="card-body" style="border:none">
      <center>
      <img src="{{asset('/logo/'.$perusahaan->logo)}}" height="200px" alt="">
    </center>
    </div>
    <div class="card-body" style="background-color: white;border:none;">
      <div class="row">
        <div class="col-md-2">
          <center>
            <img class="img-fluid img-thumbnail" src="{{asset('/logo/'. $perusahaan->logo)}}" alt="" style="width:80%;height:auto;margin-top:5px">
          </center>
        </div>
        <div class="col-md-10">
          <table style="border:none">
          <tr>
            <td><h2><b>{{ $perusahaan->nama}}</b></h2></td>
          </tr>
          <tr>
            <td style="height:20px" ><h6>{{$perusahaan->deskripsi}}</h6>
              <div class="row">
                <div class="col-md-5">
                  <table>
                    <tr>
                      <td style="width:60%"><h6 style="color:grey">Kota</h6></td>
                      <td><h6>{{$perusahaan->alamat}}</h6></td>
                    </tr>
                    <tr>
                      <td><h6 style="color:grey">Industri</h6></td>
                      <td><h6>{{$perusahaan->industri}}</h6></td>
                    </tr>
                    
                  </table>
                </div>
                <div class="col-md-7">
                  <table>
                    <tr>
                      <td style="width:30%"><h6 style="color:grey">Situs</h6></td>
                      <td><a style="text-decoration: none" href="{{$perusahaan->website}}"><h6>{{$perusahaan->website}}</h6></a></td>
                    </tr>
                    <tr>
                      <td><h6 style="color:grey">Ukuran</h6></td>
                      <td><h6>{{$perusahaan->ukuran}}</h6></td>
                    </tr>
                    
                  </table>
                 </div>
              </div>
              <a style="float:right;margin-bottom:1em;" href="/lowonganperusahaan/{{ $perusahaan->id_perusahaan}}" class="btn btn-primary">Lihat Lowongan di {{ $perusahaan->nama }}</a> 
            </td>
          </tr>
         
        </table>
        </div>
         
        </div>
        </div>
    </div>
    <div class="row">
      <div class="card col-md-8" style="margin-left:4em">
        <h5><b>Tentang Perusahaan</b></h5>
        <br>
        <h6><b>Deskripsi</b></h6>
        <div class="desc">
          {{$perusahaan->deskripsi}}
        </div>
       <br>
        <h6><b>Alamat Perusahaan</b></h6>
        <div class="desc">
          {{$perusahaan->alamat}}
        </div>
      </div>
      <div class="card col-md-2" style="margin-left:1em"> 
        <div style="position: relative">
        <h5><b>Galeri Foto</b></h5>
        @if($perusahaan->fotodepan<>null)
        <a id="download" style="position: absolute;" href="{{asset('verifikasi/fotokantor/fotodepan/'.$perusahaan->fotodepan)}}" download> <button type="button" class="btn btn-outline-secondary"><i class="fa fa-download"></i></button></a>
        <a style="position: absolute;left:40px" href="#"data-bs-toggle="modal" data-bs-target="#largeModal"> <button type="button" class="btn btn-outline-secondary"><i class="fa fa-eye"></i></button></a>
        <img class="img-fluid img-thumbnail" src="{{asset('/verifikasi/fotokantor/fotodepan/'. $perusahaan->fotodepan)}}" alt="">
        @endif
        </div>
      </div>
    </div>

    
     
 <!-- modal -->
 <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-body" style="background-color: black">
         <!-- carousel -->
        <div
             id='carouselExampleIndicators'
             class='carousel slide'
             data-ride='carousel'
             >
          <ol class='carousel-indicators'>
            <li
                data-target='#carouselExampleIndicators'
                data-slide-to='0'
                class='active'
                ></li>
                
            @if($perusahaan->fotobelakang<>null)
            <li
                data-target='#carouselExampleIndicators'
                data-slide-to='1'
                ></li>
           @endif

          @if($perusahaan->fotokiri<>null)
            <li
                data-target='#carouselExampleIndicators'
                data-slide-to='2'
                ></li>
                @endif

                @if($perusahaan->fotokanan<>null)
            <li
                data-target='#carouselExampleIndicators'
                data-slide-to='3'
                ></li>
                @endif

                @if($perusahaan->fotodalam<>null)
            <li
                data-target='#carouselExampleIndicators'
                data-slide-to='4'
                ></li>
                @endif
          </ol>
          <div class='carousel-inner'>
            <center>
            <div class='carousel-item active'>
              <img class='img-size' src='{{asset('/verifikasi/fotokantor/fotodepan/'. $perusahaan->fotodepan)}}' alt='1' />
            </div>
            @if($perusahaan->fotobelakang<>null)
            <div class='carousel-item'>
              <img class='img-size' src='{{asset('/verifikasi/fotokantor/fotobelakang/'. $perusahaan->fotobelakang)}}' alt='2' />
            </div>
            @endif
            @if($perusahaan->fotokiri<>null)
            <div class='carousel-item'>
              <img class='img-size' src='{{asset('/verifikasi/fotokantor/fotokiri/'. $perusahaan->fotokiri)}}' alt='3' />
            </div>
            @endif
            @if($perusahaan->fotokanan<>null)
            <div class='carousel-item'>
              <img class='img-size' src='{{asset('/verifikasi/fotokantor/fotokanan/'. $perusahaan->fotokanan)}}' alt='4' />
            </div>
            @endif
            @if($perusahaan->fotodalam<>null)
            <div class='carousel-item'>
              <img class='img-size' src='{{asset('/verifikasi/fotokantor/fotodalam/'. $perusahaan->fotodalam)}}' alt='5' />
            </div>
            @endif
          </div>
          <a
             class='carousel-control-prev'
             href='#carouselExampleIndicators'
             role='button'
             data-slide='prev'
             >
             @if($perusahaan->fotobelakang<>null)
            <span style="background-color: black" class='carousel-control-prev-icon'
                  aria-hidden='true'
                  ></span>
            <span class='sr-only'>Previous</span>
            @endif
          </a>
          <a
             class='carousel-control-next'
             href='#carouselExampleIndicators'
             role='button'
             data-slide='next'
             >
            <span
                  class='carousel-control-next-icon'
                  aria-hidden='true'
                  ></span>
            <span class='sr-only'>Next</span>
          </a>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
   


 @endsection 


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
 