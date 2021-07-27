@extends('adminlte/app')
@section('title', 'Murid')

@section('content')
    <livewire:guru.kelompok-belajar-murid></livewire:guru.kelompok-belajar-murid>

      {{-- <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
        <option>Alabama</option>
        <option>Alaska</option>
        <option>California</option>
        <option>Delaware</option>
        <option>Tennessee</option>
        <option>Texas</option>
        <option>Washington</option>
        </select> --}}
@endsection

<!-- Select2 -->
{{-- @section('header')
        <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection

@section('script')
    <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

    <script>
        $('.select2').select2()
    </script>

@endsection --}}