@extends('layouts.loginLayout')

@section('container')
    <style>
        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
    <div class="content content-fixed content-auth-alt">



        <div class="row justify-content-center">
            <div class="col-lg-3 col-sm-4">

                <main class="form-signin tx-center">
                    <form action="/login" method="post">
                        @csrf
                        <img class="mb-2 tx-center" src="/images/logo_mycatalyst_full.png" width="270">
                        <div class="mb-4 tx-20 tx-center">Please sign in</div>

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if (session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('loginError') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        <div class="form-floating">
                            <input type="email"
                                class="form-control @error('email')
                                is-invalid
                            @enderror"
                                name="email" id="email" placeholder="name@example.com" autofocus required
                                value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" required>
                        </div>

                        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
                    </form>
                    {{-- <div class="tx-13 mg-t-20 tx-center">Don't have an account? <a href="/register">Create an
                            Account</a></div>
                    <a href="/dashboard">klik</a> --}}

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
