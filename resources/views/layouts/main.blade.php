<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="#">

    <title>{{ $title }} | MyCatalyst</title>

    <!-- vendor css -->
    <link
        href="/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="/lib/jqvmap/jqvmap.min.css" rel="stylesheet">
    <link href="/lib/ion-rangeslider/css/ion.rangeSlider.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="/css/dashforge.css">
    <link rel="stylesheet" href="/css/dashforge.dashboard.css">
    <link rel="stylesheet" href="/css/style-cyber.css">
    <link rel="stylesheet" href="/css/dashforge.demo.css">
    {{-- <link href="/lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.semanticui.css" /> --}}




</head>

<body>

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
                        @php
                            $query = DB::table('');
                        @endphp
                        <h6 class="tx-semibold tx-14 mg-b-0">{{ $employeeSession->employee_name }}</h6>
                        <i data-feather="chevron-down"></i>
                    </a>
                    <p class="tx-color-03 tx-12 mg-b-0">

                        {{-- @if (auth()->user()->role_id == 1)
                            Employee
                        @elseif (auth()->user()->role_id == 2)
                            Section Manager
                        @elseif (auth()->user()->role_id == 3)
                            Department Manager
                        @elseif (auth()->user()->role_id == 4)
                            General Manager
                        @elseif (auth()->user()->role_id == 5)
                            Admin Functional
                        @else
                            Root @endif --}}

                        {{ $employeeSession->position }}


                    </p>
                </div>
                <div class="collapse" id="loggedinMenu">
                    <ul class="nav nav-aside mg-b-0">

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



                @if ($area == 'azure')
                    @if ($employeeSession->job_level == 'SM')
                        @include('layouts.navbarsection')
                    @else
                        @include('layouts.navbaremployee') @endif
                @else
                    @if ($roleId == 1)
                        @include('layouts.navbaremployee')
                    @elseif ($roleId == 2)
                        @include('layouts.navbarsection')
                    @elseif ($roleId == 3)
                        @include('layouts.navbardepart')
                    @elseif ($roleId == 4)
                        @include('layouts.navbardivisi')
                    @elseif ($roleId == 5)
                        @include('layouts.navbaradmin')
                    @elseif ($roleId == 6)
                        @include('layouts.navbaradmin') @endif @endif


                {{-- @if ($employeeSession->job_level == 'SM')
        @include('layouts.navbarsection')
        @else
        @include('layouts.navbaremployee') @endif --}}



            </ul>
        </div>
    </aside>

    <div class="content
        ht-50v pd-0">
    <div class="content-header">
        <div class="content-search">
            {{ date('l, d F Y') }}
        </div>
        <nav class="nav">
            <form action="/signout" method="POST" onclick="return confirm('Are you sure?')">
                @csrf
                <button type="submit" class="nav-link dropdown-item">
                    <i data-feather="power"></i>
                </button>
            </form>
        </nav>
    </div><!-- content-header -->
    <div class="content-body">
        <div class="container pd-x-0">


            @yield('body')
        </div><!-- container -->
    </div>
    </div>

    <script src="/lib/jquery/jquery.min.js"></script>
    <script src="/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/feather-icons/feather.min.js"></script>
    <script src="/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/lib/jquery.flot/jquery.flot.js"></script>
    <script src="/lib/jquery.flot/jquery.flot.stack.js"></script>
    <script src="/lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="/lib/chart.js/Chart.bundle.min.js"></script>
    <script src="/lib/jqvmap/jquery.vmap.min.js"></script>
    <script src="/lib/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="/lib/jqueryui/jquery-ui.min.js"></script>

    <script src="/js/dashforge.js"></script>
    <script src="/js/dashforge.aside.js"></script>
    <script src="/js/dashforge.sampledata.js"></script>

    <!-- append theme customizer -->
    <script src="/lib/js-cookie/js.cookie.js"></script>
    {{-- <script src="/js/dashforge.settings.js"></script> --}}
    {{-- <script src="/lib/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script> --}}
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="/lib/cleave.js/cleave.min.js"></script>
    <script src="/lib/cleave.js/addons/cleave-phone.us.js"></script>
    @stack('scripts')


    </body>

</html>
