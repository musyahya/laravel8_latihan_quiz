<div class="row">
    <div class="col-12">

        @include('adminlte/flash')
        @include('guru/kelompok_belajar_murid/tambah')
        {{-- @include('guru/kelompok_belajar_murid/edit') --}}
        {{-- @include('guru/kelompok_belajar_murid/hapus') --}}
        
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

                <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Murid</th>
                    <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @forelse ($kelompok_belajar_murid->user as $item)
                        <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                            <div class="btn-group">
                                <button wire:click="hapus({{$item->id}})" class="btn btn-sm btn-danger">Hapus</button>
                            </div>
                        </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center"><strong class="text-danger">Tidak ada data</strong></td>
                        </tr>
                    @endforelse
                </tbody>
                </table>

            </div>

        </div>
        
    </div>
</div>
