@extends('layouts.v_templateregister')
@section('content1') 
<br>
<br> 
<div class="container">
<h2>DAFTAR PERUSAHAAN</h2>
{{-- <div class="jumbotron p-5 rounded-3"> --}}
  
            <div class="col-md-12">
                
                <div class="row">
                    @foreach($perusahaan as $perusahaans)
                  <div class="col-md-3 ">
                    <div class="card">
                        <img src="{{asset('/logo/'. $perusahaans->logo)}}" width="250" height="200" style="display:block; margin:auto;" alt="">
                        </div>
                            <div class="card-header">
                                <h6 class="card-title">{{$perusahaans->name}}</h6>
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