<aside class="aside aside-fixed">
    <div class="aside-header">
        <a href="../../index.html" class="aside-logo">
            <img src="/images/logo_mycatalyst_full.png" width="170" alt="">
        </a>
        <a href="" class="aside-menu-link">
            <i data-feather="menu"></i>
            <i data-feather="x"></i>
        </a>
    </div>
    <div class="aside-body">
        <div class="aside-loggedin">
            <div class="d-flex align-items-center justify-content-start">
                <a href="" class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle"
                        alt=""></a>
            </div>
            <div class="aside-loggedin-user">
                <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2"
                    data-toggle="collapse">
                    <h6 class="tx-semibold tx-14 mg-b-0">{{ auth()->user()->employee_name }}</h6>
                    <i data-feather="chevron-down"></i>
                </a>
                <p class="tx-color-03 tx-12 mg-b-0">
                    @if (auth()->user()->role_id == 1)
                        Employee
                    @elseif (auth()->user()->role_id == 2)
                        Section Manager
                    @elseif (auth()->user()->role_id == 3)
                        Department Manager
                    @elseif (auth()->user()->role_id == 4)
                        General Manager
                    @elseif (auth()->user()->role_id == 5)
                        Admin Functional
                    @elseif (auth()->user()->role_id == 6)
                        Root
                    @endif
                </p>
            </div>
            <div class="collapse" id="loggedinMenu">
                <ul class="nav nav-aside mg-b-0">
                    <li class="nav-item"><a href="" class="nav-link"><i data-feather="edit"></i> <span>Edit
                                Profile</span></a></li>
                    <li class="nav-item"><a href="" class="nav-link"><i data-feather="user"></i> <span>View
                                Profile</span></a></li>
                    <li class="nav-item"><a href="" class="nav-link"><i data-feather="settings"></i>
                            <span>Account Settings</span></a></li>
                    <li class="nav-item"><a href="" class="nav-link"><i data-feather="help-circle"></i>
                            <span>Help Center</span></a></li>
                    <li class="nav-item">
                        <form action="/logout" method="POST" onclick="return confirm('Are you sure?')">
                            @csrf
                            <button type="submit" class="nav-link dropdown-item">
                                <i data-feather="log-out"></i>
                                <span>Sign Out</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div><!-- aside-loggedin -->

        {{-- --------------------------------------------------menu---------------------------------------------- --}}
        <ul class="nav nav-aside">
            <li class="nav-label">Main Menu</li>

            <li class="nav-item {{ request()->is('departmentDashboard*') ? 'active' : '' }}">

                <a href="/departmentDashboard" class="nav-link">
                    <i data-feather="pie-chart"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item mg-t-25 {{ request()->is('departAldp*') ? 'active' : '' }}">
                <a href="/assessmentValidationDepartment" class="nav-link">
                    <i data-feather="clipboard"></i> <span>ALDP</span>
                </a>
            </li>
            <li class="nav-item mg-t-25 {{ request()->is('assessmentValidationDepartment*') ? 'active' : '' }}">
                <a href="/assessmentValidationDepartment" class="nav-link">
                    <i data-feather="check-square"></i> <span>Assessment Verify</span>
                </a>
            </li>

            <li class="nav-item mg-t-25 {{ request()->is('departSubordinate*') ? 'active' : '' }}">
                <a href="/departSubordinate" class="nav-link">
                    <i data-feather="users"></i> <span>Subordinate</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
