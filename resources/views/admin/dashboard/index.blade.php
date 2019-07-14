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
                    <canvas id="canvas" height="100"></canvas>
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
                                }, {
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
                                        randomScalingFactor(),
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
        <div class="masonry-item col-md-12">
            <!-- #Reactions Report ==================== -->
            <div class="bd bgc-white">
                <div class="layers">
                    <div class="layer w-100 p-20">
                        <h6 class="lh-1">Monthly Stats</h6>
                    </div>
                    <div class="layer w-100">
                        <div class="bgc-light-blue-500 c-white p-20">
                            <div class="peers ai-c jc-sb gap-40">
                                <div class="peer peer-greed">
                                    <h5>January - December {{date('Y')}}</h5>
                                    <p class="mB-0">Reactions Report</p>
                                </div>
                                <div class="peer">
                                    <h3 class="text-right">{{$data['total']}} <small class="c-white">reactions</small></h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive p-10">
                            <table class="table table-striped text-center">
                                <thead>
                                <tr>
                                    <th class=" bdwT-0">Month</th>
                                    <th class=" bdwT-0">Positive</th>
                                    <th class=" bdwT-0">Neutral</th>
                                    <th class=" bdwT-0">Negative</th>
                                    <th class=" bdwT-0">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for($month=1;$month<=12;$month++)
                                    <tr>
                                        <td class="fw-600">{{date_format(date_create("2019-".$month."-01"),"F Y")}}</td>
                                        @if(isset($positive_monthly_data[$month]))
                                            <td>{{$positive_monthly_data[$month]}}</td>
                                        @else
                                            <td>0</td>
                                        @endif

                                        @if(isset($neutral_monthly_data[$month]))
                                            <td>{{$neutral_monthly_data[$month]}}</td>
                                        @else
                                            <td>0</td>
                                        @endif

                                        @if(isset($negative_monthly_data[$month]))
                                            <td>{{$negative_monthly_data[$month]}}</td>
                                        @else
                                            <td>0</td>
                                        @endif

                                        <td><button type="button" class="btn btn-success btn-sm">VIEW DETAILS</button></td>
                                    </tr>

                                @endfor
                                <tr>
                                    <th>Total</th>
                                    <td>{{array_sum($positive_monthly_data)}} </td>
                                    <td>{{array_sum($neutral_monthly_data)}}</td>
                                    <td>{{array_sum($negative_monthly_data)}}</td>
                                    <td>&nbsp</td>
                                </tr>
                                <tr>
                                    <th>Percentage</th>
                                    <td>{{number_format(array_sum($positive_monthly_data)/$data['total']*100,2)}}% </td>
                                    <td>{{number_format(array_sum($neutral_monthly_data)/$data['total']*100,2)}}%</td>
                                    <td>{{number_format(array_sum($negative_monthly_data)/$data['total']*100,2)}}%</td>
                                    <td>&nbsp</td>
                                </tr>


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection