<div class="row">
    <div class="col-12">

    @include('adminlte/flash')
    {{-- @include('guru/quiz/tambah')
    @include('guru/quiz/edit')
    @include('guru/quiz/hapus') --}}

    <div class="card">
        <div class="card-header">
        <button wire:click="tambah" class="btn btn-sm btn-primary">Tambah</button>

        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
                </button>
            </div>
            </div>
        </div>
        </div>
        <div class="card-body table-responsive">

        @if ($soal->isNotEmpty())

            <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                <th>No</th>
                <th>Soal</th>
                <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($soal as $item)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->soal}}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-info mr-2">Lihat Soal</button>
                            <button wire:click="edit({{$item->id}})" class="btn btn-sm btn-primary mr-2">Edit</button>
                            <button wire:click="hapus({{$item->id}})" class="btn btn-sm btn-danger">Hapus</button>
                        </div>
                    </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        @else

            <div class="alert alert-danger" role="alert">
            Quiz tidak memiliki soal
            </div>

        @endif

        </div>
    </div>

    {{$soal->links()}}

    </div>
</div>
