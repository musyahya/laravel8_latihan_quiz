@extends('adminlte/app')
@section('title', 'Soal')

@section('content')
    <livewire:guru.soal></livewire:guru.soal>
@endsection

@section('style')
    <!-- summernote -->
    <link rel="stylesheet" href="/adminlte/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('script')
    <!-- Summernote -->
    <script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
    $(function () {
        // Summernote
        $('.summernote').summernote({
            height: 200,
        })
    })
    </script>
@endsection