@extends('adminlte/app')
@section('title', 'Dashboard')
@section('active-dashboard', 'active')

@section('content')
     <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$quiz}}</h3>

                <p>Quiz</p>
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
                <h3>{{$murid}}</h3>

                <p>Murid</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        
        <div class="row">
          <div class="col-md-6">
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
                                        <span class="badge badge-success">Aktiv</span>    
                                    @else
                                        <span class="badge badge-danger">Tidak Aktiv</span>    
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
          <div class="col-md-6">
             <div class="card">
                <div class="card-header">
                  <h5>Murid Terbaru</h5>
                </div>
                <div class="card-body table-responsive">

                    @if ($murid_terbaru->isNotEmpty())

                        <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama Murid</th>
                            <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($murid_terbaru as $item)
                                <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{date_format(date_create($item->created_at),"d-M-Y")}}</td>
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