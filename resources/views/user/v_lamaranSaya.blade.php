@extends('layouts.v_templateregister')
<style>
</style>     
<br>
<br>
<br> 
<section class="content1">
      

    {{-- <!-- Default box -->
    @yield('content1') --}}
    
        <style> .container { width: 500px; padding: 0 0 5px 0; margin: 3px 0 10px 0; background: rgb(0, 0, 0); } #nav { margin: 0; padding: 0; border-top: 3px solid #000000; } #nav li { margin: 0; padding: 0; display: inline; list-style-type: none; } #nav a:link, #nav a:visited { float: left; font: bold 7.5pt verdana; line-height: 14px; padding: 9px; text-decoration: none; color: #708491; } #nav a:link.active, #nav a:visited.active, #nav a:hover { color: rgb(0, 0, 0); background: url(http://1.bp.blogspot.com/_7wsQzULWIwo/SzvC_Xa-vHI/AAAAAAAACw0/qVeZI3gdWQM/s1600/Inverted.png) no-repeat top center; border-top: 4px solid #000000; } </style> <div class="container">
            <div class="col-md-6 offset-md-4">
            <ul class="col-md-12" id="nav">    
           <li id="f1"><a class="nav-link active" href="#" onclick="dis1()"><h6>Lamaran Saya</h6></a></li>
           <li id="f2" style="display:none"><a class="nav-link" href="#" onclick="dis1()"><h6>Lamaran Saya</h6></a></li>
           <li id="f3"><a class="nav-link" href="#" onclick="dis2()"><h6>Wawancara</h6></a></li>
           <li id="f4" style="display:none"><a class="nav-link active" href="#" onclick="dis2()"><h6>Wawancara</h6></a></li>
           </ul>
           </div>
    </div>
    <!-- /.card -->

  </section>
@section('content2') 
<div style="margin-left:2em;margin-right:2em;" class="jumbotron p-5 rounded-3">
  <div class="table-responsive" style="width:50%;background-color:white;" id="f5">
            <table class="table table-bordered" >
              <thead>
              <tr>
                <th>No</th>
                <th>Perusahaan</th>
                <th>Posisi</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @php
              $i = 0;
               @endphp
              @foreach($lamaran as $lamarans)
              <tr>
              @php
                $i = $i+1;
               @endphp
              <td>{{ $i }}</td>
              <td>{{$lamarans->nama}}</td>
              <td>{{$lamarans->posisi}}</td>
              <td>
              @if ($lamarans->status == "Diterima")
                <span class="badge badge-success">Diterima di perusahaan</span>
              @elseif ($lamarans->tipewawancara <> null)
                  <span class="badge badge-primary">Tahap Wawancara</span>
              @else
                  <span class="badge badge-primary">Tahap Pengajuan CV</span> 
              @endif
              </td>
            </tr>
              @endforeach  
            </tbody>      
            </table>
        </div> 

        <div class="table-responsive" style="width:100%;background-color:white;display:none;" id="f6" >
            <table style="width:100%" class="table table-bordered" >
              <thead>
              <tr>
                <th >No</th>
                <th >Perusahaan</th>
                <th >Posisi</th>
                <th >Wawancara</th>
                <th >Jadwal</th>
                <th >
                 Detail Wawancara
                </th>
              </tr>
            </thead>
            @foreach($lamaran as $lamarans)
              @if ($lamarans->jadwal <> null)
              <tbody>
              <tr>
              <td>1</td>
              <td>{{$lamarans->nama}}</td>
              <td>{{$lamarans->posisi}}</td>
              <td>{{$lamarans->tipewawancara}}</td>
              @php
                  $data = explode("++", $lamarans->jadwal)
              @endphp
              
              <td>{{$data[0].", ".$data[1]."-".$data[2]}}</td>
              <td>
              @if($lamarans->tipewawancara == "Online" && $lamarans->linkwawancara == null)
              <a target="_blank" class="btn btn-sm btn-primary" disabled>Menunggu</a>
              @elseif($lamarans->tipewawancara == "Online" && $lamarans->linkwawancara <> null)
              <a target="_blank" class="btn btn-sm btn-primary" href="{{ $lamarans->linkwawancara }}">Menuju Wawancara</a>
              @elseif($lamarans->tipewawancara == "Offline" && $lamarans->alamatwawancara <> null)
              <ul class="fa-ul">
                <li><i class="fa-li fa fa-map-marker"></i> {{$lamarans->alamatwawancara}}</li>
              </ul>
              @else
               <a href=""><span class="badge badge-success"> <i class="fa fa-phone"></i> Lakukan Panggilan </span></a> 
            </td>
              @endif  
            </tr>
          </tbody>
            @endif
             @endforeach        
            </table>     
        </div>            
  </div>
    
<script>
  function dis1() {
    document.getElementById("f2").style.display="none";
    document.getElementById("f1").style.display="block";
    document.getElementById("f4").style.display="none";
    document.getElementById("f3").style.display="block";
    document.getElementById("f6").style.display="none";
    document.getElementById("f5").style.display="block";
  }
  function dis2() {
    document.getElementById("f1").style.display="none";
    document.getElementById("f2").style.display="block";
    document.getElementById("f3").style.display="none";
    document.getElementById("f4").style.display="block";
    document.getElementById("f5").style.display="none";
    document.getElementById("f6").style.display="block";
  }
</script>
@endsection          