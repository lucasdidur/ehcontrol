@extends('template')

@section('stylesheet')
    <style>
        #status:first-letter {
            text-transform: capitalize;
        }
    </style>
@stop

@include('server.partials.top_bar')

@section('content_class', 'table-layout')

@section('content')

            <!-- begin: .tray-center -->
    <div class="tray tray-center">

        <div class="pl20 pr50">
            <div>
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">Informações Gerais</span>
                    </div>
                    <div class="panel-body p25">
                        <table class="table">
                            <tr>
                                <th>Status</th>
                                <th><span id="status">{{ ucfirst($server['status'])}}</span> <span
                                            id="online">{{$server['online']}}</span>/{{$server['max']}} players
                                </th>
                            </tr>
                            <tr>
                                <td>Suspendido</td>
                                <td>@if( $server['suspended'] == 'yes') Sim @else Não @endif</td>
                            </tr>
                            <tr>
                                <td>IP</td>
                                <td>{{$server['ip']}}</td>
                            </tr>
                            <tr>
                                <td>Porta</td>
                                <td>{{$server['port']}}</td>
                            </tr>
                            <tr>
                                <td>Memória</td>
                                <td>{{$server['memory']}} MB</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">Uso de Recursos</span>
                    </div>
                    <div class="panel-body p25">
                        <table class="table">
                            <tr>
                                <td class="p15 mnw150">
                                    <h4 class="mb15 text-muted">Uso do Processador</h4>

                                    <div class="progress progress-bar-sm mb5">
                                        <div class="progress-bar progress-bar-warning" role="progressbar"
                                             id="percent_processor_bar"
                                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 60%;">
                                            <span class="sr-only" id="percent_processor_bar_text">60%</span>
                                        </div>
                                    </div>
                                    <p>
                                        <b class="text-warning" id="percent_processor">60%</b>
                                    </p>
                                </td>
                                <td>
                                    <span class="inlinesparkline" id="percent_processor_history" spark-width="100%"
                                          spark-height="35"
                                          data-spark-color="warning"
                                          values="0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0"></span>
                                </td>
                            </tr>

                            <tr>
                                <td class="p15 mnw150">
                                    <h4 class="mb15 text-muted">Uso da Memória</h4>

                                    <div class="progress progress-bar-sm mb5">
                                        <div class="progress-bar progress-bar-info" role="progressbar"
                                             id="percent_memory_bar"
                                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 60%;">
                                            <span class="sr-only" id="percent_memory_bar_text">60%</span>
                                        </div>
                                    </div>
                                    <p>
                                        <b class="text-info" id="percent_memory">60%</b>
                                    </p>
                                </td>
                                <td>
                                    <span class="inlinesparkline" id="percent_memory_history" spark-width="100%"
                                          spark-height="35"
                                          data-spark-color="info"
                                          values="0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0"></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end: .tray-center -->

    <!-- begin: .tray-right -->
    <aside class="tray tray-right tray320 p20">
        <div class="text-center mb10">
            <button id="start" type="button" class="btn btn-success notification command" data-note-stack="stack_bar_bottom"
                    action="start"
                    data-note-style="success" title="Servidor está sendo iniciado">
                <span class="glyphicon glyphicon-play"></span> Iniciar
            </button>

            <button id="stop" type="button" class="btn btn-danger notification command" data-note-stack="stack_bar_bottom"
                    action="stop" data-note-style="danger" title="Servidor está sendo parado">
                <span class="glyphicon glyphicon-stop"></span> Parar
            </button>

            <button type="button" class="btn btn-info notification command" data-note-stack="stack_bar_bottom"
                    action="restart" data-note-style="info" title="Servidor vai ser reiniciando">
                <span class="glyphicon glyphicon-refresh"></span> Reiniciar
            </button>
        </div>

        <h4> Status </h4>
        <hr class="alt short">
        <div id="high-area" style="width: 100%; height: 295px; margin: 0 auto"></div>
    </aside>
    <!-- end: .tray-right -->
@stop

@section('scripts')
    {!!Html::script('vendor/plugins/sparkline/jquery.sparkline.min.js')!!}
    {!!Html::script('vendor/plugins/highcharts/highcharts.js')!!}
    {!!Html::script('vendor/plugins/pnotify/pnotify.js')!!}

    <script>

        var sparkColors = {
            "primary": [bgPrimary, bgPrimaryLr, bgPrimaryDr],
            "info": [bgInfo, bgInfoLr, bgInfoDr],
            "warning": [bgWarning, bgWarningLr, bgWarningDr],
            "success": [bgSuccess, bgSuccessLr, bgSuccessDr],
            "alert": [bgAlert, bgAlertLr, bgAlertDr]
        };

        var chart;

        $(".command").click(function () {
            var This = $(this);
            $.get("/json/{{$server['id']}}/" + This.attr("action"));
        });

        function sparklineInit() {
            $('.inlinesparkline').each(function (i, e) {

                var This = $(this);
                var Color = sparkColors["primary"];
                var Height = '35';
                var Width = '100%';
                This.children().remove();

                // User assigned color and height, else default
                var userColor = This.data('spark-color');
                var userHeight = This.data('spark-height');
                var userWidth = This.data('spark-width');

                if (userColor) {
                    Color = sparkColors[userColor];
                }
                if (userHeight) {
                    Height = userHeight;
                }
                if (userWidth) {
                    Width = userWidth;
                }

                $(e).sparkline('html', {
                    type: 'line',
                    width: Width,
                    height: Height,
                    enableTagOptions: true,
                    lineColor: Color[2], // Also tooltip icon color
                    fillColor: Color[1],
                    spotColor: Color[0],
                    minSpotColor: Color[0],
                    maxSpotColor: Color[0],
                    highlightSpotColor: bgWarningDr,
                    highlightLineColor: bgWarningLr
                });
            });
        }

        /**
         * Request data from the server, add it to the graph and set a timeout to request again
         */
        function requestData() {
            $.ajax({
                url: '/json/{{$server['id']}}/playersCount',
                success: function (point) {
                    var series = chart.series[0];
                    var shift = series.data.length > 20;

                    $("#online").html(point[1]);

                    chart.series[0].addPoint(eval(point), true, shift);

                    setTimeout(requestData, 10000);
                },
                cache: false
            });
        }

        Highcharts.setOptions({
            lang: {
                loading: 'Aguarde...',
                months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                shortMonths: ['Jan', 'Feb', 'Mar', 'Abr', 'Maio', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                exportButtonTitle: "Exportar",
                printButtonTitle: "Imprimir",
                rangeSelectorFrom: "De",
                rangeSelectorTo: "Até",
                rangeSelectorZoom: "Periodo",
                downloadPNG: 'Download imagem PNG',
                downloadJPEG: 'Download imagem JPEG',
                downloadPDF: 'Download documento PDF',
                downloadSVG: 'Download imagem SVG'
            }
        });


        $(document).ready(function () {

            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'high-area',
                    defaultSeriesType: 'areaspline',
                    events: {
                        load: requestData
                    }
                },
                credits: false,
                title: {
                    text: ''
                },
                legend: {
                    layout: 'horizontal',
                    verticalAlign: 'top',
                    backgroundColor: '#FFFFFF'
                },
                tooltip: {
                    shared: true,
                    valueSuffix: ' players'
                },
                xAxis: {
                    title: {
                        text: 'Hora'
                    },
                    type: 'datetime',
                    tickPixelInterval: 100
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    gridLineColor: 'transparent'
                },
                series: [{
                    name: 'Player Online',
                    data: []
                }]
            });

            sparklineInit();
            sparklineInit();
            updateBar({{$server['id']}});
        });

        function updateBar(element) {
            $.ajax({
                url: "/json/" + element + "/resouces",
                success: function (info) {

                    // Processor
                    var act = $("#percent_processor_history").attr("values").split(",");
                    act.pop();
                    act.unshift(info.cpu);
                    $("#percent_processor_history").attr("values", act.concat());
                    $("#percent_processor_bar").attr("aria-valuenow", info.cpu).css("width", info.cpu + "%");
                    $("#percent_processor_bar_text").html(info.cpu + "%");
                    $("#percent_processor").html(info.cpu + "%");

                    // Memory
                    act = $("#percent_memory_history").attr("values").split(",");
                    act.pop();
                    act.unshift(info.memory);
                    $("#percent_memory_history").attr("values", act.concat());
                    $("#percent_memory_bar").attr("aria-valuenow", info.memory).css("width", info.memory + "%");
                    $("#percent_memory_bar_text").html(info.memory + "%");
                    $("#percent_memory").html(info.memory + "%");
                },
                cache: false
            });

            $.ajax({
                url: "/json/" + element + "/status",
                success: function (info) {
                    $("#status").html(info.status.charAt(0).toUpperCase() + info.status.slice(1));
                },
                cache: false
            });

            sparklineInit();

            setTimeout(updateBar, 3000, element);
        }


        // PNotify Plugin Event Init
        $('.notification').on('click', function () {
            var Stacks = {
                stack_top_right: {
                    "dir1": "down",
                    "dir2": "left",
                    "push": "top",
                    "spacing1": 10,
                    "spacing2": 10
                },
                stack_top_left: {
                    "dir1": "down",
                    "dir2": "right",
                    "push": "top",
                    "spacing1": 10,
                    "spacing2": 10
                },
                stack_bottom_left: {
                    "dir1": "right",
                    "dir2": "up",
                    "push": "top",
                    "spacing1": 10,
                    "spacing2": 10
                },
                stack_bottom_right: {
                    "dir1": "left",
                    "dir2": "up",
                    "push": "top",
                    "spacing1": 10,
                    "spacing2": 10
                },
                stack_bar_top: {
                    "dir1": "down",
                    "dir2": "right",
                    "push": "top",
                    "spacing1": 0,
                    "spacing2": 0
                },
                stack_bar_bottom: {
                    "dir1": "up",
                    "dir2": "right",
                    "spacing1": 0,
                    "spacing2": 0
                },
                stack_context: {
                    "dir1": "down",
                    "dir2": "left",
                    "context": $("#stack-context")
                }
            };

            var noteStyle = $(this).data('note-style');
            var noteShadow = $(this).data('note-shadow');
            var noteOpacity = $(this).data('note-opacity');
            var noteStack = $(this).data('note-stack');

            // If notification stack or opacity is not defined set a default
            noteStack = noteStack ? noteStack : "stack_top_right";
            noteOpacity = noteOpacity ? noteOpacity : "1";

            // We modify the width option if the selected stack is a fullwidth style
            function findWidth() {
                if (noteStack == "stack_bar_top") {
                    return "100%";
                }
                if (noteStack == "stack_bar_bottom") {
                    return "70%";
                } else {
                    return "290px";
                }
            }

            var This = $(this);

            // Create new Notification
            new PNotify({
                title: !This.attr("text") ? "" : This.attr("title"),
                text: This.attr("text") ? This.attr("text") : This.attr("title"),
                shadow: noteShadow,
                opacity: noteOpacity,
                addclass: noteStack,
                type: noteStyle,
                stack: Stacks[noteStack],
                width: findWidth(),
                delay: 1400
            });

        });


    </script>
@stop
