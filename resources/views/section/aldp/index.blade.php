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
        <div class="row">

            @foreach ($data as $vData)
                <div class="col-lg-4 col-md-6">

                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Annual Learning Development Plant (ALDP)</h6>
                            <h4 class="card-subtitle mb-2 text-muted">{{ $vData->year }}</h4>
                            <p class="card-text">
                                @if ($vData->status == 1)
                                    <span class="badge badge-primary">Created</span>
                                @else
                                    <span class="badge badge-warning">On-Progress</span>
                                @endif
                            </p>
                            <a href="/aldpSection/{{ $vData->id }}" class="btn btn-xs btn-outline-dark">Go</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
