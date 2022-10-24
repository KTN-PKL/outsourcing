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
            <input id="search" type="" name=""  class="form-control">
          </div>
        </div>
      </div>
    </div>
  {{-- </section> --}}
            <div class="col-md-12">
                
                <div class="row">
                    @foreach($perusahaan as $perusahaans)
                  <div class="col-md-3 ">
                    <div class="card">
                        <img src="{{asset('/logo/'. $perusahaans->logo)}}" width="250" height="200" style="display:block; margin:auto;" alt="">
                        </div>
                            <div class="card-header">
                                <h6 id="searchResult" class="card-title">{{$perusahaans->name}}</h6>
                                <br>
                                <br>
                                <i class="fa fa-map-marker-alt me-3 mt-3" aria-hidden="true">{{$perusahaans->alamat}}</i><br>
                            </div>
                    </div>  
                        @endforeach 
                
              </div>
              
              
            </div>
          </div>
    </div>

</div>
@endsection

<script type="text/javascript">
$(document).ready(function(){
  $('#inputSearch').on('keyup', function(){
    $inputSearch = $(this).val();
    if($inputSearch == ''){
      $('#searchResult').html('');
      $('#searchResult').hide('');
    }else{
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
          console.log(data);
        }
      })
    }
  })
})
</script>