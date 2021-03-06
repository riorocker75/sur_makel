 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/')}}" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

     
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
          {{-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> --}}
        </div>
      </li>
    
       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-wrench mr-2"></i>Pengaturan
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> Profil
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{url('/logout')}}" class="dropdown-item">
            <i class="fas fa-lock mr-2"></i> Keluar
          </a>
         
        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->


  {{-- sidebar mulai --}}
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{url('/')}}/logo/logo.png" alt="UPTD PUSKESMAS" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">UPTD PUSKESMAS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       
        <div class="info">
          <a href="#" class="d-block">{{" Nama" }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{url('/kapus/pasien')}}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pasien
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="{{url('/kapus/pegawai')}}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pegawai
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

            <li class="nav-item">
            <a href="{{url('/kapus/poli')}}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Poli
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

            <li class="nav-item">
            <a href="{{url('/kapus/rujukan')}}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Rujukan
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

            
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>