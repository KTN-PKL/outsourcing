<div class="table-responsive" style="width:100%;background-color:white;" id="f5">
    <table class="table">

      <thead>
      <tr>
        <th>No</th>
        <th>Perusahaan</th>
        <th>Posisi</th>
        <th>Status</th>
      </tr>
    </thead>

    <tbody>
      @php
      $i = 0;
       @endphp
      @foreach($lamaran as $lamarans)
      <tr>
      @php
        $i = $i+1;
       @endphp
      <td>{{ $i }}</td>
      <td>{{$lamarans->nama}}</td>
      <td>{{$lamarans->posisi}}</td>
      <td>
      @if ($lamarans->status == "Diterima")
        <span class="badge badge-success">Diterima di perusahaan</span>
      @elseif ($lamarans->status == "Lulus")
          <span class="badge badge-warning">Tahap Wawancara</span>
      @else
          <span class="badge badge-primary">Dalam Review</span> 
      @endif
      </td>
    </tr>
      @endforeach  
    </tbody>      
    </table>
</div> 