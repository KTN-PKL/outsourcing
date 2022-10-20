@extends('layouts.v_templateregister')
@section('content1') 
<br>
<br> 
<h2>DAFTAR PERUSAHAAN</h2>
<div class="jumbotron p-5 rounded-3">
    <div class="container py-4">
            <div class="col-sm-6">
                
                <div class="row">
                    {{-- @foreach($lowongan as $lowongans) --}}
                  <div class="col-md-6 mb-6">
                    <div class="card shadow col-md-12" style="margin-left: 1em; margin-top:1em;">
                        <br>
                        <img src="./template2/landingpage/img/ktn.png" alt="">
                                 <div class="card-body" style="width:18rem">
                             <h6>CV Kreasi Teknologi Nusantara</h6> <br>
                            <i class="fa fa-map-marker-alt me-3 mt-3" aria-hidden="true">Subang</i><br>
                                   </div>
                    </div>
                        </div>   
                
              </div>
              
              
            </div>
          </div>
    </div>

</div>
@endsection