@extends('layouts/v_template')
@section('title')
Portal Kerja
@endsection
@section('page')

@endsection

@section('content')

<br>
<br>
<br>
<div class="card col-md-2 offset-md-5">
  <div class="icon-demo d-flex align-items-center justify-content-center p-3 py-6">
    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
    </svg>
    <i class="bi bi-person-fill"></i>
    </div>
    <p style="text-align: center">Pelamar</p>
    <p style="text-align: center">{{ $lamaran }}</p>
  </div>
</div>
@endsection
