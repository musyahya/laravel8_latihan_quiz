@extends('adminlte/app')
@section('title', 'Ganti Password')

@section('content')
    @include('adminlte/flash')

    <form action="/gantipassword" method="post">
        @csrf
        <input type="hidden" value="gantipassword" name="status">
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="ulangi_password">Ulangi Password</label>
            <input type="password" class="form-control" id="ulangi_password" name="password_confirmation">
            @error('password_confirmation')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection