<aside class="main-sidebar elevation-1 sidebar-light-navy">
    <!-- Brand Logo -->
    <a href="/applicant/dashboard" class="brand-link">
    <img src="{{asset('img/dist/likhain-logo.png')}}" alt="" class="brand-image img-circle">
    <span class="brand-text font-weight-light">LIKHAIN WORKS</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            @if(is_null(Auth::user()->applicant->avatar_image_path))
                <img src="{{asset('img/dist/applicant.png')}}" class="img-circle" alt="">
            @else
                <img src="/profile/{{Auth::user()->applicant->avatar_image_path}}" class="img-circle" alt="">
            @endif

            </div>
            <div class="info">
            <a href="/applicant/profile" class="d-block">{{Auth::user()->first_name}} {{\Illuminate\Support\Str::limit(Auth::user()->middle_name,1, $end='.')}} {{Auth::user()->last_name}}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('applicant.dashboard') }}" class="nav-link" id="dashboard">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('applicant.profile.index') }}" class="nav-link" id="profile">
                        <i class="nav-icon fas fa-user"></i>
                        <p>My profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/applicant/saved-jobs" class="nav-link" id="saved-jobs">
                        <i class="nav-icon fas fa-bookmark"></i>
                        <p>Saved jobs</p>
                    </a>
                </li>
                <li class="nav-item">
                <a href="/applicant/job-applications" class="nav-link" id="job-applications">
                        <i class="nav-icon fas fa-scroll"></i>
                        <p>Job applications</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/applicant/interview" class="nav-link" id="interviews">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Interviews</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/applicant/job-offers" class="nav-link" id="job-offers">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>Job offers</p>
                    </a>
                </li>
                <li class="nav-item has-treeview" id="accnt-sidebar">
                    <a href="#" class="nav-link" id="accnt-sett">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Account Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('applicant.changepassword') }}" class="nav-link" id="change-pass">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/applicant/2fa" class="nav-link" id="two-fa">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Setup 2FA</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('applicant.deactivate') }}" class="nav-link" id="deact">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Deactivate account</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="logout" href="#">
                        <i class="nav-icon fas fa-power-off"></i>
                            <p>Logout</p>
                    </a>
                    <form id="logOutSidenav" action="{{ route('applicant.logout.applicant') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
