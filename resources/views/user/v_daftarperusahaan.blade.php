<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('layouts.v_templateregister')
@section('content1') 
<br>
<br> 
<div class="container">
<h2>DAFTAR PERUSAHAAN</h2>
    <div class="search-bar px-2">
      <div class="container">
        <div class="card search-card">
          <label><i class="fas fa-search"></i>Cari Perusahaan<br /></label>
          <div class="mb-3 text-center">
            <input id="inputSearch" type="" name=""  class="form-control">
          </div>
        </div>
      </div>
    </div>
            <div class="col-sm-12" id="full">      
               <div class="row" id="full">
                  @foreach ($perusahaan as $perusahaans)
                  <div class="col-sm-4 d-flex" onload="readHitung({{$perusahaans->id_perusahaan}})" >
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
                          <a href="{{url('/detailperusahaan')}}/{{$perusahaans->id_perusahaan}}" style="width:100%;" class="btn btn-primary">Detail </a><br>
                        </div>
                            
                       </div>       
                          
                     
      
                  @endforeach
                </div>
              </div>
            <div class="col-sm-12">
                <div id="searchResult" class="row">
              </div>
            </div>
          
          <table style="width: 100%;margin-left:auto;margin-right:auto">
            <tr>
              <td style="width: 40%"></td>
              <td> {{ $perusahaan->links('vendor.pagination.bootstrap-4') }}</td>
              <td style="width: 40%"></td>
            </tr>
          </table>
</div>
@endsection

<script type="text/javascript">
$(document).ready(function(){
  
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })
  $('#inputSearch').on('keyup', function(){
    $inputSearch = $(this).val();
    if($inputSearch == ''){
      document.getElementById("full").style.display="block";
      $('#searchResult').html('');
      $('#searchResult').show('');
      document.getElementById("searchResult").style.display="none";
    }else{
      document.getElementById("full").style.display="none";
      $.ajax({
        method:"post",
        url:'search',
        data:JSON.stringify({
          inputSearch:$inputSearch
        }),
        headers:{
          'Accept':'application/json',
          'Content-Type':'application/json'
        },
        success: function(data){
      
          var searchResultAjax='';
          data = JSON.parse(data);
          console.log(data);
          $('#searchResult').show();
          for(let i=0; i<data.length;i++){
            searchResultAjax+=
             `   <div class="col-sm-4 d-flex" onload="readHitung({{$perusahaans->id_perusahaan}})" >
                      <div class="card card-body flex-fill">
                        <div class="row">
                        <div class="col-sm-3">
                          <img class="img-fluid" src="./logo/`+data[i].logo+`" alt="" style="width:auto;margin-top:5px">
                        </div>
                        <div class="col-sm-9">
                          <table>
                            <tr>
                            <td>`+data[i].nama+`</td>
                          </tr>
                          <tr>
                            <td><span style="color: grey">`+data[i].kota+`</span></td>
                          </tr>
                          </table>
                        </div>
                        </div>
                        <br>
                        <ul class="fa-ul">
                          <li><i class="fa-li fa fa-building"></i>`+data[i].industri+`</li>
                          <li><i id="lowongan"></i></li>
                           
                          </ul>
                          <a href="{{url('/detailperusahaan')}}/`+data[i].id_perusahaan+`" style="width:100%;" class="btn btn-primary">Detail </a><br>
                        </div>
                            
                       </div>       
                          `
          }
          $('#searchResult').html(searchResultAjax);
        },
        
      })
    }
  })
})
</script>

<script type="text/javascript">

    
    function readHitung(id) {
        $.get("{{ url('perusahaan/readHitung') }}/" +id, {}, function(data) {
           $("#lowongan").html(data);  

        });
    }
</script>