@extends('layouts.default')
@section('title', 'Penilaian')
@push('css')
  <style>
    .custom-range {
      width: 100%;
      height: 8px;
      border-radius: 5px;
      background: linear-gradient(to right, #28a745 0%, #ccc 0%);
      appearance: none;
      outline: none;
    }

    .custom-range::-webkit-slider-thumb {
      appearance: none;
      width: 18px;
      height: 18px;
      border-radius: 50%;
      background: #28a745;
      cursor: pointer;
      margin-top: -5px;
    }

    .range-labels span {
      font-size: 0.8rem;
      width: 10%;
      text-align: center;
    }
  </style>
@endpush

@section('content')
  <!-- begin breadcrumb -->
  <ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Penilaian</a></li>
    <li class="breadcrumb-item active"><a href="javascript:;">Data</a></li>
  </ol>
  <!-- end breadcrumb -->
  <!-- begin page-header -->
  <h1 class="page-header">Data <small>{{ $title }}</small></h1>
  <!-- end page-header -->

  @yield('module-content')
@endsection
