@extends('adminlte/app')
@section('title', 'Quiz')
@section('active-quiz', 'active')

@section('content')
     <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <button class="btn btn-sm btn-primary">Tambah</button>

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
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                @if ($quiz->isNotEmpty())
                     <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Quiz</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($quiz as $item)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-info mr-2">Lihat Soal</button>
                                    <button class="btn btn-sm btn-primary mr-2">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </div>
                            </td>
                            </tr>
                       @endforeach
                    </tbody>
                    </table>
                @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
@endsection