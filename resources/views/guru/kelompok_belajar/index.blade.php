@extends('adminlte/app')
@section('title', 'Kelompok Belajar')
@section('active-kelompok-belajar', 'active')

@section('content')
    <livewire:guru.kelompok-belajar></livewire:guru.kelompok-belajar>
@endsection

@section('header')
    <!-- Select2 -->
  <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection

@section('script')
    <!-- Select2 -->
    <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
@endsection