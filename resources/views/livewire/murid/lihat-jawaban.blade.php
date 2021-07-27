<div class="row">
    <div class="col-12">
    
    <div class="row justify-content-end mb-3">
        <div class="col-md-3">
            <div class="input-group mb-2">
                <input wire:model="search" type="search" class="form-control" placeholder="Search">
                <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-search"></i></div>
                </div>
            </div>
        </div>
    </div>

    @if ($soal->isNotEmpty())
        @foreach ($soal as $item)
            <div class="card">
                <div class="card-header">
                    Soal {{$this->page}}
                </div>
                <div class="card-body">
                    {{$item->soal}}
                    {{$item->soal->quiz_jawaban_murid}}
                </div>
            </div>
            <div  class="card pointer {{('pilihan_a' == 'pilihan_a') ? 'border border-primary' : ''}}">
                <div class="card-header">
                    Pilihan A
                </div>
                <div class="card-body">
                    {{$item->pilihan_a}}
                </div>
            </div>
            <div  class="card pointer {{('pilihan_a' == 'pilihan_b') ? 'border border-primary' : ''}}">
                <div class="card-header">
                    Pilihan B
                </div>
                <div class="card-body">
                    {{$item->pilihan_b}}
                </div>
            </div>
            <div  class="card pointer {{('pilihan_a' == 'pilihan_c') ? 'border border-primary' : ''}}">
                <div class="card-header">
                    Pilihan C
                </div>
                <div class="card-body">
                    {{$item->pilihan_c}}
                </div>
            </div>
            <div  class="card pointer {{('pilihan_a' == 'pilihan_d') ? 'border border-primary' : ''}}">
                <div class="card-header">
                    Pilihan D
                </div>
                <div class="card-body">
                    {{$item->pilihan_d}}
                </div>
            </div>
            <div  class="card pointer {{('pilihan_a' == 'pilihan_e') ? 'border border-primary' : ''}}">
                <div class="card-header">
                    Pilihan E
                </div>
                <div class="card-body">
                    {{$item->pilihan_e}}
                </div>
            </div>
        @endforeach

        <div class="row mt-3">
            <div class="col-md-10">
                {{$soal->links()}}
            </div>
            <div class="col-md-2">
                <button wire:click="selesai" class="btn btn-sm btn-primary float-right">Selesai Mengerjakan</button>
            </div>
        </div>
        
    @else
        <div class="alert alert-danger" role="alert">
        Quiz tidak memiliki soal
        </div>
    @endif

    </div>
</div>