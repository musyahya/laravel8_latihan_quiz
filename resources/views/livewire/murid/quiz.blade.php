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
                        <th>Benar</th>
                        <th>Nilai</th>
                        <th>Status</th>
                        <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quiz as $item)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->benar}} / {{App\Models\Soal::where('quiz_id', $item->quiz_id)->count()}}</td>
                            <td>{{$item->nilai}} / 100</td>
                            <td>
                                @if ($item->status == 1)
                                    <span class="badge badge-success">Selesai dikerjakan</span>
                                @else
                                    <span class="badge badge-danger">Belum dikerjakan</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    @if ($item->status == 1)
                                    <button wire:click="lihat_jawaban({{$item->quiz_id}})" class="btn btn-sm btn-primary ml-2">Lihat jawaban</button>
                                    @else
                                    <button wire:click="soal({{$item->quiz_id}})" {{($item->status == 1) ? 'disabled' : ''}} class="btn btn-sm btn-primary">Kerjakan</button>
                                    @endif
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
