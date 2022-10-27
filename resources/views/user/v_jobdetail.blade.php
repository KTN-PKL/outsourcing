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


 <h2>Detail Loker</h2>
 <div class="card  bg-secondary">
 <table width = "100%" border = "0">
    <td  colspan="2" height = "60" >
    </td>
    <tr valign = "top">
       <td  width = "10%">
        <img width="100%" src="{{asset('/logo/'. $lowongan->logo)}}" alt="logo">
       </td>
        
       <td  width = "80%" >
        <h3 style="color:beige">{{$lowongan->posisi}} </h3>
        <a href="/detailperusahaan/{{ $lowongan->id_perusahaan }}" style="color: rgb(255, 255, 255)"><h6>{{$lowongan->nama}}</h6></a>
       </td>
    </tr>
    <td  colspan="2" height = "60" >
    </td> 
 </table>
 {{-- <div class="card col-sm-6 bg-primary"> --}}
 @auth

<center>
<a style="float:right;margin-right:1em; margin-bottom:1em;" href="#" class="btn btn-primary col-sm-3" data-bs-toggle="modal" data-bs-target="#kirimLamaran">Kirim Lamaran</a> 
@endauth
@guest
<a href="{{ route('login')}}" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#masuk">Kirim Lamaran</a>
@endguest
 {{-- </div> --}}
</div>
<div class="container">
  <div class="row">
    <div class="col-sm">
      <h4>SKILL</h4>
      <div class="desc">
        @php
          echo $lowongan->skill;
      @endphp
      </div>
      <br>
      <h4>JOBDESK</h4>
      <div class="desc">
        @php
          echo $lowongan->jobdesk;
      @endphp
      </div>

    </div>
     <div class="col-sm">
      <h4>KUALIFIKASI</h4>
      <div class="desc">
        @php
        echo $lowongan->kualifikasi;
    @endphp
      </div>
    </div>
  </div>
</div>


 {{-- modal kirim lamaran --}}
 <div class="modal fade" id="kirimLamaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Kirim Lamaran</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
           <form enctype="multipart/form-data" id="form-login" method="POST" action="{{ route('detailLowongan.create', $lowongan->id_lowongan) }}">
               @csrf
         <div class="modal-body">
           <div id="alert"></div>
           <div class="mb-3">
            <!-- Upload image input-->
            <label class="form-label">Kirim CV</label>
                <input type="file" onchange="readURL(this);" class="form-control"  name="resume" placeholder="CV ...">
         
                     </div>
           <div class="mb-3">
             <label for="exampleInputPassword1" class="form-label">Nomor Telepon</label>
             <input type="text" class="form-control" name="telp">
           </div>
           {{-- <div class="mb-3">
            <input type="text" class="form-control" name="id_perusahaan" value="{{$lowongan->id_perusahaan}}" hidden> 
          </div> --}}
          
         </div>
         <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <div id="tombol_kirim">
             <input class="btn btn-primary" type="submit" value="Kirim">
           </div>
         </div>
       </form>
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
 