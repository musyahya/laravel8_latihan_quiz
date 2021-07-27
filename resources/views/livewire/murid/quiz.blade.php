<div class="row">
    <div class="col-12">

        @include('adminlte/flash')

        <div class="card">
            <div class="card-header">

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
                        <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quiz as $item)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                <div class="btn-group">
                                    <button wire:click="soal({{$item->id}})" class="btn btn-sm btn-primary">Kerjakan</button>
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
