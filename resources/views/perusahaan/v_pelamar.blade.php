@extends('layouts/v_template')
@section('title')
Portal Kerja
@endsection
@section('page')
@endsection

@section('content')
<br>
<h3>DAFTAR PELAMAR</h3>
<br>
<div style="width:800px" class="card">
  <table style="width:800px" class="table table-bordered table-hover">
    <tr>
      <th>No</th>
      <th>Nama Pelamar</th>
      <th>Umur</th>
      <th>Jenis Kelamin</th>
      <th>Posisi</th>
      <th>Action</th>
    </tr>
    @foreach($lamaran as $lamarans)
    <tr>
    <td>1</td>
    <td>{{$lamarans->namapel}}</td>
    <td>{{$lamarans->umur}}</td>
    <td>{{$lamarans->gender}}</td>
    <td>{{$lamarans->posisi}}</td>
    <td><a class="btn btn-primary" href="#">Detail</a>
        <a href="#" class="btn btn-success">Lulus</a>   
        <a href="#" class="btn btn-danger">Tidak Lulus</a>
    </td>
  </tr>
    @endforeach

  </table>

</div>




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


  @endsection