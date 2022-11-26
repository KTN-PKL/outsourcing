@extends('layouts/v_template')
@section('title')
Portal Kerja
@endsection
@section('page')

@endsection

@section('content')
<div class="container" >
  @if($perusahaan->status == null)
  <div class="row">
    <div class="col-md-12">
        <div class="card">
<div class="modal-header">
<h3><b>Form Verifikasi Perusahaan</b></h3>
</div>
{{-- Start Form Verifikasi --}}
<form enctype="multipart/form-data" method="POST" action="{{ route('perusahaan.verifikasi') }}">
@csrf
    <div style="margin-left:2em;margin-right:2em;margin-top:1em" class="mb-3">
      <label class="form-label">NPWP</label>
      <input type="text" class="form-control @error('npwp') is-invalid @enderror" value="{{ old('npwp') }}" name="npwp" placeholder="Masukkan Nomor Pokok Wajib Pajak">
      @error('npwp')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
    </div>

    <div style="margin-left:2em;margin-right:2em" class="mb-3">
      <!-- Upload PDF input-->
      <label class="form-label">NIB</label>
          <input type="file" onchange="readURL(this);" class="form-control  @error('nib') is-invalid @enderror"  name="nib">
          @error('nib')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
    </div>

    <div style="margin-left:2em;margin-right:2em" class="mb-3">
      <!-- Upload PDF input-->
      <label class="form-label">KTP Penanggung Jawab</label>
          <input type="file" onchange="readURL(this);" class="form-control  @error('ktp') is-invalid @enderror"  name="ktp">
          @error('ktp')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </div>

      <div style="margin-left:2em;margin-right:2em" class="mb-3">
        <!-- Upload image input-->
          <label class="form-label"> Foto Depan Kantor </label>
            <input type="file" onchange="readURL(this);" class="form-control @error('fotodepan') is-invalid @enderror"  name="fotodepan">
            @error('fotodepan')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>  

      <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <div style="margin-left:2em;margin-right:2em" class="mb-3">
            <!-- Upload image input-->
            <label class="form-label"> Foto Sisi Kiri Kantor <small style="color: gray">opsional</small></label>
                <input type="file" onchange="readURL(this);" class="form-control @error('fotokiri') is-invalid @enderror"  name="fotokiri">
                @error('fotokiri')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
          </div>  
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <div style="margin-left:2em;margin-right:2em" class="mb-3">
            <!-- Upload image input-->
            <label class="form-label"> Foto Sisi Kanan Kantor <small style="color: gray">opsional</small></label>
                <input type="file" onchange="readURL(this);" class="form-control @error('fotokanan') is-invalid @enderror"  name="fotokanan">
                @error('fotokanan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
          </div>      
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <div style="margin-left:2em;margin-right:2em" class="mb-3">
            <!-- Upload image input-->
            <label class="form-label"> Foto Belakang Kantor <small style="color: gray">opsional</small></label>
                <input type="file" onchange="readURL(this);" class="form-control @error('fotobelakang') is-invalid @enderror"  name="fotobelakang">
                @error('fotobelakang')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
          </div>     
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <div style="margin-left:2em;margin-right:2em" class="mb-3">
            <!-- Upload image input-->
            <label class="form-label"> Foto Dalam Kantor <small style="color: gray">opsional</small> </label>
                <input type="file" onchange="readURL(this);" class="form-control @error('fotodalam') is-invalid @enderror"  name="fotodalam">
                @error('fotodalam')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
          </div>  
          </div>           
        </div>
      </div>
            
      <div style="margin-left:2em;margin-right:2em" class="mb-3">
            <!-- Upload image input-->
            <label class="form-label"> PKP <small style="color: gray">opsional</small></label>
                <input type="file" onchange="readURL(this);" class="form-control  @error('fotokantor') is-invalid @enderror "  name="pkp">
                @error('pkp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
      </div> 
                               
      <div class="row">
            <div class="col-md-12 offset-md-5">
                <button style="margin-bottom: 2em;padding:10px 24px;" type="submit" class="btn btn-primary">
                    {{ __('Kirim') }}
                </button>
            </div>
      </div>
        </div>
    </div>
</div>
  @else
  @if ($perusahaan->status == "1")
  <div class="card-header col-md-2 offset-md-5">   
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
      <h4>Anda Sedang dalam Peninjauan Dokumen Verifikasi</h4>
  @endif
@endif
@endsection

