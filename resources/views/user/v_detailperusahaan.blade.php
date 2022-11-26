{{-- Style Alert --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
  <div class="card" style="background-color:white;margin-left:3em;margin-right:3em">
    <div class="card-body">
      <center>
      <img src="{{asset('/logo/'.$perusahaan->logo)}}" height="200px" alt="">
    </center>
    </div>
    <div class="card-body" style="background-color: white">
      <div class="row">
        <div class="col-md-3">
          <center>
            <img class="img-fluid img-thumbnail" src="{{asset('/logo/'. $perusahaan->logo)}}" alt="" style="width:80%;height:auto;margin-top:5px">
          </center>
        </div>
        <div class="col-md-9">
          <table>
          <tr>
            <td><h2><b>{{ $perusahaan->nama}}</b></h2></td>
          </tr>
          <tr>
            <td style="height:20px" ><h6>{{$perusahaan->deskripsi}}</h6>
              <div class="row">
                <div class="col-md-6">
                  <table>
                    <tr>
                      <td style="width:60%"><h6 style="color:grey">Kota</h6></td>
                      <td><h6>: {{$perusahaan->alamat}}</h6></td>
                    </tr>
                    <tr>
                      <td><h6 style="color:grey">Industri</h6></td>
                      <td><h6>: {{$perusahaan->industri}}</h6></td>
                    </tr>
                    
                  </table>
                </div>
                <div class="col-md-6">
                  <table>
                    <tr>
                      <td style="width:30%"><h6 style="color:grey">Situs</h6></td>
                      <td><h6>: <a style="text-decoration: none" href="{{$perusahaan->website}}">{{$perusahaan->website}}</a></h6></td>
                    </tr>
                    <tr>
                      <td><h6 style="color:grey">Ukuran</h6></td>
                      <td><h6>: {{$perusahaan->ukuran}}</h6></td>
                    </tr>
                    
                  </table>
                </div>
              </div>
            </td>
          </tr>
         
        </table>
        </div>
         
        </div>
        </div>
    </div>
</div>
 
 
 {{-- <div class="card col-sm-6 bg-primary"> --}}
 
 {{-- </div> --}}
</div>

<a style="float:right;margin-right:1em; margin-bottom:1em;" href="/lowonganperusahaan/{{ $perusahaan->id_perusahaan}}" class="btn btn-primary col-sm-3">Lihat Lowongan di {{ $perusahaan->nama }}</a> 

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
 