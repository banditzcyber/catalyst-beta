<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- <!doctype html>
<html lang="en"> --}}

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.png">

    <title>{{ $title }} | MyCatalyst</title>

    <!-- vendor css -->
    <link href="/lib/fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="/lib/jqvmap/jqvmap.min.css" rel="stylesheet">
    <link href="/lib/ion-rangeslider/css/ion.rangeSlider.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="/css/dashforge.css">
    <link rel="stylesheet" href="/css/dashforge.dashboard.css">
    <link rel="stylesheet" href="/css/style-cyber.css">
    <link rel="stylesheet" href="/css/dashforge.demo.css">
    <link rel="stylesheet" href="/css/datatables.min.css">


</head>

<body>

    <aside class="aside aside-fixed">
        <div class="aside-header">
            <a href="#" class="aside-logo">
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
                    <a href="" class="avatar">
                        <img src="/images/users.png" class="rounded-circle" alt="">
                    </a>
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

                        {{ $employeeSession->position }}


                    </p>
                </div>
                <div class="collapse" id="loggedinMenu">
                    <ul class="nav nav-aside mg-b-0">

                        <li class="nav-item">
                            <form action="/signout" method="POST">
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
                    @elseif ($employeeSession->job_level == 'DM')
                        @include('layouts.navbardepart')
                    @else
                        @include('layouts.navbaremployee')
                    @endif
                @else
                    @if ($roleId == 1)
                        @include('layouts.navbaremployee')
                    @elseif ($roleId == 2)
                        @include('layouts.navbarsection')
                    @elseif ($roleId == 3)
                        @include('layouts.navbardepart')
                    @elseif ($roleId == 4)
                        @include('layouts.navgeneral')
                    @elseif ($roleId == 5)
                        @include('layouts.navbaradmin')
                    @elseif ($roleId == 6)
                        @include('layouts.navbaradmin')
                    @endif
                @endif

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
                <form action="/signout" method="POST">
                    @csrf
                    <button type="submit" class="nav-link dropdown-item">
                        <i data-feather="power"></i>
                    </button>
                </form>
            </nav>
        </div><!-- content-header -->
        <div class="content-body pd-y-0">
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

    <script src="/js/datatables.min.js"></script>

    <!-- append theme customizer -->
    <script src="/lib/js-cookie/js.cookie.js"></script>
    {{-- <script src="/js/dashforge.settings.js"></script> --}}
    <script src="/lib/cleave.js/cleave.min.js"></script>
    <script src="/lib/cleave.js/addons/cleave-phone.us.js"></script>
    {{-- <script src="/vendor/apexcharts/apexcharts.js"></script> --}}
    <script src="{{ asset('vendor/apexcharts/apexcharts.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}

    <script nonce="{{ csp_nonce() }}">
        function close() {
            confirm("Are you sure!");
        }
    </script>

    @stack('scripts')

</body>

</html>
