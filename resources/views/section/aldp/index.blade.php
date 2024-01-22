@extends('layouts.main') @section('body')
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">
                        <a href="#">{{ $title }}</a>
                    </li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">{{ $title }}</h4>
        </div>
        <div class="d-none d-md-block">

        </div>
    </div>

    <div class="container">

        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">

            @foreach ($data as $vData)
                <div class="col-lg-4 col-md-6">

                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Annual Learning Development Plant </h6>
                            <h4 class="card-subtitle mb-2 text-muted">ALDP {{ $vData->year }}</h4>
                            <p class="card-text">
                                @if ($vData->status == 1)
                                    <span class="badge badge-primary">Created</span>
                                @elseif ($vData->status == 2)
                                    <span class="badge badge-primary">Reiview by Admin</span>
                                @else
                                    <span class="badge badge-primary">Form Completed</span>
                                @endif
                            </p>
                        </div>

                        @php
                            if ($vData->status == 1) {
                                $valueBtn = 'Form';
                                $class = '';
                            } elseif ($vData->status == 2) {
                                $valueBtn = 'View';
                                $class = 'disabled="disabled"';
                            }
                        @endphp

                        <div class="card-footer tx-13">
                            <div class="row row-xs">
                                <div class="col-lg-5">
                                    <a href="/aldpSection/{{ $vData->id }}"
                                        class="btn btn-xs btn-outline-dark btn-block">
                                        {{ $valueBtn }}
                                    </a>
                                </div>
                                <div class="col-lg-6">
                                    <form action="/submitForm" method="POST" onclick="return confirm('Are you sure?')">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $vData->id }}">
                                        <button type="submit" class="btn btn-xs btn-outline-secondary btn-block"
                                            {{ $class }}>Finish
                                            Form</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
