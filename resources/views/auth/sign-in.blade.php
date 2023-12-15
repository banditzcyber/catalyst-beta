@extends('layouts.loginLayout')

@section('container')
    <div class="content content-fixed content-auth-alt">



        <div class="row justify-content-center">
            <div class="col-lg-3 col-sm-4">

                <main class="form-signin tx-center">

                    <div class="row-xs">
                        <div class="col-6">
                            hallo
                        </div>
                    </div>

                    <div class="tx-13 mg-t-20 tx-center">Don't have an account? <a href="/register">Create an
                            Account</a></div>
                    <a href="/dashboard">klik</a>

                </main>
            </div>
        </div>



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
