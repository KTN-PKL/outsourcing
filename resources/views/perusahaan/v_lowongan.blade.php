@extends('layouts/v_template')
@section('title')
Portal Kerja
@endsection
@section('page')
Daftar Lowongan
@endsection

@section('content')

<h2 style="margin-left:1em" ><b>Daftar Lowongan</b></h2>

 
@if (session()->has('create'))
<div class="alert alert-success alert-block" id="alert">
  <button type="button" class="close" data-dismiss="alert">x</button>
      <strong>{{session()->get('create')}}</strong>
</div>
  @endif
  @if (session()->has('delete'))
<div class="alert alert-success alert-block" id="alert">
  <button type="button" class="close" data-dismiss="alert">x</button>
      <strong>{{session()->get('delete')}}</strong>
</div>
  @endif
  @if (session()->has('edit'))
  <div class="alert alert-success alert-block" id="alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{session()->get('edit')}}</strong>
  </div>
    @endif
    <br>
<a style="margin-left:2em" class="btn btn-primary" href="{{ route('perusahaan.lowongan.create') }}"><i class="fa fa-plus"></i>Tambah Loker</a>
<br>
<br>

<div style="width:500px;margin-left:2em;" class="card">
  <table style="width:500px" class="table table-bordered table-hover">
    <tr>
      <th style="width:50px">No</th>
      <th>Posisi</th>
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
    <td>
      <a href="{{ route('perusahaan.lowongan.edit', $lowongans->id_lowongan) }}" class="btn btn-sm btn-warning">Edit</a>
      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$lowongans->id_lowongan}}">
        Delete
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
                                Apakah Anda Ingin Menghapus Lowongan <b>{{$lowongans->posisi}} ?</b>
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


@endsection

