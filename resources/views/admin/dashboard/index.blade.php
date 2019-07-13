@extends('admin.default')

@section('content')

    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
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
        <div class="masonry-item col-md-12">
            <!-- #Monthly Stats ==================== -->
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
                    var negative_data =
                            {!! json_encode($negative_monthly_data) !!}
                    var neutral_data =
                            {!! json_encode($neutral_monthly_data) !!}

                    var timeFormat = 'MM/DD/YYYY HH:mm';

                    function newDate(month) {
                        // return moment().add(days, 'd').toDate();
                        date = moment("2019-" + month + "-01").toDate();
                        return date;
                    }

                    function newDateString(days) {
                        return moment().add(days, 'd').format(timeFormat);
                    }

                    var color = Chart.helpers.color;
                    var config = {
                        type: 'line',
                        data: {
                            labels: [ // Date Objects
                                newDate(1),
                                newDate(2),
                                newDate(3),
                                newDate(4),
                                newDate(5),
                                newDate(6),
                                newDate(7),
                                newDate(8),
                                newDate(9),
                                newDate(10),
                                newDate(11),
                                newDate(12),
                            ],
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



@endsection