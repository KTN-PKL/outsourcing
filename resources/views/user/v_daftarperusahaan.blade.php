<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('layouts.v_templateregister')
@section('content1') 
<br>
<br> 
<div class="container">
<h2>DAFTAR PERUSAHAAN</h2>
{{-- <div class="jumbotron p-5 rounded-3"> --}}
  {{-- <section id="search" class="search py-5"> --}}
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
  {{-- </section> --}}
            <div class="col-md-12" id="full">
               
              <div class="row" id="full">
              @foreach ($perusahaan as $perusahaans)
                  <div class="col-md-3 ">
                    <div class="card">
                      <img src="{{asset('/logo/'. $perusahaans->logo)}}" width="250" height="200" style="display:block; margin:auto;" alt=>
                    </div>
                    <div class="card-header">
                    <h6  class="card-title">{{ $perusahaans->nama }}</h6><br><br>{{ $perusahaans->alamat }}<br><a href="/detailperusahaan/{{ $perusahaans->id_perusahaan }}" class="btn btn-primary">Detail</a>
                  </div> </div>
  
              @endforeach
            </div>
            </div>
            <div class="col-md-12">
                
                <div id="searchResult" class="row">
              </div>
              
              
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
          var gambar='';
          var searchResultAjax='';
          data = JSON.parse(data);
          console.log(data);
          $('#searchResult').show();
          for(let i=0; i<data.length;i++){
            gambar="'/logo/"+data[i].logo+"'";
            searchResultAjax+=
             `<div class="col-md-3 ">
              <div class="card">
                <img src="./logo/`+data[i].logo+`" width="250" height="200" style="display:block; margin:auto;" alt=></div> 
                <div class="card-header">
                  <h6 id="searchResult" class="card-title">`+data[i].nama+`</h6>
                  <br><br>`+data[i].alamat+`
                  <br><a href="/detailperusahaan/`+data[i].id_perusahaan+`" class="btn btn-primary">Detail</a>
                  </div>
                </div>`
          }
          $('#searchResult').html(searchResultAjax);
        },
        
      })
    }
  })
})
</script>