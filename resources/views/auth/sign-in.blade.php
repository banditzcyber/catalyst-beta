@extends('layouts.loginLayout')

@section('container')
    <div class="content content-fixed content-auth-alt">
        <div class="container ht-100p">
            <div class="ht-100p d-flex flex-column align-items-center justify-content-center">

                <h5>Who are you ?</h5>

                <div class="tx-13 tx-lg-14 mg-b-40">
                    <a href="/connect" class="align-items-center wd-40 wd-sm-250">
                        <img src="/images/employee-2.png" class="img-fluid wd-100 wd-sm-200 mg-b-30 mg-r-10" alt="">
                    </a>

                    <a href="/formLogin" class="align-items-center wd-40 wd-sm-250">
                        <img src="/images/admin-2.png" class="img-fluid wd-100 wd-sm-200 mg-b-30" alt="">
                    </a>
                </div>
            </div>
        </div><!-- container -->
    </div><!-- content -->

    <footer class="footer">
        <div>
            <span>&copy; 2023 MyCatalyst </span>
            <span>Created by <a href="#">Chandra Asri</a></span>
        </div>
        <div>
            <nav class="nav">
                <a href="#" class="nav-link">Licenses</a>
                <a href=".#" class="nav-link">Change Log</a>
                <a href="#" class="nav-link">Get Help</a>
            </nav>
        </div>
    </footer>
@endsection
