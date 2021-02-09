<nav class="main-header navbar navbar-expand navbar-dark navbar-cyan">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown notif">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell" style="font-size: 27px;"></i>
            <span class="badge badge-danger navbar-badge notif-badge">
                @php ($t = $interview_app + $app_count + $job_offer_count) @endphp
                {{$t}}
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="/employer/applicant-search" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> {{$app_count}} Applicants
            </a>
            <a href="/employer/applicant-interview" class="dropdown-item">
                <i class="fas fa-calendar-plus mr-2"></i> {{$interview_app}} Interview update
            </a>
            <a href="/employer/job-offers" class="dropdown-item">
                <i class="fas fa-scroll mr-2"></i> {{$job_offer_count}} Job Offer
            </a>
        </div>
        </li>
    <li class="nav-item dropdown">
        {{-- <p class="mb-0 px-4 py-2 text-white">
            {{ Auth::user()->first_name }}
        </p> --}}
        {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" id="logoutNav" href="#">
                Logout
            </a>
        </div> --}}
    </li>
    </ul>
</nav>
