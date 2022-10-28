@extends('layouts/v_template')
@section('title')
Portal Kerja
@endsection
@section('page')

@endsection

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-12">
          <div class="card">
<div class="modal-header">
  <h3><b>Form Verifikasi Perusahaan</b></h3>
</div>
<form method="POST" action="{{ route('perusahaan.lowongan.store') }}">
  @csrf
  <div style="margin-left:2em;margin-right:2em;margin-top:1em" class="mb-3">
    <label class="form-label">NPWP</label>
    <input type="text" class="form-control @error('posisi') is-invalid @enderror" value="{{ old('npwp') }}" name="npwp" placeholder="Masukkan Nomor Pokok Wajib Pajak">
    @error('npwp')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
@enderror
</div>

<div style="margin-left:2em;margin-right:2em;margin-top:1em" class="mb-3">
  <label class="form-label">NIB</label>
  <input type="text" class="form-control @error('posisi') is-invalid @enderror" value="{{ old('nib') }}" name="nib" placeholder="Masukkan Nomor Induk Berusaha">
  @error('nib')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror
</div>


              <div style="margin-left:2em;margin-right:2em" class="mb-3">
                <!-- Upload PDF input-->
                <label class="form-label">Akte Pendirian</label>
                    <input type="file" onchange="readURL(this);" class="form-control"  name="akta" placeholder="CV ...">
            
                        </div>

             <div style="margin-left:2em;margin-right:2em" class="mb-3">
              <!-- Upload image input-->
              <label class="form-label"> Foto Kantor </label>
                  <input type="file" onchange="readURL(this);" class="form-control"  name="fotokantor" placeholder="CV ...">
           
                       </div>       
                       
                 <div style="margin-left:2em;margin-right:2em" class="mb-3">
                        <!-- Upload image input-->
                        <label class="form-label"> Foto Kantor </label>
                            <input type="file" onchange="readURL(this);" class="form-control"  name="fotokantor" placeholder="CV ...">
                     
                                 </div>       
          </div>
      </div>
  </div>
</div> 
{{-- <div class="container" >
<div class="card-header col-md-2 offset-md-5">
  @if(auth()->user()->status==1)
  <div class="icon-demo d-flex align-items-center justify-content-center p-3 py-6">
    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
    </svg>
    <i class="bi bi-person-fill"></i>
    </div>
    <p style="text-align: center">Pelamar</p>
    <p style="text-align: center">{{ $lamaran }}</p>
   
</div>

@else
<h4><b>Form Verifikasi Perusahaan</b></h4>
@endif
</div> --}}
@endsection
