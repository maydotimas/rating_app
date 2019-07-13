@extends('admin.default')
@section('page-header')
    Reports
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
                                <input type="month" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary c-white btn-outline-secondary" type="button">Submit</button>
                                </div>
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
                                <h6 class="lh-1">Total Visits</h6>
                            </div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed">
                                        <span id="sparklinedash"></span>
                                    </div>
                                    <div class="peer">
                                        <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">+10%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- #Total Page Views ==================== -->
                    <div class='col-md-3'>
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">Total Page Views</h6>
                            </div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed">
                                        <span id="sparklinedash2"></span>
                                    </div>
                                    <div class="peer">
                                        <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">-7%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- #Unique Visitors ==================== -->
                    <div class='col-md-3'>
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">Unique Visitor</h6>
                            </div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed">
                                        <span id="sparklinedash3"></span>
                                    </div>
                                    <div class="peer">
                                        <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">~12%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- #Bounce Rate ==================== -->
                    <div class='col-md-3'>
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">Bounce Rate</h6>
                            </div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed">
                                        <span id="sparklinedash4"></span>
                                    </div>
                                    <div class="peer">
                                        <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">33%</span>
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
                                        <h3 class="text-right">5000 Reactions</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive p-20">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class=" bdwT-0">Reaction</th>
                                        <th class=" bdwT-0">Status</th>
                                        <th class=" bdwT-0">Count</th>
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
                                        <td><span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c badge-pill">Low</span>
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
                            <h6 class="lh-1">Monthly Stats</h6>
                        </div>
                        <div class="layer w-100 p-20">
                            <canvas id="line-chart" height="220"></canvas>
                        </div>
                        <div class="layer bdT p-20 w-100">
                            <div class="peers ai-c jc-c gapX-20">
                                <div class="peer">
                                    <span class="fsz-def fw-600 mR-10 c-grey-800">10% <i
                                                class="fa fa-level-up c-green-500"></i></span>
                                    <small class="c-grey-500 fw-600">APPL</small>
                                </div>
                                <div class="peer fw-600">
                                    <span class="fsz-def fw-600 mR-10 c-grey-800">2% <i
                                                class="fa fa-level-down c-red-500"></i></span>
                                    <small class="c-grey-500 fw-600">Average</small>
                                </div>
                                <div class="peer fw-600">
                                    <span class="fsz-def fw-600 mR-10 c-grey-800">15% <i
                                                class="fa fa-level-up c-green-500"></i></span>
                                    <small class="c-grey-500 fw-600">Sales</small>
                                </div>
                                <div class="peer fw-600">
                                    <span class="fsz-def fw-600 mR-10 c-grey-800">8% <i
                                                class="fa fa-level-down c-red-500"></i></span>
                                    <small class="c-grey-500 fw-600">Profit</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
@endsection