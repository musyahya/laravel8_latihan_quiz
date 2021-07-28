<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-header">
                {{\App\Models\User::find(session('murid_id'))->name}}

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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quiz as $item)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->benar}} / {{\App\Models\Quiz::find($item->quiz_id)->soal->count()}}</td>
                            <td>{{$item->nilai}} / 100</td>
                            <td>
                                @if ($item->status == 1)
                                    <span class="badge badge-success">Sudah Dikerjakan</span>    
                                @else
                                    <span class="badge badge-danger">Belum Dikerjakan</span>    
                                @endif
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
