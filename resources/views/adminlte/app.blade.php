
<!DOCTYPE html>
<html lang="en">
<head>
    @yield('style')
    @include('adminlte/header')
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    @livewireStyles
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

 @include('adminlte/preloader')

    @include('adminlte/navbar')

  @include('adminlte/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('title')</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        {{-- @if(Session::has('sukses'))
            <div class="alert alert-success">
                {{Session::get('sukses')}}
            </div>
        @endif --}}

        @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 @include('adminlte/footer')

</div>
<!-- ./wrapper -->

  @include('adminlte/script')
  @yield('script')
 @livewireScripts
</body>
</html>
