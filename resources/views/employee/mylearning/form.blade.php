@extends('layouts.main') @section('body')
    <div class="mg-t-0 mg-b-5 pd-0">
        <img src="/images/cap/bnr2.jpg" alt="" class="bg-banner">
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">
                        {{-- <a href="#">{{ $title }}</a> --}}
                    </li>
                </ol>
            </nav>
            {{-- <h4 class="mg-b-0 tx-spacing--1">{{ $title }}</h4> --}}
        </div>
        <div class="d-none d-md-block">
            <a href="/mylearning" class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5">
                <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                back
            </a>
            <a href="/mylearning" class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5">
                <i data-feather="corner-down-left" class="wd-10 mg-r-5"></i>
                back
            </a>
        </div>
    </div>

    <div class="col-md-12">
        @foreach ($data2 as $view)
            <div class="card card-body mg-b-10">
                <div class="row row-xs">
                    <div class="col-md-6">
                        <h6 class="mg-b-0 tx-10">Competency</h6>
                        <p class="tx-13 tx-color-03 mg-b-10">{{ $view->competency_name }}</p>

                        <h6 class="mg-b-0 tx-13">Performance Standards</h6>
                        <p class="tx-12 tx-color-03 mg-b-10">{{ $view->ps_name }}</p>
                        <p class="tx-12 tx-color-03 mg-b-10 tx-italic">{{ $view->ps_bahasa }}</p>

                        <h6 class="mg-b-0 tx-10">Level</h6>
                        <p class="tx-10 tx-color-03 mg-b-0">{{ $view->level }}</p>

                    </div>
                    <div class="col-md-5 mg-l-5">
                        <h6 class="mg-b-0 tx-10">Learning Item</h6>
                        <p class="tx-13 tx-color-03 mg-b-10">{{ $view->item_name }}</p>

                        <h6 class="mg-b-0 tx-10">Intervention</h6>
                        <p class="tx-13 tx-color-03 mg-b-10">{{ $view->intervention }}</p>

                        <h6 class="mg-b-0 tx-10">Type of Training</h6>
                        <p class="tx-13 tx-color-03 mg-b-0">{{ $view->type_training }}</p>
                    </div>
                </div>
            </div>
        @endforeach

        <form action="/mylearning" method="post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="learning_id" id="learning_id" value="{{ $learning_id }}">

            <div data-label="Form Close Gap Activity" class="df-example pd-0">

                <form>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Date <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-4">
                            <input type="date" name="started_at" id="started_at"
                                class="form-control @error('started_at') is-invalid @enderror" autofocus
                                placeholder="started_at" />
                        </div>
                        @error('started_at')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="col-sm-4">
                            <input type="date" name="finished_at" id="finished_at"
                                class="form-control @error('finished_at') is-invalid @enderror" autofocus
                                placeholder="finished_date" />
                        </div>
                        @error('finished_at')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label">Document (.pdf)<span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="file" name="evidence" id="inputFile"
                                class="form-control @error('evidence') is-invalid @enderror">
                            @error('evidence')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    @error('evidence')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group row">
                        <label class="col-form-label col-sm-4 pt-0">Remarks</label>
                        <div class="col-sm-8">
                            <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" id="comment" cols="30"
                                rows="3" value="{{ old('comment') }}"></textarea>
                            @error('comment')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @error('competency_bahasa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group row mg-b-0">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-sm btn-primary">Submit Form</button>
                        </div>
                    </div>
                </form>

            </div>
        </form>
    </div>



    @push('scripts')
    @endpush
@endsection
