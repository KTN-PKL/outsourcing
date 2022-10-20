@extends('layouts.v_templateregister')
 @section('content3') 
 <br>
 <table width = "100%" border = "0">
          
    <tr>
       <td colspan = "2">
         <h1>Detail Loker</h1>
       </td>
    </tr>
    <td  colspan="2" height = "60" >
    </td>
    <tr valign = "top">
       <td  width = "10%">
        <img width="100%" src="{{asset('/logo/'. $lowongan->logo)}}" alt="logo">
       </td>
        
       <td  width = "90%" >
        <h4>{{$lowongan->nama}} </h4>
        <h4 style="color: blue">{{$lowongan->posisi}}</h4>
       </td>
    </tr>
    <td  colspan="2" height = "60" >
    </td> 
     
 </table>

 <div class="card">
<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kirimLamaran">Kirim Lamaran</a>
 </div>


 {{-- modal kirim lamaran --}}
 <div class="modal fade" id="kirimLamaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Kirim Lamaran</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
           <form enctype="multipart/form-data" id="form-login" method="POST" action="{{ route('detailLowongan.create') }}">
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
           <div class="mb-3">
            
            <input type="text" class="form-control" name="id_lowongan" value="{{$lowongan->id_lowongan}}" hidden > 
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