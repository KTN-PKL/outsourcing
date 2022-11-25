{{-- Style Alert --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

{{-- Halaman --}}
@extends('layouts.v_templateregister')
 @section('content1') 
 <br>
 <br>
 <div class="col-md-12" id="full">
  <div class="row" id="full">
    @foreach ($lowongan as $lowongans)
    <div class="col-md-4">
        <div class="card-header">
          <div class="row">
          <div class="col-md-2">
            <img src="{{asset('/logo/'. $lowongans->logo)}}" alt="" style="width:40px;margin-top:5px">
          </div>
          <div class="col-md-10">
            <table>
              <tr>
              <td>{{ $lowongans->posisi }}</td>
            </tr>
            <tr>
              <td><a style="text-decoration: none" href="">{{ $lowongans->nama }}</a></td>
            </tr>
            </table>
          </div>
          </div>
          </div>
       
                <div class="card-body">
                   
                    <ul class="fa-ul">
                      <li><i class="fa-li fa fa-map-marker"></i>{{$lowongans->alamat}}</li>
                      @if($lowongans->statusgaji == "Tampilkan")
                      <li><i class="fa-li fa fa-money"></i>IDR {{$lowongans->gaji}}</li>
                      @else
                      <li><i class="fa-li fa fa-money"></i>Perusahaan Tidak Menampilkan Gaji</li>
                      @endif
                      <li><i class="fa-li fa fa-suitcase"></i>{{$lowongans->pengalaman}}</li>
                     
                    </ul>
                    
               </div>
                <div class="card-footer">
                 
                  
                  <a href="{{url('/detailLowongan')}}/{{$lowongans->id_lowongan}}" style="width:400px" class="btn btn-primary">Detail <span class="badge bg-secondary"></span> </a><br>
                </div>
              </div>       
            
       

    @endforeach
  </div>
</div>
 {{-- <div class="col-md-12" id="full">
    <div class="row" id="full">
      @foreach ($lowongan as $lowongans) --}}
          {{-- <div class="col-md-3 ">
              <div class="card-header">
                  <h1 class="card-title">{{ $lowongans->nama }}</h1>
                  <br><br>
                  <div class="card-body">
                      <h4>{{$lowongans->posisi}}</h4>
                      <br>
                      <h6>{{$lowongans->alamat}}</h6>
                 </div>
                  <div class="card-footer">
                    <a href="{{url('/detailLowongan')}}/{{$lowongans->id_lowongan}}" class="btn btn-primary mt-3">Detail <span class="badge bg-secondary"></span> </a><br>
                  </div>
                 
              </div>
          </div>  --}}

      {{-- @endforeach --}}
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
 