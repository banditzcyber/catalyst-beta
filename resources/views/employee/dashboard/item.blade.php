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
                        @php
                            if ($vEmployee->gender == 'M') {
                                $gender = 'Mr.';
                            } else {
                                $gender = 'Mrs.';
                            }
                        @endphp
                        <h4 class="mg-b-0 tx-spacing--1">Welcome {{ $gender }} {{ $vEmployee->employee_name }}</h4>
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
                        <div class="card-header tx-uppercase tx-bold">
                            Item Competent
                        </div>
                        <div class="card-body pd-y-10 pd-x-10">
                            <div class="table-responsive">
                                <table id="competent" class="table table-bordered tx-11">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th class="">Item ID</th>
                                            <th class="">Competency</th>
                                            <th class="">Performance Standard</th>
                                            <th class="">level</th>
                                            <th>Item Name</th>
                                            <th>Intervention</th>
                                            <th class="wd-10p">Type Training</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($competent as $view)
                                            <tr>
                                                <td>{{ $view->item_id }}</td>
                                                <td>{{ $view->competency_name }}</td>
                                                <td>{{ $view->ps_name }}</td>
                                                <td>{{ $view->level }}</td>
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

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header tx-uppercase tx-bold">
                            Item Need Improvement
                        </div>
                        <div class="card-body pd-y-10 pd-x-10">
                            <div class="table-responsive">
                                <table id="need" class="table table-bordered table-secondary tx-11">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th class="">Item ID</th>
                                            <th class="">Competency</th>
                                            <th class="">Performance Standard</th>
                                            <th class="">level</th>
                                            <th>Item Name</th>
                                            <th>Intervention</th>
                                            <th class="wd-10p">Type Training</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($need as $view)
                                            <tr>
                                                <td>{{ $view->item_id }}</td>
                                                <td>{{ $view->competency_name }}</td>
                                                <td>{{ $view->ps_name }}</td>
                                                <td>{{ $view->level }}</td>
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
        <script>
            $(document).ready(function() {
                $("#competent").DataTable({
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                        lengthMenu: '_MENU_ items/page',
                    }
                });
                $("#need").DataTable();
                $("#dataCompetency").DataTable();
            });
        </script>
    @endpush
@endsection
