@extends('layout')
@section('title', 'Trắc Nghiệm - Admin | Quản lý tài khoản quản trị viên')
@section('content')

    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Xin chào {{ Auth::user()->name }}! 🎉</h5>
                            <p class="mb-4">
                                Chào mừng đến với website quản lý ứng dụng trắc nghiệm nhanh!.
                                Website này sẽ giúp bạn quản lý câu hỏi và tin tức cho ứng dụng.
                            </p>

                            {{--  <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>  --}}
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    @include('dashboard-component.card-question')
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    @include('dashboard-component.card-news')
                </div>
            </div>
        </div>
        <!-- Total Revenue -->

        <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
            @include('dashboard-component.rank-table')
        </div>
        <!--/ Total Revenue -->
        {{--  <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded">
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span class="d-block mb-1">Payments</span>
                            <h3 class="card-title text-nowrap mb-2">$2,456</h3>
                            <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded">
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Transactions</span>
                            <h3 class="card-title mb-2">$14,857</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
                        </div>
                    </div>
                </div>
                <!-- </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="row"> -->
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3"
                                style="position: relative;">
                                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                    <div class="card-title">
                                        <h5 class="text-nowrap mb-2">Profile Report</h5>
                                        <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                                    </div>
                                    <div class="mt-sm-auto">
                                        <small class="text-success text-nowrap fw-semibold"><i class="bx bx-chevron-up"></i>
                                            68.2%</small>
                                        <h3 class="mb-0">$84,686k</h3>
                                    </div>
                                </div>
                                <div id="profileReportChart" style="min-height: 80px;">
                                    <div id="apexcharts4nipg06i"
                                        class="apexcharts-canvas apexcharts4nipg06i apexcharts-theme-light"
                                        style="width: 260px; height: 80px;"><svg id="SvgjsSvg1572" width="260"
                                            height="80" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                            class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                            style="background: transparent;">
                                            <g id="SvgjsG1574" class="apexcharts-inner apexcharts-graphical"
                                                transform="translate(0, 0)">
                                                <defs id="SvgjsDefs1573">
                                                    <clipPath id="gridRectMask4nipg06i">
                                                        <rect id="SvgjsRect1579" width="261" height="85"
                                                            x="-4.5" y="-2.5" rx="0" ry="0"
                                                            opacity="1" stroke-width="0" stroke="none"
                                                            stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                    <clipPath id="forecastMask4nipg06i"></clipPath>
                                                    <clipPath id="nonForecastMask4nipg06i"></clipPath>
                                                    <clipPath id="gridRectMarkerMask4nipg06i">
                                                        <rect id="SvgjsRect1580" width="256" height="84"
                                                            x="-2" y="-2" rx="0" ry="0"
                                                            opacity="1" stroke-width="0" stroke="none"
                                                            stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                    <filter id="SvgjsFilter1586" filterUnits="userSpaceOnUse"
                                                        width="200%" height="200%" x="-50%" y="-50%">
                                                        <feFlood id="SvgjsFeFlood1587" flood-color="#ffab00"
                                                            flood-opacity="0.15" result="SvgjsFeFlood1587Out"
                                                            in="SourceGraphic"></feFlood>
                                                        <feComposite id="SvgjsFeComposite1588" in="SvgjsFeFlood1587Out"
                                                            in2="SourceAlpha" operator="in"
                                                            result="SvgjsFeComposite1588Out"></feComposite>
                                                        <feOffset id="SvgjsFeOffset1589" dx="5" dy="10"
                                                            result="SvgjsFeOffset1589Out" in="SvgjsFeComposite1588Out">
                                                        </feOffset>
                                                        <feGaussianBlur id="SvgjsFeGaussianBlur1590" stdDeviation="3 "
                                                            result="SvgjsFeGaussianBlur1590Out" in="SvgjsFeOffset1589Out">
                                                        </feGaussianBlur>
                                                        <feMerge id="SvgjsFeMerge1591" result="SvgjsFeMerge1591Out"
                                                            in="SourceGraphic">
                                                            <feMergeNode id="SvgjsFeMergeNode1592"
                                                                in="SvgjsFeGaussianBlur1590Out"></feMergeNode>
                                                            <feMergeNode id="SvgjsFeMergeNode1593"
                                                                in="[object Arguments]">
                                                            </feMergeNode>
                                                        </feMerge>
                                                        <feBlend id="SvgjsFeBlend1594" in="SourceGraphic"
                                                            in2="SvgjsFeMerge1591Out" mode="normal"
                                                            result="SvgjsFeBlend1594Out"></feBlend>
                                                    </filter>
                                                </defs>
                                                <line id="SvgjsLine1578" x1="201.10000000000002" y1="0"
                                                    x2="201.10000000000002" y2="80" stroke="#b6b6b6"
                                                    stroke-dasharray="3" stroke-linecap="butt"
                                                    class="apexcharts-xcrosshairs" x="201.10000000000002" y="0"
                                                    width="1" height="80" fill="#b1b9c4" filter="none"
                                                    fill-opacity="0.9" stroke-width="1">
                                                </line>
                                                <g id="SvgjsG1595" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                    <g id="SvgjsG1596" class="apexcharts-xaxis-texts-g"
                                                        transform="translate(0, -4)"></g>
                                                </g>
                                                <g id="SvgjsG1604" class="apexcharts-grid">
                                                    <g id="SvgjsG1605" class="apexcharts-gridlines-horizontal"
                                                        style="display: none;">
                                                        <line id="SvgjsLine1607" x1="0" y1="0"
                                                            x2="252" y2="0" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1608" x1="0" y1="20"
                                                            x2="252" y2="20" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1609" x1="0" y1="40"
                                                            x2="252" y2="40" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1610" x1="0" y1="60"
                                                            x2="252" y2="60" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1611" x1="0" y1="80"
                                                            x2="252" y2="80" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                    </g>
                                                    <g id="SvgjsG1606" class="apexcharts-gridlines-vertical"
                                                        style="display: none;"></g>
                                                    <line id="SvgjsLine1613" x1="0" y1="80"
                                                        x2="252" y2="80" stroke="transparent"
                                                        stroke-dasharray="0" stroke-linecap="butt"></line>
                                                    <line id="SvgjsLine1612" x1="0" y1="1"
                                                        x2="0" y2="80" stroke="transparent"
                                                        stroke-dasharray="0" stroke-linecap="butt"></line>
                                                </g>
                                                <g id="SvgjsG1581" class="apexcharts-line-series apexcharts-plot-series">
                                                    <g id="SvgjsG1582" class="apexcharts-series" seriesName="seriesx1"
                                                        data:longestSeries="true" rel="1" data:realIndex="0">
                                                        <path id="SvgjsPath1585"
                                                            d="M 0 76C 17.64 76 32.760000000000005 12 50.400000000000006 12C 68.04 12 83.16000000000001 62 100.80000000000001 62C 118.44000000000001 62 133.56 22 151.20000000000002 22C 168.84000000000003 22 183.96000000000004 38 201.60000000000002 38C 219.24 38 234.36 6 252 6"
                                                            fill="none" fill-opacity="1" stroke="rgba(255,171,0,0.85)"
                                                            stroke-opacity="1" stroke-linecap="butt" stroke-width="5"
                                                            stroke-dasharray="0" class="apexcharts-line" index="0"
                                                            clip-path="url(#gridRectMask4nipg06i)"
                                                            filter="url(#SvgjsFilter1586)"
                                                            pathTo="M 0 76C 17.64 76 32.760000000000005 12 50.400000000000006 12C 68.04 12 83.16000000000001 62 100.80000000000001 62C 118.44000000000001 62 133.56 22 151.20000000000002 22C 168.84000000000003 22 183.96000000000004 38 201.60000000000002 38C 219.24 38 234.36 6 252 6"
                                                            pathFrom="M -1 120L -1 120L 50.400000000000006 120L 100.80000000000001 120L 151.20000000000002 120L 201.60000000000002 120L 252 120">
                                                        </path>
                                                        <g id="SvgjsG1583" class="apexcharts-series-markers-wrap"
                                                            data:realIndex="0">
                                                            <g class="apexcharts-series-markers">
                                                                <circle id="SvgjsCircle1619" r="0"
                                                                    cx="201.60000000000002" cy="38"
                                                                    class="apexcharts-marker wide7z3vz no-pointer-events"
                                                                    stroke="#ffffff" fill="#ffab00" fill-opacity="1"
                                                                    stroke-width="2" stroke-opacity="0.9"
                                                                    default-marker-size="0"></circle>
                                                            </g>
                                                        </g>
                                                    </g>
                                                    <g id="SvgjsG1584" class="apexcharts-datalabels" data:realIndex="0">
                                                    </g>
                                                </g>
                                                <line id="SvgjsLine1614" x1="0" y1="0" x2="252"
                                                    y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                                    stroke-width="1" stroke-linecap="butt"
                                                    class="apexcharts-ycrosshairs"></line>
                                                <line id="SvgjsLine1615" x1="0" y1="0" x2="252"
                                                    y2="0" stroke-dasharray="0" stroke-width="0"
                                                    stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                <g id="SvgjsG1616" class="apexcharts-yaxis-annotations"></g>
                                                <g id="SvgjsG1617" class="apexcharts-xaxis-annotations"></g>
                                                <g id="SvgjsG1618" class="apexcharts-point-annotations"></g>
                                            </g>
                                            <rect id="SvgjsRect1577" width="0" height="0" x="0"
                                                y="0" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe">
                                            </rect>
                                            <g id="SvgjsG1603" class="apexcharts-yaxis" rel="0"
                                                transform="translate(-18, 0)"></g>
                                            <g id="SvgjsG1575" class="apexcharts-annotations"></g>
                                        </svg>
                                        <div class="apexcharts-legend" style="max-height: 40px;"></div>
                                        <div class="apexcharts-tooltip apexcharts-theme-light"
                                            style="left: 71.8656px; top: 41px;">
                                            <div class="apexcharts-tooltip-title"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">5</div>
                                            <div class="apexcharts-tooltip-series-group apexcharts-active"
                                                style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker"
                                                    style="background-color: rgb(255, 171, 0);"></span>
                                                <div class="apexcharts-tooltip-text"
                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    <div class="apexcharts-tooltip-y-group"><span
                                                            class="apexcharts-tooltip-text-y-label">series-1: </span><span
                                                            class="apexcharts-tooltip-text-y-value">205</span></div>
                                                    <div class="apexcharts-tooltip-goals-group"><span
                                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                                            class="apexcharts-tooltip-text-goals-value"></span></div>
                                                    <div class="apexcharts-tooltip-z-group"><span
                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                            class="apexcharts-tooltip-text-z-value"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                            <div class="apexcharts-yaxistooltip-text"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 398px; height: 117px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  --}}
    </div>

@stop
