@extends('layouts.v_templateregister')
@section('content1') 
<br>
<br> 
<br>
<h2>LAMARAN SAYA</h2>
<div class="jumbotron p-5 rounded-3">
    <div class="container py-4">
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
                    
                </div>
            </table>
             

            </div>
    </div>
</div>            