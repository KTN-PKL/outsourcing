@extends('layouts/v_template')
@section('title')
Portal Kerja
@endsection
@section('page')
<a href="{{url('admin/lowongan')}}">Daftar Lowongan</a> / Jobdesk
@endsection
@section('content')

<h2 style="margin-left: 1em" ><b>Jobdesk</h2>
<br>
<div style="width:900px;margin-left:2em" class="card">
  <table style="width:900px" class="table table-bordered table-hover">
    <tr>
      <th style="width:50px">No</th>
      <th>Posisi</th>
      <th style="width:450px" >Jobdesk</th>
      <th style="width:150px">Action</th>
    </tr>
    @php
        $i=0;
    @endphp
   
    @foreach($lowongan as $lowongans)
    @php
        $i=$i+1;
    @endphp
    <tr>
    <td>{{$i}}</td>
    <td>{{$lowongans->posisi}}</td>
    <td>@php
        echo $lowongans->jobdesk;
    @endphp</td>
    <td>
      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#lokerDetail{{$lowongans->id_lowongan}}">
        Detail
      </button>
    </td>
  </tr>
@endforeach
  </table>
  <table style="width: 100%;margin-left:auto;margin-right:auto">
    <tr>
      <td style="width: 40%"></td>
      <td> {{ $lowongan->links('vendor.pagination.bootstrap-4') }}</td>
      <td style="width: 40%"></td>
    </tr>
  </table>
</div>

@endsection
                  <!-- Modal Delete -->
                  @foreach ($lowongan as $lowongans)                  
                  <div class="modal fade" id="delete{{$lowongans->id_lowongan}}">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content bg-danger">
                            <div class="modal-header">
                                <h6 class="modal-title">{{$lowongans->posisi}}</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda Ingin Menghapus Loker<b>{{$lowongans->posisi}} ?</b>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('perusahaan.lowongan.destoy', $lowongans->id_lowongan) }}" class="btn btn-outline-light pull-left">Yes</a>
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                  </div>
                  @endforeach

                  {{-- Modal Detail Loker --}}
                    <!-- Modal Detail Loker -->
                    @foreach ($lowongan as $lowongans)                  
                    <div class="modal fade" id="lokerDetail{{$lowongans->id_lowongan}}">
                      <div class="modal-dialog modal-sm-12">
                          <div class="modal-content modal-sm-12">
                              <div class="modal-header">
                                  <h6 class="modal-title">{{$lowongans->posisi}}</h6>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                <div class="desc">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <h5>Skill</h5>
                                      <h6>{{$lowongans->skill}}</h6>

                                    </div>
                                    <div class="col-md-6">
                                      <h5>Jobdesk</h5>
                                      <h6>@php echo $lowongans->jobdesk; @endphp</h6>

                                    </div>
                                    

                                  </div>

                                </div>
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


