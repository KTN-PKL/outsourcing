@extends('layouts/v_template')
@section('title')
Portal Kerja
@endsection

@section('content')

<br>
<br>
<div class="row">
<div class="card col-md-2 offset-md-3">
  <div class="icon-demo d-flex align-items-center justify-content-center p-3 py-6">
  <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
    <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
  </svg>
  <i class="bi bi-building"></i>
  </div>
  <p style="text-align: center"><b>Perusahaan</b></p>
  <p style="text-align: center">{{ $perusahaan }}</p>
</div>
<div class="card col-md-2 offset-md-2">
  <div class="icon-demo d-flex align-items-center justify-content-center p-3 py-6">
    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
    </svg>
    <i class="bi bi-person-fill"></i>
    </div>
    <p style="text-align: center"><b>Pelamar</b></p>
    <p style="text-align: center">{{ $pelamar }}</p>
  </div>
</div>
</div>
@endsection
