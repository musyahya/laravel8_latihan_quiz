<div class="row">
    <div class="col-12">

        @include('adminlte/flash')
        @include('guru/quiz/tambah')
        @include('guru/quiz/edit')
        @include('guru/quiz/hapus')

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

                @if ($quiz->isNotEmpty())

                    <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Quiz</th>
                        <th>Status</th>
                        <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quiz as $item)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                @if ($item->status == 1)
                                    <span class="badge badge-success">Aktiv</span>    
                                @else
                                    <span class="badge badge-danger">Tidak Aktiv</span>    
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button wire:click="lihat_soal({{$item->id}})" class="btn btn-sm btn-info mr-2">Lihat Soal</button>
                                    <button wire:click="lihat_murid({{$item->id}})" class="btn btn-sm btn-info mr-2">Lihat Murid</button>
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
        
        {{$quiz->links()}}

    </div>
</div>
