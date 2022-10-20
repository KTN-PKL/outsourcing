@extends('layouts.v_templateregister')
@section('content1') 
<br>
<br> 
<h2>DAFTAR PERUSAHAAN</h2>
<div class="jumbotron p-5 rounded-3">
    <div class="container py-4">
        <div class="row">
            <div class="col-sm-6">
                
                <div class="row">
                    {{-- @foreach($lowongan as $lowongans) --}}
                  <div class="col-md-4 mb-3">
                    <div class="card shadow" style="margin-left: 1em; margin-top:1em;">
                                 <div class="card-body" style="width:12rem">
                             <p><img height="30px" width="60px" src="#" alt="logo">CV Kreasi Teknologi Nusantara</p> <br>
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