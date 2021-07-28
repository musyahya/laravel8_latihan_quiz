@extends('adminlte/app')
@section('title', 'Dashboard')
@section('active-dashboard', 'active')

@section('content')
     <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
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
          <div class="col-lg-4 col-6">
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
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$guru}}</h3>

                <p>Guru</p>
              </div>
              <div class="icon">
               <i class="fas fa-users"></i>
              </div>
            </div>
          </div>
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

@section('header')
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/adminlte/plugins/jqvmap/jqvmap.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/adminlte/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('script')
  <!-- jQuery UI 1.11.4 -->
  <script src="/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- ChartJS -->
  <script src="/adminlte/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="/adminlte/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="/adminlte/plugins/moment/moment.min.js"></script>
  <script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="/adminlte/dist/js/pages/dashboard.js"></script>
@endsection