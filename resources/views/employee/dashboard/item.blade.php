@extends('layouts.main') @section('body')
    <div class="content">
        <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
            <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                            <li class="breadcrumb-item"><a href="#">{{ $title }}</a> / {{ $subTitle }}</li>
                        </ol>
                    </nav>
                    @foreach ($employee as $vEmployee)
                        <h4 class="mg-b-0 tx-spacing--1">Hallo, {{ $vEmployee->employee_name }} !</h4>
                    @endforeach
                </div>
                <div class="d-none d-md-block">
                    <a href="/listItems" class="btn btn-sm pd-x-15 {{ $btnList }} btn-uppercase mg-l-5"><i
                            data-feather="list" class="wd-10 mg-r-5"></i> Items</a>
                    <a href="/profileEmploy/current" class="btn btn-sm pd-x-15 {{ $btnCurrent }} btn-uppercase mg-l-5"><i
                            data-feather="meh" class="wd-10 mg-r-5"></i> Initial Assessment</a>
                    <a href="/profileEmploy" class="btn btn-sm pd-x-15 {{ $btnActual }} btn-uppercase mg-l-5"><i
                            data-feather="smile" class="wd-10 mg-r-5"></i> Actual</a>
                </div>
            </div>

            <div class="row row-xs">
                <div class="col-lg-12 mg-b-10">


                    <div class="card">
                        <div class="card-header tx-uppercase tx-bold bg-danger tx-white">
                            Item Need Improvement
                        </div>
                        <div class="card-body pd-y-10 pd-x-10">
                            <div class="table-responsive">
                                <table id="need" class="table table-bordered table-danger tx-11">
                                    <thead class="thead-primary">
                                        <tr class="tx-uppercase tx-center">
                                            <th class="">Competency</th>
                                            <th>Performance Standard</th>
                                            <th class="">level</th>
                                            <th class="tx-center">Item Name</th>
                                            <th>Intervention</th>
                                            <th class="tx-center">Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($need as $view)
                                            <tr>
                                                <td>{{ $view->competency_name }}</td>
                                                <td>{{ $view->ps_name }}</td>
                                                <td>{{ $view->level }}</td>
                                                <td>{{ $view->item_name }}</td>
                                                <td>{{ $view->intervention }}</td>
                                                <td class="tx-center">{{ $view->type_training }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col -->

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header tx-uppercase tx-bold bg-primary tx-white">
                            Item completed
                        </div>
                        <div class="card-body pd-y-10 pd-x-10">
                            <div class="table-responsive">
                                <table id="competent" class="table table-bordered tx-11">
                                    <thead class="thead-primary">
                                        <tr class="tx-uppercase">
                                            <th class="">Competency</th>
                                            <th class="">Performance Standard</th>
                                            <th class="">level</th>
                                            <th>Item Name</th>
                                            <th>Intervention</th>
                                            <th>Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($competent as $view)
                                            <tr>
                                                <td>{{ $view->competency_name }}</td>
                                                <td>{{ $view->ps_name }}</td>
                                                <td style="text-center">{{ $view->level }}</td>
                                                <td>{{ $view->item_name }}</td>
                                                <td>{{ $view->intervention }}</td>
                                                <td>{{ $view->type_training }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col -->

            </div><!-- row -->
        </div><!-- container -->
    </div><!-- content -->
    @push('scripts')
        <script nonce="{{ csp_nonce() }}">
            new DataTable('#need', {
                scrollX: true,
                scrollY: 300
            });
            new DataTable('#competent', {
                scrollX: true,
                scrollY: 300
            });
        </script>
    @endpush
@endsection
