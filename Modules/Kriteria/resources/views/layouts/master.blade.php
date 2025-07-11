@extends('layouts.default')
@section('title', 'Kriteria')
@section('content')
  <!-- begin breadcrumb -->
  <ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Kriteria</a></li>
    <li class="breadcrumb-item active"><a href="javascript:;">Data</a></li>
  </ol>
  <!-- end breadcrumb -->
  <!-- begin page-header -->
  <h1 class="page-header">Data <small>{{ $title }}</small></h1>
  <!-- end page-header -->

  @yield('module-content')
@endsection
