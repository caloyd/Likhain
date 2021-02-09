<nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell" style="font-size: 27px;"></i>
          <span class="badge badge-danger navbar-badge">{{$leave}}</span>
        </a>
         <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="/employee/leave-request" class="dropdown-item">
            <i class="fas fa-calendar mr-2"></i> {{$leave}} Leave notification
          </a>
        </div>
      </li>

      {{-- <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Employee<span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="">
                Logout
              </a>
          </div>
      </li> --}}
    </ul>
  </nav>
