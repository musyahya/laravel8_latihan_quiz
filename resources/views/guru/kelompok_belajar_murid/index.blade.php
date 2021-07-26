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

@section('header')


        <!-- Select2 -->
        <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <!-- Theme style -->
        {{-- <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css"> --}}

@endsection

@section('script')

    <!-- jQuery -->
    {{-- <script src="/adminlte/plugins/jquery/jquery.min.js"></script> --}}
    <!-- Bootstrap 4 -->
    {{-- <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
    <!-- Select2 -->
    <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
    <!-- AdminLTE App -->
    {{-- <script src="/adminlte/dist/js/adminlte.min.js"></script> --}}

    <script>
         //Initialize Select2 Elements
        $('.select2').select2()

    </script>

@endsection