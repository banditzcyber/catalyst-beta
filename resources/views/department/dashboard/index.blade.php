@extends('layouts.main')

@section('body')
    <div class="content">
        <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
            <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                    <h4 class="mg-b-0 tx-spacing--1">Dashboard your section</h4>
                </div>
                <div class="d-none d-md-block">

                </div>
            </div>

            <div class="row row-xs">
                <div class="col-sm-6 col-lg-4">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Teams</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1" id="subOrdinateCount"></h3>
                        </div>
                    </div>
                </div><!-- col -->
                <div class="col-sm-6 col-lg-4 mg-t-10 mg-sm-t-0">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">ALDP</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">3,137</h3>
                        </div>
                    </div>
                </div><!-- col -->
                <div class="col-sm-6 col-lg-4 mg-t-10 mg-lg-t-0">
                    <div class="card card-body">
                        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Mans Hour</h6>
                        <div class="d-flex d-lg-block d-xl-flex align-items-end">
                            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">$306.20</h3>
                            <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-danger">0.3% <i
                                        class="icon ion-md-arrow-down"></i></span> than last week</p>
                        </div>
                    </div>
                </div><!-- col -->
                <div class="col-lg-8 col-xl-7 mg-t-10">
                    <div class="card">
                        <div class="card-header pd-y-20 d-md-flex align-items-center justify-content-between">
                            <h6 class="mg-b-0">Progress based on competency</h6>
                            <ul class="list-inline d-flex mg-t-20 mg-sm-t-10 mg-md-t-0 mg-b-0">
                                <li class="list-inline-item d-flex align-items-center">
                                    <span class="d-block wd-10 ht-10 bg-success rounded mg-r-5"></span>
                                    <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Competent</span>
                                </li>
                                <li class="list-inline-item d-flex align-items-center mg-l-5">
                                    <span class="d-block wd-10 ht-10 bg-danger rounded mg-r-5"></span>
                                    <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Need Improvement</span>
                                </li>

                            </ul>
                        </div><!-- card-header -->
                        <div class="card-body pos-relative pd-0 pd-t-20">

                            <div class="chart-one">
                                <div id="chart"></div>
                            </div><!-- chart-one -->
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div>
                <div class="col-lg-4 col-xl-5 mg-t-10">
                    <div class="card">
                        <div class="card-header pd-t-20 pd-b-0 bd-b-0">
                            <h6 class="mg-b-5">Progress Overall</h6>
                            </p>
                        </div><!-- card-header -->
                        <div class="card-body pd-20">
                            <div class="chart-two mg-b-10">
                                <div id="chart2"></div>
                            </div><!-- chart-two -->
                            <div class="row">
                                <div class="col-sm tx-center">
                                    <h4 class="tx-normal tx-rubik tx-spacing--1 mg-b-5" id="sumCompetent">
                                        {{-- {{ number_format($sumCompetent) }} --}}
                                    </h4>
                                    <p class="tx-11 tx-uppercase tx-spacing-1 tx-semibold mg-b-10 tx-primary">Competent
                                    </p>
                                </div><!-- col -->
                                <div class="col-sm mg-t-10 mg-sm-t-0 tx-center">
                                    <h4 class="tx-normal tx-rubik tx-spacing--1 mg-b-5" id="sumNeed">
                                        {{-- {{ number_format($sumNeed) }} --}}
                                    </h4>
                                    <p class="tx-11 tx-uppercase tx-spacing-1 tx-semibold mg-b-10 tx-pink">Need Improvement
                                    </p>
                                </div><!-- col -->
                            </div><!-- row -->
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div>
                {{-- <div class="col-md-6 col-xl-4 mg-t-10 order-md-1 order-xl-0">
                    <div class="card ht-lg-100p">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="mg-b-0">Sales Revenue</h6>
                            <div class="tx-13 d-flex align-items-center">
                                <span class="mg-r-5">Country:</span> <a href=""
                                    class="d-flex align-items-center link-03 lh-0">USA <i
                                        class="icon ion-ios-arrow-down mg-l-5"></i></a>
                            </div>
                        </div><!-- card-header -->
                        <div class="card-body pd-0">
                            <div class="pd-y-25 pd-x-20">
                                <div id="vmap" class="ht-200"></div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-borderless table-dashboard table-dashboard-one">
                                    <thead>
                                        <tr>
                                            <th class="wd-40">States</th>
                                            <th class="wd-25 text-right">Orders</th>
                                            <th class="wd-35 text-right">Earnings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="tx-medium">California</td>
                                            <td class="text-right">12,201</td>
                                            <td class="text-right">$150,200.80</td>
                                        </tr>
                                        <tr>
                                            <td class="tx-medium">Texas</td>
                                            <td class="text-right">11,950</td>
                                            <td class="text-right">$138,910.20</td>
                                        </tr>
                                        <tr>
                                            <td class="tx-medium">Wyoming</td>
                                            <td class="text-right">11,198</td>
                                            <td class="text-right">$132,050.00</td>
                                        </tr>
                                        <tr>
                                            <td class="tx-medium">Florida</td>
                                            <td class="text-right">9,885</td>
                                            <td class="text-right">$127,762.10</td>
                                        </tr>
                                        <tr>
                                            <td class="tx-medium">New York</td>
                                            <td class="text-right">8,560</td>
                                            <td class="text-right">$117,087.50</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- table-responsive -->
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col -->
                <div class="col-lg-12 col-xl-8 mg-t-10">
                    <div class="card mg-b-10">
                        <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                            <div>
                                <h6 class="mg-b-5">Your Most Recent Earnings</h6>
                                <p class="tx-13 tx-color-03 mg-b-0">Your sales and referral earnings over the last 30 days
                                </p>
                            </div>
                            <div class="d-flex mg-t-20 mg-sm-t-0">
                                <div class="btn-group flex-fill">
                                    <button class="btn btn-white btn-xs active">Range</button>
                                    <button class="btn btn-white btn-xs">Period</button>
                                </div>
                            </div>
                        </div><!-- card-header -->
                        <div class="card-body pd-y-30">
                            <div class="d-sm-flex">
                                <div class="media">
                                    <div
                                        class="wd-40 wd-md-50 ht-40 ht-md-50 bg-teal tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-6">
                                        <i data-feather="bar-chart-2"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6
                                            class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold tx-nowrap mg-b-5 mg-md-b-8">
                                            Gross Earnings</h6>
                                        <h4 class="tx-20 tx-sm-18 tx-md-24 tx-normal tx-rubik mg-b-0">$1,958,104</h4>
                                    </div>
                                </div>
                                <div class="media mg-t-20 mg-sm-t-0 mg-sm-l-15 mg-md-l-40">
                                    <div
                                        class="wd-40 wd-md-50 ht-40 ht-md-50 bg-pink tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-5">
                                        <i data-feather="bar-chart-2"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6
                                            class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8">
                                            Tax Withheld</h6>
                                        <h4 class="tx-20 tx-sm-18 tx-md-24 tx-normal tx-rubik mg-b-0">
                                            $234,769<small>.50</small></h4>
                                    </div>
                                </div>
                                <div class="media mg-t-20 mg-sm-t-0 mg-sm-l-15 mg-md-l-40">
                                    <div
                                        class="wd-40 wd-md-50 ht-40 ht-md-50 bg-primary tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-4">
                                        <i data-feather="bar-chart-2"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6
                                            class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8">
                                            Net Earnings</h6>
                                        <h4 class="tx-20 tx-sm-18 tx-md-24 tx-normal tx-rubik mg-b-0">
                                            $1,608,469<small>.50</small></h4>
                                    </div>
                                </div>
                            </div>
                        </div><!-- card-body -->
                        <div class="table-responsive">
                            <table class="table table-dashboard mg-b-0">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th class="text-right">Sales Count</th>
                                        <th class="text-right">Gross Earnings</th>
                                        <th class="text-right">Tax Withheld</th>
                                        <th class="text-right">Net Earnings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="tx-color-03 tx-normal">03/05/2018</td>
                                        <td class="tx-medium text-right">1,050</td>
                                        <td class="text-right tx-teal">+ $32,580.00</td>
                                        <td class="text-right tx-pink">- $3,023.10</td>
                                        <td class="tx-medium text-right">$28,670.90 <span
                                                class="mg-l-5 tx-10 tx-normal tx-success"><i
                                                    class="icon ion-md-arrow-up"></i> 4.5%</span></td>
                                    </tr>
                                    <tr>
                                        <td class="tx-color-03 tx-normal">03/04/2018</td>
                                        <td class="tx-medium text-right">980</td>
                                        <td class="text-right tx-teal">+ $30,065.10</td>
                                        <td class="text-right tx-pink">- $2,780.00</td>
                                        <td class="tx-medium text-right">$26,930.40 <span
                                                class="mg-l-5 tx-10 tx-normal tx-danger"><i
                                                    class="icon ion-md-arrow-down"></i> 0.8%</span></td>
                                    </tr>
                                    <tr>
                                        <td class="tx-color-03 tx-normal">03/04/2018</td>
                                        <td class="tx-medium text-right">980</td>
                                        <td class="text-right tx-teal">+ $30,065.10</td>
                                        <td class="text-right tx-pink">- $2,780.00</td>
                                        <td class="tx-medium text-right">$26,930.40 <span
                                                class="mg-l-5 tx-10 tx-normal tx-danger"><i
                                                    class="icon ion-md-arrow-down"></i> 0.8%</span></td>
                                    </tr>
                                    <tr>
                                        <td class="tx-color-03 tx-normal">03/04/2018</td>
                                        <td class="tx-medium text-right">980</td>
                                        <td class="text-right tx-teal">+ $30,065.10</td>
                                        <td class="text-right tx-pink">- $2,780.00</td>
                                        <td class="tx-medium text-right">$26,930.40 <span
                                                class="mg-l-5 tx-10 tx-normal tx-danger"><i
                                                    class="icon ion-md-arrow-down"></i> 0.8%</span></td>
                                    </tr>
                                    <tr>
                                        <td class="tx-color-03 tx-normal">03/04/2018</td>
                                        <td class="tx-medium text-right">980</td>
                                        <td class="text-right tx-teal">+ $30,065.10</td>
                                        <td class="text-right tx-pink">- $2,780.00</td>
                                        <td class="tx-medium text-right">$26,930.40 <span
                                                class="mg-l-5 tx-10 tx-normal tx-danger"><i
                                                    class="icon ion-md-arrow-down"></i> 0.8%</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- table-responsive -->
                    </div><!-- card -->

                    <div class="card card-body ht-lg-100">
                        <div class="media">
                            <span class="tx-color-04"><i data-feather="download" class="wd-60 ht-60"></i></span>
                            <div class="media-body mg-l-20">
                                <h6 class="mg-b-10">Download your earnings in CSV format.</h6>
                                <p class="tx-color-03 mg-b-0">Open it in a spreadsheet and perform your own calculations,
                                    graphing etc. The CSV file contains additional details, such as the buyer location. </p>
                            </div>
                        </div><!-- media -->
                    </div>
                </div><!-- col -->
                <div class="col-md-6 col-xl-4 mg-t-10">
                    <div class="card ht-100p">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="mg-b-0">Transaction History</h6>
                            <div class="d-flex tx-18">
                                <a href="" class="link-03 lh-0"><i class="icon ion-md-refresh"></i></a>
                                <a href="" class="link-03 lh-0 mg-l-10"><i class="icon ion-md-more"></i></a>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush tx-13">
                            <li class="list-group-item d-flex pd-sm-x-20">
                                <div class="avatar d-none d-sm-block"><span
                                        class="avatar-initial rounded-circle bg-teal"><i
                                            class="icon ion-md-checkmark"></i></span></div>
                                <div class="pd-sm-l-10">
                                    <p class="tx-medium mg-b-0">Payment from #10322</p>
                                    <small class="tx-12 tx-color-03 mg-b-0">Mar 21, 2019, 3:30pm</small>
                                </div>
                                <div class="mg-l-auto text-right">
                                    <p class="tx-medium mg-b-0">+ $250.00</p>
                                    <small class="tx-12 tx-success mg-b-0">Completed</small>
                                </div>
                            </li>
                            <li class="list-group-item d-flex pd-sm-x-20">
                                <div class="avatar d-none d-sm-block"><span
                                        class="avatar-initial rounded-circle bg-indigo op-5"><i
                                            class="icon ion-md-return-left"></i></span></div>
                                <div class="pd-sm-l-10">
                                    <p class="tx-medium mg-b-2">Process refund to #00910</p>
                                    <small class="tx-12 tx-color-03 mg-b-0">Mar 21, 2019, 1:00pm</small>
                                </div>
                                <div class="mg-l-auto text-right">
                                    <p class="tx-medium mg-b-2">-$16.50</p>
                                    <small class="tx-12 tx-success mg-b-0">Completed</small>
                                </div>
                            </li>
                            <li class="list-group-item d-flex pd-sm-x-20">
                                <div class="avatar d-none d-sm-block"><span
                                        class="avatar-initial rounded-circle bg-orange op-5"><i
                                            class="icon ion-md-bus"></i></span></div>
                                <div class="pd-sm-l-10">
                                    <p class="tx-medium mg-b-2">Process delivery to #44333</p>
                                    <small class="tx-12 tx-color-03 mg-b-0">Mar 20, 2019, 11:40am</small>
                                </div>
                                <div class="mg-l-auto text-right">
                                    <p class="tx-medium mg-b-2">3 Items</p>
                                    <small class="tx-12 tx-info mg-b-0">For pickup</small>
                                </div>
                            </li>
                            <li class="list-group-item d-flex pd-sm-x-20">
                                <div class="avatar d-none d-sm-block"><span
                                        class="avatar-initial rounded-circle bg-teal"><i
                                            class="icon ion-md-checkmark"></i></span></div>
                                <div class="pd-sm-l-10">
                                    <p class="tx-medium mg-b-0">Payment from #023328</p>
                                    <small class="tx-12 tx-color-03 mg-b-0">Mar 20, 2019, 10:30pm</small>
                                </div>
                                <div class="mg-l-auto text-right">
                                    <p class="tx-medium mg-b-0">+ $129.50</p>
                                    <small class="tx-12 tx-success mg-b-0">Completed</small>
                                </div>
                            </li>
                            <li class="list-group-item d-flex pd-sm-x-20">
                                <div class="avatar d-none d-sm-block"><span
                                        class="avatar-initial rounded-circle bg-gray-400"><i
                                            class="icon ion-md-close"></i></span></div>
                                <div class="pd-sm-l-10">
                                    <p class="tx-medium mg-b-0">Payment failed from #087651</p>
                                    <small class="tx-12 tx-color-03 mg-b-0">Mar 19, 2019, 12:54pm</small>
                                </div>
                                <div class="mg-l-auto text-right">
                                    <p class="tx-medium mg-b-0">$150.00</p>
                                    <small class="tx-12 tx-danger mg-b-0">Declined</small>
                                </div>
                            </li>
                        </ul>
                        <div class="card-footer text-center tx-13">
                            <a href="" class="link-03">View All Transactions <i
                                    class="icon ion-md-arrow-down mg-l-5"></i></a>
                        </div><!-- card-footer -->
                    </div><!-- card -->
                </div>
                <div class="col-md-6 col-xl-4 mg-t-10">
                    <div class="card ht-100p">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="mg-b-0">New Customers</h6>
                            <div class="d-flex align-items-center tx-18">
                                <a href="" class="link-03 lh-0"><i class="icon ion-md-refresh"></i></a>
                                <a href="" class="link-03 lh-0 mg-l-10"><i class="icon ion-md-more"></i></a>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush tx-13">
                            <li class="list-group-item d-flex pd-sm-x-20">
                                <div class="avatar"><span class="avatar-initial rounded-circle bg-gray-600">s</span></div>
                                <div class="pd-l-10">
                                    <p class="tx-medium mg-b-0">Socrates Itumay</p>
                                    <small class="tx-12 tx-color-03 mg-b-0">Customer ID#00222</small>
                                </div>
                                <div class="mg-l-auto d-flex align-self-center">
                                    <nav class="nav nav-icon-only">
                                        <a href="" class="nav-link d-none d-sm-block"><i
                                                data-feather="mail"></i></a>
                                        <a href="" class="nav-link d-none d-sm-block"><i
                                                data-feather="slash"></i></a>
                                        <a href="" class="nav-link d-none d-sm-block"><i
                                                data-feather="user"></i></a>
                                        <a href="" class="nav-link d-sm-none"><i
                                                data-feather="more-vertical"></i></a>
                                    </nav>
                                </div>
                            </li>
                            <li class="list-group-item d-flex pd-x-20">
                                <div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle"
                                        alt=""></div>
                                <div class="pd-l-10">
                                    <p class="tx-medium mg-b-0">Reynante Labares</p>
                                    <small class="tx-12 tx-color-03 mg-b-0">Customer ID#00221</small>
                                </div>
                                <div class="mg-l-auto d-flex align-self-center">
                                    <nav class="nav nav-icon-only">
                                        <a href="" class="nav-link d-none d-sm-block"><i
                                                data-feather="mail"></i></a>
                                        <a href="" class="nav-link d-none d-sm-block"><i
                                                data-feather="slash"></i></a>
                                        <a href="" class="nav-link d-none d-sm-block"><i
                                                data-feather="user"></i></a>
                                        <a href="" class="nav-link d-sm-none"><i
                                                data-feather="more-vertical"></i></a>
                                    </nav>
                                </div>
                            </li>
                            <li class="list-group-item d-flex pd-x-20">
                                <div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle"
                                        alt=""></div>
                                <div class="pd-l-10">
                                    <p class="tx-medium mg-b-0">Marianne Audrey</p>
                                    <small class="tx-12 tx-color-03 mg-b-0">Customer ID#00220</small>
                                </div>
                                <div class="mg-l-auto d-flex align-self-center">
                                    <nav class="nav nav-icon-only">
                                        <a href="" class="nav-link d-none d-sm-block"><i
                                                data-feather="mail"></i></a>
                                        <a href="" class="nav-link d-none d-sm-block"><i
                                                data-feather="slash"></i></a>
                                        <a href="" class="nav-link d-none d-sm-block"><i
                                                data-feather="user"></i></a>
                                        <a href="" class="nav-link d-sm-none"><i
                                                data-feather="more-vertical"></i></a>
                                    </nav>
                                </div>
                            </li>
                            <li class="list-group-item d-flex pd-x-20">
                                <div class="avatar"><span class="avatar-initial rounded-circle bg-indigo op-5">o</span>
                                </div>
                                <div class="pd-l-10">
                                    <p class="tx-medium mg-b-0">Owen Bongcaras</p>
                                    <small class="tx-12 tx-color-03 mg-b-0">Customer ID#00219</small>
                                </div>
                                <div class="mg-l-auto d-flex align-self-center">
                                    <nav class="nav nav-icon-only">
                                        <a href="" class="nav-link d-none d-sm-block"><i
                                                data-feather="mail"></i></a>
                                        <a href="" class="nav-link d-none d-sm-block"><i
                                                data-feather="slash"></i></a>
                                        <a href="" class="nav-link d-none d-sm-block"><i
                                                data-feather="user"></i></a>
                                        <a href="" class="nav-link d-sm-none"><i
                                                data-feather="more-vertical"></i></a>
                                    </nav>
                                </div>
                            </li>
                            <li class="list-group-item d-flex pd-x-20">
                                <div class="avatar"><span class="avatar-initial rounded-circle bg-primary op-5">k</span>
                                </div>
                                <div class="pd-l-10">
                                    <p class="tx-medium mg-b-0">Kirby Avendula</p>
                                    <small class="tx-12 tx-color-03 mg-b-0">Customer ID#00218</small>
                                </div>
                                <div class="mg-l-auto d-flex align-self-center">
                                    <nav class="nav nav-icon-only">
                                        <a href="" class="nav-link d-none d-sm-block"><i
                                                data-feather="mail"></i></a>
                                        <a href="" class="nav-link d-none d-sm-block"><i
                                                data-feather="slash"></i></a>
                                        <a href="" class="nav-link d-none d-sm-block"><i
                                                data-feather="user"></i></a>
                                        <a href="" class="nav-link d-sm-none"><i
                                                data-feather="more-vertical"></i></a>
                                    </nav>
                                </div>
                            </li>
                        </ul>
                        <div class="card-footer text-center tx-13">
                            <a href="" class="link-03">View More Customers <i
                                    class="icon ion-md-arrow-down mg-l-5"></i></a>
                        </div><!-- card-footer -->
                    </div><!-- card -->
                </div>
                <div class="col-md-6 col-xl-4 mg-t-10">
                    <div class="card ht-lg-100p">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="mg-b-0">Real-Time Sales</h6>
                            <ul class="list-inline d-flex mg-b-0">
                                <li class="list-inline-item d-flex align-items-center">
                                    <span class="d-block wd-10 ht-10 bg-df-2 rounded mg-r-5"></span>
                                    <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Today</span>
                                </li>
                                <li class="list-inline-item d-flex align-items-center mg-l-10">
                                    <span class="d-block wd-10 ht-10 bg-df-3 rounded mg-r-5"></span>
                                    <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Yesterday</span>
                                </li>
                            </ul>
                        </div><!-- card-header -->
                        <div class="card-body pd-b-0">
                            <div class="row mg-b-20">
                                <div class="col">
                                    <h4 class="tx-normal tx-rubik tx-spacing--1 mg-b-10">$150,200 <small
                                            class="tx-11 tx-success letter-spacing--2"><i
                                                class="icon ion-md-arrow-up"></i> 0.20%</small></h4>
                                    <p class="tx-11 tx-uppercase tx-spacing-1 tx-medium tx-color-03">Total Sales</p>
                                </div>
                                <div class="col">
                                    <h4 class="tx-normal tx-rubik tx-spacing--1 mg-b-10">$21,880 <small
                                            class="tx-11 tx-danger letter-spacing--2"><i
                                                class="icon ion-md-arrow-down"></i> 1.04%</small></h4>
                                    <p class="tx-11 tx-uppercase tx-spacing-1 tx-medium tx-color-03">Avg. Sales Per Day</p>
                                </div>
                            </div><!-- row -->
                            <div class="chart-five">
                                <div><canvas id="chartBar1"></canvas></div>
                            </div>
                        </div><!-- card-body -->
                    </div>
                </div> --}}
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- content -->

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#viewdata').DataTable();
            })

            const sumItem = document.getElementById('sumItem');
            const sumCompetent = document.getElementById('sumCompetent');
            const sumNeed = document.getElementById('sumNeed');
            const subOrdinateCount = document.getElementById('subOrdinateCount');
            // sumItem.setAttribute('class', 'spinner-border');
            // sumCompetent.setAttribute('class', 'spinner-border');
            // sumNeed.setAttribute('class', 'spinner-border');
            // subOrdinateCount.setAttribute('class', 'spinner-border');

            async function fetchDataCompetency() {
                try {
                    const response = await fetch('/api/datacompetency');

                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }

                    const data = await response.json();
                    return data;
                } catch (error) {
                    console.error('There was a problem with the fetch operation datacompetency:', error);
                    throw error; // Re-throw the error so it can be caught further up the call stack if needed
                }
            }
            async function getDataCompetency() {
                try {
                    const spinners = document.querySelectorAll('.spinner-border');
                    spinners.forEach(spinner => {
                        spinner.remove();
                    });

                    const data = await fetchDataCompetency();
                    console.log(data);
                    const sumItem = document.getElementById('sumItem');
                    const sumCompetent = document.getElementById('sumCompetent');
                    const sumNeed = document.getElementById('sumNeed');
                    const subOrdinateCount = document.getElementById('subOrdinateCount');

                    // sumItem.innerHTML += data.sumItem;
                    sumCompetent.innerHTML += data.sumCompetent;
                    sumNeed.innerHTML += data.sumNeed;
                    subOrdinateCount.innerHTML += data.subCount;

                    makeChart(data.countCompetent, data.countNeed, data.getCompetency, data.percent)
                } catch (error) {
                    console.error('Error:', error);
                }
            }
            getDataCompetency()

            function makeChart(competent, need, competency, percent) {
                var options = {
                    chart: {
                        type: 'bar',
                        height: 300,
                        stacked: true
                    },
                    plotOptions: {
                        bar: {
                            horizontal: true
                        }
                    },
                    legend: {
                        show: false
                    },
                    series: [{
                        name: 'Competent',
                        data: competent,
                        color: '#46C2CB'
                    }, {
                        name: 'Need Improvement',
                        data: need,
                        color: '#FC5185'
                    }],
                    xaxis: {
                        categories: competency
                    }
                }

                var chart = new
                ApexCharts(document.querySelector("#chart"), options);
                chart.render();

                var config = {
                    series: [parseInt(percent)],
                    labels: ['Progress'],
                    chart: {
                        height: 270,
                        type: 'radialBar',
                        toolbar: {
                            show: true
                        }
                    },
                    plotOptions: {
                        radialBar: {
                            startAngle: -135,
                            endAngle: 225,
                            hollow: {
                                margin: 0,
                                size: '70%',
                                background: '#fff',
                                image: undefined,
                                imageOffsetX: 0,
                                imageOffsetY: 0,
                                position: 'front',
                                dropShadow: {
                                    enabled: true,
                                    top: 3,
                                    left: 0,
                                    blur: 4,
                                    opacity: 0.24
                                }
                            },
                            track: {
                                background: '#fff',
                                strokeWidth: '67%',
                                margin: 0, // margin is in pixels
                                dropShadow: {
                                    enabled: true,
                                    top: -3,
                                    left: 0,
                                    blur: 4,
                                    opacity: 0.35
                                }
                            },

                            dataLabels: {
                                show: true,
                                name: {
                                    offsetY: -10,
                                    show: false,
                                    color: '#888',
                                    fontSize: '17px'
                                },
                                value: {
                                    formatter: function(val) {
                                        return val + "%";
                                    },
                                    color: '#111',
                                    fontSize: '30px',
                                    show: true,
                                }
                            }
                        }
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'dark',
                            type: 'horizontal',
                            shadeIntensity: 0.5,
                            gradientToColors: ['#FC5185'],
                            inverseColors: true,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 100]
                        }
                    },
                    stroke: {
                        lineCap: 'round'
                    }
                };

                var chart = new ApexCharts(document.querySelector("#chart2"), config);
                chart.render();
            }
        </script>
    @endpush
@endsection
