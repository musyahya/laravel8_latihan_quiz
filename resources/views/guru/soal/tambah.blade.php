@extends('adminlte/app')
@section('title', 'Tambah Soal')

@section('content')
   <form action="/soal" method="post" class="mb-3">
       @csrf
       <div class="form-group">
            <label for="soal">Soal</label>
            <textarea class="summernote" name="soal" id="soal">{!! old('soal') !!}</textarea>
            @error('soal')
                <small class="text-danger">{{ $message }}</small>
            @enderror
       </div>
       <div class="form-group">
            <label for="pilihan_a">Pilihan A</label>
            <textarea class="summernote" name="pilihan_a" id="pilihan_a">{!! old('pilihan_a') !!}</textarea>
            @error('pilihan_a')
                <small class="text-danger">{{ $message }}</small>
            @enderror
       </div>
       <div class="form-group">
            <label for="pilihan_b">Pilihan B</label>
            <textarea class="summernote" name="pilihan_b" id="pilihan_b">{!! old('pilihan_b') !!}</textarea>
            @error('pilihan_b')
                <small class="text-danger">{{ $message }}</small>
            @enderror
       </div>
       <div class="form-group">
            <label for="pilihan_c">Pilihan C</label>
            <textarea class="summernote" name="pilihan_c" id="pilihan_c">{!! old('pilihan_c') !!}</textarea>
            @error('pilihan_c')
                <small class="text-danger">{{ $message }}</small>
            @enderror
       </div>
       <div class="form-group">
            <label for="pilihan_d">Pilihan D</label>
            <textarea class="summernote" name="pilihan_d" id="pilihan_d">{!! old('pilihan_d') !!}</textarea>
            @error('pilihan_d')
                <small class="text-danger">{{ $message }}</small>
            @enderror
       </div>
       <div class="form-group">
            <label for="pilihan_e">Pilihan E</label>
            <textarea class="summernote" name="pilihan_e" id="pilihan_e">{!! old('pilihan_e') !!}</textarea>
            @error('pilihan_e')
                <small class="text-danger">{{ $message }}</small>
            @enderror
       </div>
       <div class="form-group">
            <label for="jawaban">Jawaban</label>
            <select class="form-control" id="jawaban" name="jawaban">
                <option {{old('jawaban') ? '' : 'selected disabled'}}>Pilihan Jawaban</option>
                <option {{old('jawaban') == 'pilihan_a' ? 'selected' : ''}} value="pilihan_a">Pilihan A</option>
                <option {{old('jawaban') == 'pilihan_b' ? 'selected' : ''}} value="pilihan_b">Pilihan B</option>
                <option {{old('jawaban') == 'pilihan_c' ? 'selected' : ''}} value="pilihan_c">Pilihan C</option>
                <option {{old('jawaban') == 'pilihan_d' ? 'selected' : ''}} value="pilihan_d">Pilihan D</option>
                <option {{old('jawaban') == 'pilihan_e' ? 'selected' : ''}} value="pilihan_e">Pilihan E</option>
            </select>
            @error('jawaban')
                <small class="text-danger">{{ $message }}</small>
            @enderror
       </div>
       <button type="submit" class="btn btn-primary">Tambah</button>
   </form>
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