@extends('layouts.v_templateregister')
@section('content1') 
<br>
<br> 
<h2>DAFTAR PERUSAHAAN</h2>
<div class="jumbotron p-5 rounded-3">
    <div class="container py-4">
            <div class="col-md-6">
                
                <div class="row">
                    @foreach($perusahaan as $perusahaans)
                  <div class="col-md-6 col-xs-3">
                    <div class="card">
                        <br>
                        <img src="./template2/landingpage/img/ktn.png" alt="">
                                 <div class="card-body">
                             <h6 class="card-title">{{$perusahaans->name}}</h6>
                             <br>
                             <br>
                            <i class="fa fa-map-marker-alt me-3 mt-3" aria-hidden="true">{{$perusahaans->alamat}}</i><br>
                                   </div>
                    </div>
                        </div>  
                        @endforeach 
                
              </div>
              
              
            </div>
          </div>
    </div>

</div>
@endsection