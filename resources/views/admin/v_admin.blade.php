@extends('layouts/v_template')
@section('title')
Portal Kerja
@endsection
@section('page')

@endsection

@section('content')
@section('page')
@if (session('error'))
<div class="alert alert-success" role="alert">
    {{ session('error') }}
</div>
@endif
Halaman Beranda
@endsection
