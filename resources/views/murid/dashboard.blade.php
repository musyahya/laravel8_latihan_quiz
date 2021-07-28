@extends('adminlte/app')
@section('title', 'Dashboard')
@section('active-dashboard', 'active')

@section('content')
  <div class="row">
          <div class="col-md-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$quiz_selesai}}</h3>

                <p>Quiz Selesai</p>
              </div>
              <div class="icon">
                <i class="fas fa-copy"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-md-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$quiz_belum_selesai}}</h3>

                <p>Quiz Belum Dikerjakan</p>
              </div>
              <div class="icon">
                <i class="fas fa-copy"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h5>Quiz Terbaru</h5>
                </div>
                <div class="card-body table-responsive">

                    @if ($quiz_terbaru->isNotEmpty())

                        <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama Quiz</th>
                            <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quiz_terbaru as $item)
                                <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nama}}</td>
                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge badge-success">Selesai</span>    
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
          </div>
        </div>
@endsection