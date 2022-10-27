@extends('layouts.v_templateUser')
@section('content1')
@endsection
@section('content2') 
<div style="margin-left:2em;margin-right:2em;" class="jumbotron p-5 rounded-3">
        <div style="width:600px;" class="card">
            <table style="width:600px" class="table table-bordered table-hover">
              <tr>
                <th>No</th>
                <th>Perusahaan</th>
                <th>Posisi</th>
              </tr>
              @foreach($lamaran as $lamarans)
              <tr>
              <td>1</td>
              <td>{{$lamarans->nama}}</td>
              <td>{{$lamarans->posisi}}</td>
            </tr>
              @endforeach        
            </table>
          
          </div>
                    
                    
                </div>
            </table>
             

            </div>
    </div>
</div>  
@endsection          