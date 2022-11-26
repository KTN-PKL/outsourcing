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
    <h5 class="modal-title" id="exampleModalLabel">Buat Lowongan</h5>
  </div>
  <form method="POST" action="{{ route('perusahaan.lowongan.store') }}">
      @csrf
    <div class="modal-body">
      <div id="alert"></div>
      <div class="mb-3">
        <label class="form-label">Tipe Pekerjaan</label>
        <select type="text" class="form-select" name="tipe">
            <option value="Pilih Pengalaman Kerja" selected disabled>-- Pilih Tipe Pekerjaan --</option>
            <option value="Magang">Magang</option>
            <option value="Part-time">Part-time</option>
            <option value="Full-time">Full-time</option>
            <option value="Freelance">Freelance</option>
        </select>
    </div>

      <div class="mb-3">
        <label class="form-label">Posisi</label>
        <input type="text" class="form-control @error('posisi') is-invalid @enderror" value="{{ old('posisi') }}" name="posisi" placeholder="Posisi ...">
        @error('posisi')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
   @enderror
    </div>
      <div class="row mb-3">                       
        <label class="form-label">Jobdesk</label>
        <div class="col-md-16">
         <textarea name="jobdesk" class="my-editor form-control  @error('jobdesk') is-invalid @enderror" id="my-editor1" cols="30" rows="10">{{ old('jobdesk') }}</textarea>
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
         <textarea name="kualifikasi" class="my-editor form-control  @error('kualifikasi') is-invalid @enderror" id="my-editor" cols="30" rows="10">{{ old('kualifikasi') }}</textarea>
         @error('kualifikasi')
         <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
         </span>
    @enderror
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Skill</label>
        <input type="text" class="form-control  @error('skill') is-invalid @enderror" value="{{ old('skill') }}" name="skill" placeholder="Skill ...">
         @error('skill')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
         @enderror
    </div>
    <div class="row mb-3">                       
        <label class="form-label">Tunjangan dan Keuntungan</label>
        </div>
        <div class="col-md-16">
         <textarea name="benefit" class="my-editor form-control  @error('benefit') is-invalid @enderror" id="my-editor2" cols="30" rows="10">{{ old('benefit') }}</textarea>
         @error('benefit')
         <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
         </span>
    @enderror
        </div>
        <div>
          <input type="checkbox" name="statustnk" value="tampil">
        <label>Tampilkan Tunjangan dan Keuntungan</label><br/><br/>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Pengalaman Kerja</label>
        <select type="text" class="form-select" name="pengalaman">
            <option value="Pilih Pengalaman Kerja" selected disabled>-- Pilih Pengalaman Kerja --</option>
            <option value="Kurang Dari 1 Tahun">Kurang Dari 1 Tahun</option>
            <option value="1-3 Tahun">1-3 Tahun</option>
            <option value="3-5 Tahun">3-5 Tahun</option>
            <option value="5-10 Tahun">5-10 Tahun</option>
            <option value="Lebih dari 10 Tahun">Lebih dari 10 Tahun</option> 
        </select>
    </div>

    <div id="show" class="mb-3">
        <label class="form-label">Gaji</label>
        <input type="text" class="form-control  @error('gaji') is-invalid @enderror" value="{{ old('gaji') }}" name="gaji" placeholder="Gaji ...">
         @error('gaji')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
         @enderror
    </div>
    <input type="checkbox" name="statusgaji" value="tampilkangaji">
        <label>Tampilkan Gaji</label><br/><br/>
    </div>
    <div class="modal-footer">
      {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
      <div id="tombol_login">
        <input class="btn btn-primary" type="submit" value="Buat">
      </div>
    </div>
  </form>
</div>
    </div>
</div>
</div>
    <!-- For demo purpose -->
    

{{-- <script>
     function dis1() {
    document.getElementById("show").style.display="block";
    document.getElementById("tampil").style.display="none";
    document.getElementById("hidden").style.display="block";
     }
     function dis2() {
    document.getElementById("show").style.display="none";
    document.getElementById("tampil").style.display="block";
    document.getElementById("hidden").style.display="none";
     }
</script>    --}}
   
    

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
    
@endsection
@push('scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('my-editor');
    CKEDITOR.replace('my-editor1');
    CKEDITOR.replace('my-editor2');
    </script>
@endpush