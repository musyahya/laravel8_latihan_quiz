<div class="row">
    <div class="col-12">

        @include('adminlte/flash')
        @include('guru/kelompok_belajar/tambah')
        @include('guru/kelompok_belajar/edit')
        {{-- @include('guru/kelompok_belajar/hapus') --}}
        
        <div class="card">
            <div class="card-header">
            <button wire:click="tambah" class="btn btn-sm btn-primary">Tambah</button>

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                <input wire:model="search" type="search" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                    </button>
                </div>
                </div>
            </div>
            </div>
            <div class="card-body table-responsive">

                @if ($kelompok_belajar->isNotEmpty())

                    <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Kelompok Belajar</th>
                        <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelompok_belajar as $item)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                <div class="btn-group">
                                    <button wire:click="lihat_soal({{$item->id}})" class="btn btn-sm btn-info mr-2">Lihat Siswa</button>
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
                    Data tidak ditemukan
                    </div>

                @endif

            </div>

        </div>
        
        {{$kelompok_belajar->links()}}

    </div>
</div>
