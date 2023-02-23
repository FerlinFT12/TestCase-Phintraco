  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('dist/img/phintraco-logo.png') }}" alt="PhintracoLogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link">{{ date('l, d F Y'); }}</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a id="time" class="nav-link"></a>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <!-- User Profile Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
          <li>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="dropdown-item">Logout </buttton>
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-phinter elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
    <img src="{{ asset('dist/img/phintraco-logo.png') }}" alt="Phintraco Group Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Phintraco</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <div class="departmen">SM Sales</div>
          <div class="nama">{{ Auth()->user()->name }}</div>
          <div class="jabatan">Tier 3</div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fa fa-dollar-sign"></i> <p>
                Finance
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approval List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ (request()->segment(1) == 'user') ? 'active' : '' }}">
            <a href="{{ route('user.index') }}" class="nav-link text-white">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item {{ (request()->segment(1) == 'project') ? 'active' : '' }}">
            <a href="{{ route('project.index') }}" class="nav-link text-white">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Project
              </p>
            </a>
          </li>
          <li class="nav-item {{ (request()->segment(1) == 'presensi') ? 'active' : '' }}">
            <a href="{{ route('presensi.index') }}" class="nav-link text-white">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Presensi
              </p>
            </a>
          </li>
          <li class="nav-item {{ (request()->segment(1) == 'spd') ? 'active' : '' }}">
            <a href="{{ route('spd.index') }}" class="nav-link text-white">
              <i class="nav-icon fas fa-th"></i>
              <p>
                SPD
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>