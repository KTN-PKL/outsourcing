@extends('layouts.v_template')
@section('content')

<style>
    #upload {
    opacity: 0;
}

#upload-label {
    position: absolute;
    top: 50%;
    left: 1rem;
    transform: translateY(-50%);
}

.image-area {
    border: 2px dashed rgba(255, 255, 255, 0.7);
    padding: 1rem;
    position: relative;
}

.image-area::before {
    content: 'Uploaded image result';
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 0.8rem;
    z-index: 1;
}

.image-area img {
    z-index: 2;
    position: relative;
}
</style>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit Lowongan</h5>
  </div>
  <form method="POST" action="{{ route('perusahaan.lowongan.update', $lowongan->id_lowongan) }}">
      @csrf
      <div class="modal-body">
        <div id="alert"></div>
        <div class="mb-3">
          <label class="form-label">Tipe Pekerjaan</label>
          <select type="text" class="form-select" name="tipe">
              <option value="Pilih Pengalaman Kerja" selected disabled>-- Pilih Tipe Pekerjaan --</option>
              @if($lowongan->tipe == "Magang")
              <option value="Magang" selected>Magang</option>
              <option value="Part-time">Part-time</option>
              <option value="Full-time">Full-time</option>
              <option value="Freelance">Freelance</option>
              @elseif($lowongan->tipe == "Part-time")
              <option value="Magang">Magang</option>
              <option value="Part-time" selected>Part-time</option>
              <option value="Full-time">Full-time</option>
              <option value="Freelance">Freelance</option>
              @elseif($lowongan->tipe == "Full-time")
              <option value="Magang">Magang</option>
              <option value="Part-time">Part-time</option>
              <option value="Full-time" selected>Full-time</option>
              <option value="Freelance">Freelance</option>
              @elseif($lowongan->tipe == "Freelance")
              <option value="Magang">Magang</option>
              <option value="Part-time">Part-time</option>
              <option value="Full-time">Full-time</option>
              <option value="Freelance" selected>Freelance</option>
              @endif
          </select>
      </div>
  
        <div class="mb-3">
          <label class="form-label">Posisi</label>
          <input type="text" class="form-control @error('posisi') is-invalid @enderror" value="{{$lowongan->posisi}}" name="posisi" placeholder="Posisi ...">
          @error('posisi')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
     @enderror
      </div>
        <div class="row mb-3">                       
          <label class="form-label">Jobdesk</label>
          <div class="col-md-16">
           <textarea name="jobdesk" class="my-editor form-control  @error('jobdesk') is-invalid @enderror" id="my-editor1" cols="30" rows="10">{{$lowongan->jobdesk}}</textarea>
           @error('jobdesk')
           <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
           </span>
      @enderror
          </div>
        </div>
        <div class="row mb-3">                       
          <label class="form-label">Kualifikasi</label>
          <div class="col-md-16">
           <textarea name="kualifikasi" class="my-editor form-control  @error('kualifikasi') is-invalid @enderror" id="my-editor" cols="30" rows="10">{{$lowongan->kualifikasi}}</textarea>
           @error('kualifikasi')
           <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
           </span>
      @enderror
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Skill</label>
          @php
              $skill = explode("+" , $lowongan->skill);
              $j = count($skill);
              $l = $j - 1;
          @endphp
          <input type="text" name="jumlah" value="{{ $j }}" id="jumlah" hidden>
          <div class="input-group col-md-6 mb-3">
          <input type="text" class="form-control" value="{{$skill[0]}}" name="skill" placeholder="Skill ...">
          @if ($j == 1)
          <span class="input-group-text" id={{ "T".$j }} type = "button" onclick="plus({{ $j }})"><i class="fa fa-plus"></i></span> 
          @endif
          </div>
          @for ($i = 1; $i < $l; $i++)
          <div class="input-group col-md-6 mb-3">
          <input type="text" class="form-control" value="{{$skill[$i]}}" name={{ "skill".$i }} placeholder="Skill ...">
          </div>
          @endfor
          @if ($j > 1)
          <div class="input-group col-md-6 mb-3">
            <input type="text" class="form-control" name={{ "skill".$l }} value="{{ $skill[$l] }}" placeholder="Skill ...">
            <span class="input-group-text" id={{ "T".$j }} type = "button" onclick="plus({{ $j }})"><i class="fa fa-plus"></i></span>
            </div>
          @endif
            <div id={{ "plus".$j }}></div>
           @error('skill')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
           @enderror
      </div>
      <div class="row mb-3">                       
          <label class="form-label">Tunjangan dan Keuntungan</label>
          <div class="col-md-16">
           <textarea name="benefit" class="my-editor form-control  @error('benefit') is-invalid @enderror" id="my-editor2" cols="30" rows="10">{{$lowongan->benefit}}</textarea>
           @error('benefit')
           <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
           </span>
      @enderror
          </div>
          <div>
            <input type="checkbox" name="statustnk" value="tampil" @if ($lowongan->statustnk == "Tampilkan")
            checked
            @endif>
          <label>Tampilkan Tunjangan dan Keuntungan</label><br/><br/>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Pengalaman Kerja</label>
          <select type="text" class="form-select" name="pengalaman">
              <option value="Pilih Pengalaman Kerja" disabled>-- Pilih Pengalaman Kerja --</option>
              @if($lowongan->pengalaman == 'Kurang Dari 1 Tahun')
              <option value="Kurang Dari 1 Tahun" selected>Kurang Dari 1 Tahun</option>
              <option value="1-3 Tahun">1-3 Tahun</option>
              <option value="3-5 Tahun">3-5 Tahun</option>
              <option value="5-10 Tahun">5-10 Tahun</option>
              <option value="Lebih dari 10 Tahun">Lebih dari 10 Tahun</option>
              @elseif($lowongan->pengalaman == '1-3 Tahun')
              <option value="Kurang Dari 1 Tahun" >Kurang Dari 1 Tahun</option>
              <option value="1-3 Tahun" selected>1-3 Tahun</option>
              <option value="3-5 Tahun">3-5 Tahun</option>
              <option value="5-10 Tahun">5-10 Tahun</option>
              <option value="Lebih dari 10 Tahun">Lebih dari 10 Tahun</option>
              @elseif($lowongan->pengalaman == '3-5 Tahun')
              <option value="Kurang Dari 1 Tahun" >Kurang Dari 1 Tahun</option>
              <option value="1-3 Tahun">1-3 Tahun</option>
              <option value="3-5 Tahun" selected>3-5 Tahun</option>
              <option value="5-10 Tahun">5-10 Tahun</option>
              <option value="Lebih dari 10 Tahun">Lebih dari 10 Tahun</option>
              @elseif($lowongan->pengalaman == '5-10 Tahun')
              <option value="Kurang Dari 1 Tahun" >Kurang Dari 1 Tahun</option>
              <option value="1-3 Tahun">1-3 Tahun</option>
              <option value="3-5 Tahun">3-5 Tahun</option>
              <option value="5-10 Tahun" selected>5-10 Tahun</option>
              <option value="Lebih dari 10 Tahun">Lebih dari 10 Tahun</option>
              @else
              <option value="Kurang Dari 1 Tahun" >Kurang Dari 1 Tahun</option>
              <option value="1-3 Tahun">1-3 Tahun</option>
              <option value="3-5 Tahun">3-5 Tahun</option>
              <option value="5-10 Tahun">5-10 Tahun</option>
              <option value="Lebih dari 10 Tahun" selected>Lebih dari 10 Tahun</option>
              @endif
          </select>
      </div>
  
      <div id="show" class="mb-3">
          <label class="form-label">Gaji</label>
          <input id="gajih" onkeyup="rupe()" type="text" class="form-control  @error('gaji') is-invalid @enderror" value="{{$lowongan->gaji}}" name="gaji" placeholder="Gaji ...">
           @error('gaji')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
           @enderror
      </div>
      @if($lowongan->statusgaji == "Tampilkan")
      <input type="checkbox" name="statusgaji" value="tampilkangaji" checked>
          <label>Tampilkan Gaji</label><br/><br/>
        @else
        <input type="checkbox" name="statusgaji" value="tampilkangaji">
        <label>Tampilkan Gaji</label><br/><br/>
        @endif
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
        <div id="tombol_login">
          <input class="btn btn-primary" type="submit" value="Edit">
        </div>
      </div>
  </form>
</div>
    </div>
</div>
</div>
    <!-- For demo purpose -->
    

    

<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

  

$(function () {
    $('#upload').on('change', function () {
        readURL(input);
    });
});

</script>
<script>
  function plus(id)
  {
    var x = id + 1;
    document.getElementById("T" + id).style.display="none";
    $("#jumlah").val(x)
    $("#plus" + id).html(`
    <div class="input-group col-md-6 mb-3">
    <input type="text" class="form-control" name="skill`+id+`" placeholder="Skill ...">
    <span class="input-group-text" id="T`+x+`" type = "button" onclick="plus(`+x+`)"><i class="fa fa-plus"></i></span>
    </div>
    <div id="plus`+x+`"></div>
    `);
  }
  function rupe()
  {
    var gajih = $("#gajih").val();
            var number_string = gajih.replace(/[^,\d]/g, '').toString(),
	        split = number_string.split(','),
	        sisa  = split[0].length % 3,
	        rupiah  = split[0].substr(0, sisa),
	        ribuan  = split[0].substr(sisa).match(/\d{3}/gi);
            if(ribuan){
	    	separator = sisa ? '.' : '';
		    rupiah += separator + ribuan.join('.');
	        }
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            $("#gajih").val(rupiah)
  }
</script> 
    
@endsection
@push('scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('my-editor');
    CKEDITOR.replace('my-editor1');
    CKEDITOR.replace('my-editor2');
    </script>
@endpush