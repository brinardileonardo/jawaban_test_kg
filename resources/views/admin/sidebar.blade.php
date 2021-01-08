  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a class="brand-link" href="{{ url('/') }}">
      <span class="brand-text font-weight-light">{{ config('app.name', 'Portal') }} - CMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="/home" class="d-block">Welcome, {{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/home" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/artikel" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Artikel</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>Master Data<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/category" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/status" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status Artikel</p>
                </a>
              </li>
            </ul>
            <li class="nav-item">
                <a href="/report" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>Report</p>
                </a>
              </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>