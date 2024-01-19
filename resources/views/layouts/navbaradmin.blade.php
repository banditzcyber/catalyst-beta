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
                    <h6 class="tx-semibold mg-b-0 tx-uppercase">{{ auth()->user()->employee_name }}</h6>
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
                    {{-- <li class="nav-item"><a href="" class="nav-link"><i data-feather="edit"></i> <span>Edit
                                Profile</span></a></li>
                    <li class="nav-item"><a href="" class="nav-link"><i data-feather="user"></i> <span>View
                                Profile</span></a></li>
                    <li class="nav-item"><a href="" class="nav-link"><i data-feather="settings"></i>
                            <span>Account Settings</span></a></li>
                    <li class="nav-item"><a href="" class="nav-link"><i data-feather="help-circle"></i>
                            <span>Help Center</span></a></li> --}}
                    <li class="nav-item">
                        <form action="/signout" method="POST" onclick="return confirm('Are you sure?')">
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

            <li class="nav-item {{ request()->is('dashboardFunct*') ? 'active' : '' }}">
                <a href="/dashboardFunct" class="nav-link">
                    <i data-feather="shopping-bag"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-label mg-t-25">Master Data</li>

            <li class="nav-item {{ request()->is('competency') ? 'active' : '' }}">
                <a href="/competency" class="nav-link">
                    <i data-feather="clipboard"></i> <span>Competency</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('performance*') ? 'active' : '' }}">
                <a href="/performance" class="nav-link">
                    <i data-feather="file"></i> <span>Performance Standard</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('items*') ? 'active' : '' }}">
                <a href="/items" class="nav-link">
                    <i data-feather="file-text"></i> <span>Learning Item</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('matrix*') ? 'active' : '' }}">
                <a href="/matrix" class="nav-link">
                    <i data-feather="activity"></i> <span>Profile Matrix</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('employees*') ? 'active' : '' }}">
                <a href="/employees" class="nav-link">
                    <i data-feather="users"></i> <span>Employees</span>
                </a>
            </li>

            <li class="nav-label mg-t-25">Functional Activity</li>

            <li class="nav-item {{ request()->is('assessmentAdmin*') ? 'active' : '' }}">

                <a href="/assessmentAdmin" class="nav-link">
                    <i data-feather="shopping-bag"></i> <span>Assessment</span>
                </a>
            </li>
            <li class="nav-item mg-t-25 {{ request()->is('aldpAdmin*') ? 'active' : '' }}">
                <a href="/aldpAdmin" class="nav-link">
                    <i data-feather="shopping-bag"></i> <span>ALDP</span>
                </a>
            </li>
            <li class="nav-item mt-25 {{ request()->is('closegap*') ? 'active' : '' }}">
                <a href="/closegap" class="nav-link">
                    <i data-feather="shopping-bag"></i> <span>Close Gap Activity</span>
                </a>
            </li>


            <li class="nav-label mg-t-25">Configuration</li>

            <li class="nav-item mt-25 {{ request()->is('userlogin*') ? 'active' : '' }}">
                <a href="/userlogin" class="nav-link">
                    <i data-feather="settings"></i> <span>User Login</span>
                </a>
            </li>
            {{-- <li class="nav-item with-sub">
                <a href="" class="nav-link"><i data-feather="user"></i> <span>Functional Competency</span></a>
                <ul>
                    <li><a href="page-profile-view.html">Assessment</a></li>
                    <li><a href="page-connections.html">ADLP</a></li>
                    <li><a href="page-groups.html">Close Gap</a></li>
                    <li><a href="page-events.html">Events</a></li>
                </ul>
            </li>
            <li class="nav-item with-sub">
                <a href="" class="nav-link"><i data-feather="file"></i> <span>Core and Leadership</span></a>
                <ul>
                    <li><a href="page-timeline.html">Timeline</a></li>
                </ul>
            </li> --}}

        </ul>
    </div>
</aside>
