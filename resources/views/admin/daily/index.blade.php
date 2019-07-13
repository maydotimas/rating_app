@extends('admin.default')
@section('css')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>

    <script src="https://www.chartjs.org/dist/2.8.0/Chart.min.js"></script>
    <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>
@endsection
@section('page-header')
    Daily Reports
    <small>details</small>

@endsection
@section('content')

    <div class="bgc-white p-20 bd">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-6"></div>
            <div class="masonry-item col-md-12">
                <form>
                    <div class="form-group row">
                        <label for="report-month" class="col-sm-2 col-form-label">Display report for: </label>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <form>
                                    <input type="text" name="dates" class="form-control"
                                           aria-label="Recipient's username" aria-describedby="basic-addon2"
                                    value="{{date_format(date_create($start_date),'m/d/Y')}} - {{date_format(date_create($end_date),'m/d/Y')}}">

                                    <input type="hidden" name="start_date" id="start_date"
                                           value="@if(isset($start_date)){{$start_date}}@else{{date('Y-m-d')}}@endif">
                                    <input type="hidden" name="end_date" id="end_date"
                                           value="@if(isset($end_date)){{$end_date}}@else{{date('Y-m-d')}}@endif">

                                    <div class="input-group-append">
                                        <button class="btn btn-primary c-white btn-outline-secondary">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="masonry-item  w-100">
                <div class="row gap-20">
                    <!-- #Toatl Visits ==================== -->
                    <div class='col-md-3'>
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">Total Reactions</h6>
                            </div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed">
                                        <span id="sparklinedash3"></span>
                                    </div>
                                    <div class="peer">
                                        <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">{{$data['total']}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- #Total Page Views ==================== -->
                    <div class='col-md-3'>
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">Total Positive Reactions</h6>
                            </div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed">
                                        <span id="sparklinedash"></span>
                                    </div>
                                    <div class="peer">
                                        <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">{{$data['positive']}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- #Unique Visitors ==================== -->
                    <div class='col-md-3'>
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">Total Negative Reactions</h6>
                            </div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed">
                                        <span id="sparklinedash4"></span>
                                    </div>
                                    <div class="peer">
                                        <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">{{$data['negative']}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- #Bounce Rate ==================== -->
                    <div class='col-md-3'>
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">Total Neutral Reactions</h6>
                            </div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed">
                                        <span id="sparklinedash2"></span>
                                    </div>
                                    <div class="peer">
                                        <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">{{$data['neutral']}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="masonry-item col-md-6">
                <!-- #Reactions Report ==================== -->
                <div class="bd bgc-white">
                    <div class="layers">
                        <div class="layer w-100 p-20">
                            <h6 class="lh-1">Reactions Report</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="bgc-light-blue-500 c-white p-20">
                                <div class="peers ai-c jc-sb gap-40">
                                    <div class="peer peer-greed">
                                        <h5>November 2017</h5>
                                        <p class="mB-0">Satisfaction Rating</p>
                                    </div>
                                    <div class="peer">
                                        <h3 class="text-right">{{$data['total']}} Reactions</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive p-20">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class=" bdwT-0">Reaction</th>
                                        <th class=" bdwT-0">Count</th>
                                        <th class=" bdwT-0">Percentage</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="fw-600">Happy</td>
                                        <td>
                                            <span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c badge-pill">High</span>
                                        </td>
                                        <td><span class="text-success">1000</span></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-600">Slightly Happy</td>
                                        <td>
                                            <span class="badge bgc-deep-purple-50 c-deep-purple-700 p-10 lh-0 tt-c badge-pill">New</span>
                                        </td>
                                        <td><span class="text-info">400</span></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-600">Unhappy</td>
                                        <td>
                                            <span class="badge bgc-orange-50 c-orange-700 p-10 lh-0 tt-c badge-pill">Medium</span>
                                        </td>
                                        <td><span class="text-danger">300</span></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-600">Angry</td>
                                        <td>
                                            <span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c badge-pill">Low</span>
                                        </td>
                                        <td><span class="text-success">10</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="masonry-item col-md-6">
                <!-- #Monthly Stats ==================== -->
                <div class="bd bgc-white">
                    <div class="layers">
                        <div class="layer w-100 pX-20 pT-20">
                            <h6 class="lh-1">Daily Stats</h6>
                        </div>
                        <div class="bd bgc-white">
                            <div class="layer w-100 p-20">
                                <canvas id="canvas" height="220"></canvas>
                            </div>
                            <div class="layer bdT p-20 w-100">
                                <div class="peers ai-c jc-c gapX-20">
                                    <div class="peer">
                                        <span class="fsz-def fw-600 mR-10 c-grey-800">10% <i class="fa fa-level-up c-green-500"></i></span>
                                        <small class="c-grey-500 fw-600">APPL</small>
                                    </div>
                                    <div class="peer fw-600">
                                        <span class="fsz-def fw-600 mR-10 c-grey-800">2% <i class="fa fa-level-down c-red-500"></i></span>
                                        <small class="c-grey-500 fw-600">Average</small>
                                    </div>
                                    <div class="peer fw-600">
                                        <span class="fsz-def fw-600 mR-10 c-grey-800">15% <i class="fa fa-level-up c-green-500"></i></span>
                                        <small class="c-grey-500 fw-600">Sales</small>
                                    </div>
                                    <div class="peer fw-600">
                                        <span class="fsz-def fw-600 mR-10 c-grey-800">8% <i class="fa fa-level-down c-red-500"></i></span>
                                        <small class="c-grey-500 fw-600">Profit</small>
                                    </div>
                                </div>
                            </div>
                            <script>
                                // get data
                                var positive_data =
                                        {!! json_encode($positive_monthly_data) !!}
                                    console.log(positive_data);
                                var negative_data =
                                        {!! json_encode($negative_monthly_data) !!}
                                var neutral_data =
                                        {!! json_encode($neutral_monthly_data) !!}

                                var daily_records =
                                        {!! json_encode($daily_count) !!}

                                var days =
                                        {!! json_encode($days) !!}

                                var report_dates = [];

                                var timeFormat = 'MM/DD/YYYY HH:mm';

                                function newDate(q) {
                                    for (i in days) {
                                        date = moment(days[i]).toDate();
                                        report_dates.push(date)
                                    }

                                    return report_dates;
                                }


                                function newDateString(days) {
                                    return moment().add(days, 'd').format(timeFormat);
                                }

                                var color = Chart.helpers.color;
                                var config = {
                                    type: 'line',
                                    data: {
                                        labels: newDate(),
                                        datasets: [
                                            {
                                                label: 'Positive Reactions',
                                                backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
                                                borderColor: window.chartColors.green,
                                                fill: false,
                                                data: [
                                                    positive_data[1],
                                                    positive_data[2],
                                                    positive_data[3],
                                                    positive_data[4],
                                                    positive_data[5],
                                                    positive_data[5],
                                                    positive_data[6],
                                                    positive_data[7],
                                                    positive_data[8],
                                                    positive_data[9],
                                                    positive_data[10],
                                                    positive_data[11],
                                                    positive_data[12]
                                                ],
                                            },{
                                                label: 'Neutral Reactions',
                                                backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                                                borderColor: window.chartColors.blue,
                                                fill: false,
                                                data: [
                                                    neutral_data[1],
                                                    neutral_data[2],
                                                    neutral_data[3],
                                                    neutral_data[4],
                                                    neutral_data[5],
                                                    neutral_data[5],
                                                    neutral_data[6],
                                                    neutral_data[7],
                                                    neutral_data[8],
                                                    neutral_data[9],
                                                    neutral_data[10],
                                                    neutral_data[11],
                                                    neutral_data[12]
                                                ],
                                            },
                                            {
                                                label: 'Negative Reactions',
                                                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                                                borderColor: window.chartColors.red,
                                                fill: false,
                                                data: [
                                                    negative_data[1],
                                                    negative_data[2],
                                                    negative_data[3],
                                                    negative_data[4],
                                                    negative_data[5],
                                                    negative_data[5],
                                                    negative_data[6],
                                                    negative_data[7],
                                                    negative_data[8],
                                                    negative_data[9],
                                                    negative_data[10],
                                                    negative_data[11],
                                                    negative_data[12]
                                                ],
                                            },

                                        ]
                                    },
                                    options: {
                                        title: {
                                            text: 'Chart.js Time Scale'
                                        },
                                        scales: {
                                            xAxes: [{
                                                type: 'time',
                                                time: {
                                                    parser: timeFormat,
                                                    // round: 'day'
                                                    tooltipFormat: 'll'
                                                },
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: 'Month'
                                                }
                                            }],
                                            yAxes: [{
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: 'value'
                                                }
                                            }]
                                        },
                                    }
                                };

                                window.onload = function () {
                                    var ctx = document.getElementById('canvas').getContext('2d');
                                    window.myLine = new Chart(ctx, config);
                                };

                            </script>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('input[name="dates"]').daterangepicker({}, function(start, end, label) {
                $("#start_date").val(start.format('YYYY-MM-DD'));
                $("#end_date").val(end.format('YYYY-MM-DD'));
            });

            $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
                // $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));

                $("#start_date").val(picker.startDate.format('YYYY-MM-DD'));
                $("#end_date").val(picker.endDate.format('YYYY-MM-DD'));
            });
        });
    </script>
@endsection