<div class="row" id="full">
  @foreach ($lowongan as $lowongans)
  <div class="col col-md-4 col-6 d-flex">
      <div style="border-top:1px solid grey;border-bottom:1px solid grey;margin-bottom:1em;" class="card-body flex-fill">
        <div class="row">
        <div style="align-self: flex-start" class="col-md-2">
          <img class="img-fluid" src="{{asset('/logo/'. $lowongans->logo)}}" alt="" style="width:40px;margin-top:5px">
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
        <br>
                  <ul class="fa-ul">
                    <li><i class="fa-li fa fa-clock"></i>{{$lowongans->tipe}}</li>
                    <li><i class="fa-li fa fa-map-marker"></i><span>{{$lowongans->kota}}</span></li>
                    @if($lowongans->statusgaji == "Tampilkan")
                    @php
                    
                    @endphp
                    <li><i class="fa-li fa fa-money"></i>IDR {{$lowongans->gaji}}</li>
                    @else
                    <li><i class="fa-li fa fa-money"></i>Perusahaan Tidak Menampilkan Gaji</li>
                    @endif
                    <li><i class="fa-li fa fa-suitcase"></i>{{$lowongans->pengalaman}}</li>
                   
                  </ul>
                  <small ><i class="fa fa-clock" style="color: green">Diperbarui {{ \Carbon\Carbon::parse($lowongans->waktu)->diffForHumans() }}
                  </i></small>

         
                  <a href="{{url('/detailLowongan')}}/{{$lowongans->id_lowongan}}" class="stretched-link" target="_blank"></a>
            
            </div>       
          
     


</div>
@endforeach
</div>