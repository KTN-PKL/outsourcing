@extends('layouts/v_template')
@section('title')
Portal Kerja
@endsection
@section('page')
@endsection

@section('content')
<br>
<br>
<a class="btn btn-primary" href="#"><i class="fa fa-plus"></i>  Tambah Perusahaan</a>
<br>
<br>
<div style="width:700px" class="card">
  <table style="width:700px" class="table table-bordered table-hover">
    <tr>
      <th style="width:50px">No</th>
      <th>Nama Perusahaan</th>
      <th>Industri</th>
      <th>Status</th>
      <th style="width:200px">Action</th>
    </tr>
    @php
        $i=0;
    @endphp
    @foreach($perusahaan as $perusahaans)
    @php
        $i=$i+1;
    @endphp
    <tr>
    <td>{{$i}}</td>
    <td>{{$perusahaans->nama}}</td>
    <td>{{$perusahaans->industri}}</td>
    @if ($perusahaans->status == 1)
    <td>Verified</td>      
    @else
    <td>Not Verified</td>
    @endif
    
    <td>
      <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail{{$perusahaans->id_perusahaan}}">
        Detail
      </button>
      <a href="#" class="btn btn-sm btn-warning">Edit</a>
      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete">
        Delete
      </button>
    </td>
  </tr>
@endforeach
  </table>

</div>

@endsection
                  <!-- Modal Delete -->
                  @foreach ($perusahaan as $perusahaans)                  
                  <div class="modal fade" id="detail{{$perusahaans->id_perusahaan}}">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title">{{$perusahaans->nama}}</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('perusahaan.lowongan.destoy', $lowongans->id_lowongan) }}" class="btn btn-outline-success float-left">Verifikasi</a>
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal Verifikasi</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                  </div>
                  @endforeach


{{-- @section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">

<script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('template')}}/dist/js/demo.js"></script>

<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
   
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-6 col-12">
        <!-- small box -->
      </div>
    </div>  
</div> 
</div>     --}}


