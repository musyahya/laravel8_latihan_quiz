@if (session()->has('sukses'))
    <div class="alert alert-success" role="alert">
        {{ session('sukses') }}
    </div>
@endif
@if (session()->has('gagal'))
    <div class="alert alert-danger" role="alert">
        {{ session('gagal') }}
    </div>
@endif