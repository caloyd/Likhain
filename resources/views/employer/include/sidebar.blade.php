<aside class="main-sidebar elevation-1 sidebar-dark-navy">
    <!-- Brand Logo -->
    <a href="/employer/dashboard" class="brand-link">
    <img src="{{asset('img/dist/likhain-white.png')}}" alt="" class="brand-image img-circle">
    <span class="brand-text font-weight-light">LIKHAIN WORKS</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            @if(is_null(Auth::user()->employer->avatar_image_path))
            <img src="{{asset('img/dist/employer.png')}}" class="img-circle" alt="">
            @else
            <img src="/profile/{{Auth::user()->employer->avatar_image_path}}" class="img-circle" alt="">
            @endif
            </div>
            <div class="info">
            <a href="/employer/profile" class="d-block">{{Auth::user()->first_name}} {{\Illuminate\Support\Str::limit(Auth::user()->middle_name,1, $end='.')}} {{Auth::user()->last_name}}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/employer/dashboard" class="nav-link" id="dashboard">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/employer/applicant-search" class="nav-link" id="app-search">
                        <i class="nav-icon fas fa-search"></i>
                        <p>Applicant Search</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/employer/job-post" class="nav-link" id="job-post">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>Job Post</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/employer/applicant-interview" class="nav-link" id="app-interview">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Applicant Interview</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/employer/job-offers" class="nav-link" id="job-offers">
                        <i class="nav-icon fas fa-scroll"></i>
                        <p>Job Offers</p>
                    </a>
                </li>
                @if(Auth::user()->user_type_id == 3)
                <li class="nav-item">
                    <a href="/employer/employer-staff" class="nav-link" id="employer-list">
                        <i class="nav-icon fas fa-address-card" ></i>
                        <p>Employer Staff List</p>
                    </a>
                </li>
                @endif
                <li class="nav-item has-treeview" id="menu-sidebar">
                    <a href="#" class="nav-link" id="employee">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Employee
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/employer/employee-list" class="nav-link" id="employee-list">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Employee List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/employer/leave-request" class="nav-link" id="leave-req">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Leave Request</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/employer/applicant-feedback" class="nav-link" id="app-feedback">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Applicant Feedback</p>
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
                            <a href="/employer/profile" class="nav-link" id="profile">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        @if(Auth::user()->user_type_id == 3)
                        <li class="nav-item">
                        <a href="/employer/company-details" class="nav-link" id="company-details">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Company Details</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="/employer/company-verification" class="nav-link" id="company-verification">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Company Verification</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/employer/change-password" class="nav-link" id="change-pass">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/employer/deactivate" class="nav-link" id="deactivate">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Deactivate Account</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/applicant/2fa" class="nav-link" id="two-fa">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Setup 2FA</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    {{-- <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"> --}}
                    <a class="nav-link" id="logout" href="#">
                        <i class="nav-icon fas fa-power-off"></i>
                            <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('employer.logout.employer') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
