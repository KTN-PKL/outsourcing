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
        <img  width="250" height="200"  src="{{asset('/logo/'. $perusahaan->logo)}}" alt="logo">
       </td>
        
       <td  width = "80%" >
        <h3 style="color:beige">{{$perusahaan->nama}} </h3>
       <h6>@php echo $perusahaan->deskripsi; @endphp</h6>
        <br>
       <table width = "100%" border = "0">
           <tr>
               <td width = "8%">Alamat</td><td>: {{ $perusahaan->alamat }}</td>
               <td width = "8%">Situs</td><td>: {{ $perusahaan->website }}</td>
           </tr>
           <tr>
               <td width = "8%">Industri</td><td>: {{ $perusahaan->industri }}</td>
               <td width = "8%">Ukruan</td><td>: {{ $perusahaan->ukuran }}</td>
           </tr>
       </table>
       </td>
    </tr>
    <td  colspan="2" height = "60" >
    </td> 
 </table>
 
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
 