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
            @if(is_null(Auth::user()->employee->employee_picture_path))
            <img src="{{asset('img/dist/employer.png')}}" class="img-circle" alt="">
            @else
            <img src="/profile/{{Auth::user()->employee->employee_picture_path}}" class="img-circle" alt="">
            @endif
            </div>
            <div class="info">
                <a href="/employee/profile" class="d-block">{{Auth::user()->first_name}} {{\Illuminate\Support\Str::limit(Auth::user()->middle_name,1, $end='.')}} {{Auth::user()->last_name}}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/employee/dashboard" class="nav-link" id="dashboard">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/employee/attendance" class="nav-link" id="attendanceDetails">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>Attendance</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/employee/salary" class="nav-link" id="salaryDetails">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>Salary Details</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/employee/leave-request" class="nav-link" id="leaveRequestPage">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Leave Request</p>
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
                            <a href="/employee/profile" class="nav-link" id="profile">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/employee/change-password-employee" class="nav-link" id="change-pass">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/employee/two-factor-authentication" class="nav-link" id="two-fa">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Setup 2FA</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Deactivate account</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="logout" href="#">
                        <i class="nav-icon fas fa-power-off"></i>
                                <p>Logout</p>
                    </a>
                    <form id="logoutForm" action="{{ route('employee.logout.employee') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>