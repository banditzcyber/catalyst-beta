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

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="/css/dashforge.css">
    <link rel="stylesheet" href="/css/dashforge.dashboard.css">
    <link rel="stylesheet" href="/css/style-cyber.css">

</head>

<body>

    @if (auth()->user()->role_id == 1)
        @include('layouts.navbaremployee')
    </ul>
</div>
</aside>

    @elseif (auth()->user()->role_id == 2)
        @include('layouts.navbaremployee')
        @include('layouts.navbarsection')
    @elseif (auth()->user()->role_id == 3)
        @include('layouts.navbardepart')
    @elseif (auth()->user()->role_id == 4)
        @include('layouts.navbardivisi')
    @elseif (auth()->user()->role_id == 5)
        @include('layouts.navbaradmin')
    @elseif (auth()->user()->role_id == 6)
        @include('layouts.navbaradmin') @endif

    <div class="content
        ht-50v pd-0">
    <div class="content-header">
        <div class="content-search">
            <i data-feather="search"></i>
            <input type="search" class="form-control" placeholder="Search...">
        </div>
        <nav class="nav">
            <a href="" class="nav-link"><i data-feather="help-circle"></i></a>
            <a href="" class="nav-link"><i data-feather="grid"></i></a>
            <a href="" class="nav-link"><i data-feather="align-left"></i></a>
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

    <script src="/js/dashforge.js"></script>
    <script src="/js/dashforge.aside.js"></script>
    <script src="/js/dashforge.sampledata.js"></script>

    <!-- append theme customizer -->
    <script src="/lib/js-cookie/js.cookie.js"></script>
    <script src="/js/dashforge.settings.js"></script>
    <script src="/lib/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="/lib/cleave.js/cleave.min.js"></script>
    <script src="/lib/cleave.js/addons/cleave-phone.us.js"></script>
    @stack('scripts')


    </body>

</html>
