@extends('layouts.v_templateregister')
 @section('content1') 
 <br>
 @if (session('create'))
<div class="alert alert-success" role="alert">
    {{ __('Order Berhasil dibuat') }}
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
        
       <td  width = "90%" >
        <h3>{{$lowongan->posisi}} </h3>
        <a href="{{url('/detailPerusahaan')}}" style="color: rgb(229, 229, 229)"><h6>{{$lowongan->nama}}</h6></a>
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
           <div class="mb-3">
            <input type="text" class="form-control" name="id_perusahaan" value="{{$lowongan->id_perusahaan}}" hidden> 
          </div>
          
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
 