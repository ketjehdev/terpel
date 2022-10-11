
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
        aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="{{ route('home') }}">
        <h4>Terpel</h4>
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{ asset('img/profil_picture/'.auth()->user()->gambar) }}">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Halo!</h6>
            </div>
            <a href="{{ route('myProfil') }}" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>Profilku</span>
            </a>

            <div class="dropdown-divider"></div>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="btn dropdown-item">
                <i class="ni ni-user-run"></i>
              <span>Logout</span>
              </button>
            </form>
          </div>

        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="{{ route('home') }}">
                <h4>Terpel.</h4>
              </a>
            </div>

            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>

        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item @if($page == 'dash') active @endif">
            <a class="nav-link @if($page == 'dash') active @endif" href="{{ route('home') }}">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item @if($page == 'mu') active @endif">
            <a class="nav-link @if($page == 'mu') active @endif" href="{{ route('manageUsers') }}">
              <i class="fa fa-user-plus text-blue"></i> 
              Manage Users
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./examples/maps.html">
              <i class="fa fa-book text-orange"></i> Manage Materi
            </a>
          </li>

          <li class="nav-item @if($page == 'cp') active @endif">
            <a class="nav-link @if($page == 'cp') active @endif" href="{{ route('changePassword') }}">
              <i class="fa fa-key text-yellow"></i> Ganti Password
            </a>
          </li>

          
          <li class="nav-item @if($page == 'mp') active @endif">
            <a class="nav-link @if($page == 'mp') active @endif" href="{{ route('myProfil') }}">
              <i class="ni ni-single-02 text-success"></i> Profilku
            </a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
