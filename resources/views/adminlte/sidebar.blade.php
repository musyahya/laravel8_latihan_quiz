<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Laravel Quiz</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/cekrole" class="nav-link @yield('active-dashboard')">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">MASTER</li>
          @role('guru')
              <li class="nav-item">
                  <a href="/quiz" class="nav-link @yield('active-quiz')">
                    <i class="fas fa-copy"></i>
                    <p>
                      Quiz
                    </p>
                  </a>
                </li>
              <li class="nav-item">
                  <a href="/semua_murid" class="nav-link @yield('active-semua-murid')">
                    <i class="fas fa-users"></i>
                    <p>
                      Semua Murid
                    </p>
                  </a>
                </li>
          @endrole

          @role('murid')
            <li class="nav-item">
              <a href="/quiz/murid" class="nav-link @yield('active-quiz')">
                <i class="fas fa-users"></i>
                <p>
                  Quiz
                </p>
              </a>
            </li>
          @endrole
 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>