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
      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#wawancara{{$lowongans->id_lowongan}}">
        Link Wawancara
      </button>
    </td>
  </tr>
@endforeach
  </table>

</div>

@endsection
                

                  {{-- Modal Detail Loker --}}
                    <!-- Modal Detail Loker -->
                    @foreach ($lowongan as $lowongans)                  
                    <div class="modal fade" id="wawancara{{$lowongans->id_lowongan}}">
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

                                    </div>
                                  </div>

                                </div>
                              </div>
                             
                          </div>
                          <!-- /.modal-content -->
                      </div>
                    </div>
                    @endforeach



