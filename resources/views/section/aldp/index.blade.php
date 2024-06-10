@extends('layouts.main') @section('body')
    <div class="mg-t-0 mg-b-5 pd-0">
        <img src="/images/cap/bnr3.jpg" alt="">
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            {{-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">
                        <a href="#">{{ $title }}</a>
                    </li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">{{ $title }}</h4> --}}
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
                            <h4 class="card-subtitle mb-2 ">ALDP {{ $vData->year }}</h4>
                            <p class="card-text mg-0">
                                @if ($vData->status == 1)
                                    <span class="badge badge-light">Please complete the form provided</span>
                                @else
                                    <span class="badge badge-success">Verified</span>
                                @endif
                            </p>
                        </div>

                        @php
                            if ($vData->status == 1) {
                                $valueBtn = 'Form';
                                $class = '';
                                $link = '/sectionAldpShow/';
                            } elseif ($vData->status == 2) {
                                $valueBtn = 'View';
                                $class = 'disabled="disabled"';
                                $link = '/sectionAldpShowFinish/';
                            }
                        @endphp

                        <div class="card-footer tx-13 bg-dark">
                            <div class="row row-xs">
                                <div class="col-lg-6">
                                    <a href="{{ $link }}{{ $vData->id }}" class="btn btn-xs btn-outline-warning">
                                        {{ $valueBtn }}
                                    </a>
                                </div>
                                <div class="col-lg-6 tx-right">
                                    <form action="/sectionAldpSubmitForm" method="POST"
                                        onclick="return confirm('Are you sure?')">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $vData->id }}">
                                        <button type="submit" class="btn btn-xs btn-secondary" {{ $class }}>Finish
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
