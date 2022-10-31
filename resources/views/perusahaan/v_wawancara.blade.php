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
<div style="width:600px;margin-left:2em" class="card">
  <table style="width:600px" class="table table-bordered table-hover">
    <tr>
      <th style="width:50px">No</th>
      <th style="width:250px">Posisi</th>
      <th style="width:200px">Action</th>
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
      <a href="#" class="btn btn-sm btn-success">Jadwal</a>
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
                                  <form method="POST" action="{{ route('wawancara.link',$lowongans->id_lowongan) }}">
                                    @csrf
                              </div>
                              <div class="modal-body">
                                <div class="desc">
                                  <div class="row">
                                    <div class="mb-3">
                                      <label class="form-label">Link Wawancara</label>
                                      <input type="text" class="form-control" name="wawancara" placeholder="Masukan Link Wawancara" value="{{$lowongans->wawancara}}">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                
                                  <input class="btn btn-primary" type="submit" value="Input">
                               
                              </div>
                          </div>
                          
                        </form>
                          <!-- /.modal-content -->
                      </div>
                    </div>
                    @endforeach



