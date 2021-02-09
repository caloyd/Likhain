<nav class="main-header navbar navbar-expand navbar-dark navbar-success">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars nav-icon"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell nav-icon"></i>
            <span class="badge badge-danger navbar-badge">
                @php ($total = $joboffer + $interview)
                @endphp
                {{$total}}
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="/applicant/job-offers" class="dropdown-item">
            <i class="fas fa-scroll mr-2"></i> {{$joboffer}} Job offer
            </a>
            <a href="/applicant/interview" class="dropdown-item">
                <i class="fas fa-phone mr-2"></i> {{$interview}} Interview
            </a>
        </li>

        {{-- <li class="nav-item">
            <p class="mb-0 px-4 py-2 text-white">
                {{ Auth::user()->first_name }}
            </p> --}}

            {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" id="logoutNav" href="#">
                Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div> --}}
        {{-- </li> --}}
    </ul>
</nav>
