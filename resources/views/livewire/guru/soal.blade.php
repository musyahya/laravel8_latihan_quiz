<div class="row">
    <div class="col-12">

    @include('adminlte/flash')
    @include('guru/soal/hapus')
    
    <div class="row">
        <div class="col-md-9">
            <a href="/soal/create" class="btn btn-sm btn-primary mb-3">Tambah</a>
        </div>
        <div class="col-md-3">
            <input wire:model="search" type="search" class="form-control" placeholder="Search">
        </div>
    </div>

    @if ($soal_quiz->isNotEmpty())
        @foreach ($soal_quiz as $item)
            <div class="card">
                <div class="card-header">
                    Soal {{$this->page}}
                    <div class="btn-group float-right">
                        <button wire:click="hapus({{$item->id}})" class="btn btn-sm btn-danger ml-2">Hapus</button>
                        <a href="/soal/{{$item->id}}/edit" class="btn btn-sm btn-primary ml-2">Edit</a>
                    </div>
                </div>
                <div class="card-body">
                    {!!$item->soal!!}
                </div>
            </div>
            <div class="card {{($item->jawaban == 'pilihan_a') ? 'border border-success' : ''}}">
                <div class="card-header">
                    Pilihan A
                </div>
                <div class="card-body">
                    {!!$item->pilihan_a!!}
                </div>
            </div>
            <div class="card {{($item->jawaban == 'pilihan_b') ? 'border border-success' : ''}}">
                <div class="card-header">
                    Pilihan B
                </div>
                <div class="card-body">
                    {!!$item->pilihan_b!!}
                </div>
            </div>
            <div class="card {{($item->jawaban == 'pilihan_c') ? 'border border-success' : ''}}">
                <div class="card-header">
                    Pilihan C
                </div>
                <div class="card-body">
                    {!!$item->pilihan_c!!}
                </div>
            </div>
            <div class="card {{($item->jawaban == 'pilihan_d') ? 'border border-success' : ''}}">
                <div class="card-header">
                    Pilihan D
                </div>
                <div class="card-body">
                    {!!$item->pilihan_d!!}
                </div>
            </div>
            <div class="card {{($item->jawaban == 'pilihan_e') ? 'border border-success' : ''}}">
                <div class="card-header">
                    Pilihan E
                </div>
                <div class="card-body">
                    {!!$item->pilihan_e!!}
                </div>
            </div>
        @endforeach

        {{$soal_quiz->links()}}
    @else
        <div class="alert alert-danger" role="alert">
        Quiz tidak memiliki soal
        </div>
    @endif

    </div>
</div>