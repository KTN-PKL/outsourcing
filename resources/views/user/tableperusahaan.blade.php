<div  class="row" id="full">
@foreach ($perusahaan as $perusahaans)
<div  class="col-sm-4 d-flex">
<div class="card card-body flex-fill">
    <div class="row">
    <div class="col-sm-3">
      <img class="img-fluid" src="{{asset('/logo/'. $perusahaans->logo)}}" alt="" style="width:auto;margin-top:5px">
    </div>
    <div class="col-sm-9">
      <table>
        <tr>
        <td>{{ $perusahaans->nama }}</td>
      </tr>
      <tr>
        <td><span style="color: grey">{{ $perusahaans->kota }}</span></td>
      </tr>
      </table>
    </div>
    </div>
    <br>
    <ul class="fa-ul">
      <li><i class="fa-li fa fa-building"></i>{{$perusahaans->industri}}</li>
      <li><i id="lowongan"></i></li>
       
      </ul>
      <a  href="{{url('/detailperusahaan')}}/{{$perusahaans->id_perusahaan}}" class="stretched-link" target="_blank"></a>
    </div>
</div>
@endforeach
</div>
        