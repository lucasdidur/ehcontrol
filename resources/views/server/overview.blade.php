@extends('template')

@section('top_bar')
    @include('component.top_bar-title')
@stop

@section('content')


    <div class="row">
        <div class="col-sm-3 col-xl-2">
            <div class="panel panel-tile">
                <div class="panel-body bg-success">
                    <i class="fa fa-bar-chart-o icon-bg"></i>

                    <h1 class="fs35 mbn">145</h1>
                    <h6 class="text-white">players online</h6>
                </div>
                <div class="panel-footer br-n p12">
                <span class="fs11">
                    <i class="fa fa-arrow-up text-success pr5"></i>
                    <b> 3% ÚNICOS 1D ATRÁS</b>
                </span>
                </div>
            </div>
        </div>

        <div class="col-sm-9 ">
            <div class="panel" id="p14">
                <div class="panel-heading">
                    <span class="panel-title">Histórico de Players</span>
                </div>

                <div class="panel-body pn">
                    <div id="high-area" style="width: 100%; height: 295px; margin: 0 auto"></div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('scripts')
    {!!Html::script('vendor/plugins/highcharts/highcharts.js')!!}

    <script>
        var highColors = [bgInfo, bgPrimary, bgSuccess, bgWarning,
            bgDanger, bgSuccess, bgSystem, bgDark
        ];

        var area1 = $('#high-area');
        if (area1.length) {

            // Area 1
            $('#high-area').highcharts({
                colors: highColors,
                credits: false,
                chart: {
                    type: 'areaspline',
                    backgroundColor: 'transparent',
                },
                title: {
                    text: null
                },
                legend: {
                    layout: 'horizontal',
                    verticalAlign: 'top',
                    backgroundColor: '#FFFFFF'
                },
                xAxis: {
                    allowDecimals: false,
                    tickColor: '#EEE',
                    categories: [
                        'Monday',
                        'Tuesday',
                        'Wednesday',
                        'Thursday',
                        'Friday',
                        'Saturday',
                        'Sunday',
                    ],

                },
                yAxis: {
                    title: {
                        text: 'Players'
                    },
                    gridLineColor: 'transparent',
                },
                tooltip: {
                    shared: true,
                    valueSuffix: ' players'
                },
                plotOptions: {
                    areaspline: {
                        fillOpacity: 0.25,
                    }
                },
                series: [{
                    id: 0,
                    name: 'Bungeecord',
                    data: [150, 260, 80, 100, 150, 200, 0]
                }, {
                    id: 1,
                    name: 'Hub 1',
                    data: [10, 20, 40, 120, 240, 180, 0]
                }, {
                    id: 2,
                    name: 'Survival',
                    data: [60, 100, 180, 110, 100, 20, 0]
                }]
            });
        }

    </script>
@stop