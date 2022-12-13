<div class="table-responsive" style="width:100%;background-color:white;" >
    <table class="table" >

     <thead>
      <tr>
        <th >No</th>
        <th >Perusahaan</th>
        <th >Posisi</th>
        <th >Wawancara</th>
        <th >Jadwal</th>
        <th >Detail Wawancara</th>
      </tr>
    </thead>

    @php
    $i = 0;
     @endphp
    @foreach($lamaran as $lamarans)
      @if ($lamarans->jadwal <> null)
      <tr>
      <td>
        @php
        $i=$i+1;
        @endphp
        {{$i}}
      </td>
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
       <a href=""><span class="badge badge-success"> <i class="fa fa-clock"></i> Menunggu Detail Lokasi</span></a> 
    </td>
      @endif  
    </tr>

    @endif
     @endforeach        
    </table>     
</div>            