@extends('template')

@section('stylesheet')
    <style>
        .console[readonly=readonly] {
            background: #000;
        !important;
            cursor: default;
        }

        .console {
            font: 95% 'Droid Sans Mono', monospace;
            color: #fff;
            min-height: 430px;
            height: auto !important;
            width: 100%;
            text-wrap: normal;
            overflow-y: scroll;
            overflow-x: hidden;
            border: 0;
        }
    </style>
    @stop

    @include('server.partials.top_bar')


    @section('content')
            <!-- begin: .tray-center -->
    <div class="tray tray-center">

        <div class="pl20 pr50">
            <div class="row">
                <div class="col-sm-5 col-xl-6">
                    <form action="#" method="post" id="console_command" class="admin-form">
                        <div class="section">
                            <div class="smart-widget sm-right smr-80">
                                <label class="field prepend-icon">
                                    <input type="text" name="sub2" id="send_command" class="gui-input" placeholder="Digite o comando">
                                    <label for="s" class="field-icon">
                                        <i class="fa fa-search"></i>
                                    </label>
                                </label>
                                <button type="submit" id="send_command_submit" class="button btn-info">&rarr;</button>
                            </div>
                            <!-- end .smart-widget section -->
                        </div>
                    </form>
                </div>

                <div class="col-sm-4 pull-right">
                    <div class="text-center mb10">
                        <button id="start" type="button" class="btn btn-success notification command" data-note-stack="stack_bar_bottom"
                                action="start"
                                data-note-style="success">
                            <span class="glyphicon glyphicon-play"></span> Iniciar
                        </button>

                        <button id="stop" type="button" class="btn btn-danger notification command" data-note-stack="stack_bar_bottom"
                                action="stop" data-note-style="danger">
                            <span class="glyphicon glyphicon-stop"></span> Parar
                        </button>

                        <button type="button" class="btn btn-info notification command" data-note-stack="stack_bar_bottom"
                                action="restart" data-note-style="info">
                            <span class="glyphicon glyphicon-refresh"></span> Reiniciar
                        </button>
                    </div>
                </div>
            </div>
            <textarea id="live_console" class="form-control console" readonly="readonly"></textarea>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        var fist = false;

        function updateConsole(element) {
            $.ajax({
                url: "/json/" + element + "/console",
                success: function (info) {
                    $("#live_console").html(info.lines.join("\n"));

                    if ($('#live_console').scrollTop() > 1300 || !fist) {
                        $('#live_console').scrollTop($('#live_console')[0].scrollHeight);
                        fist = true;
                    }
                },
                cache: false
            });

            setTimeout(updateConsole, 2000, element);
        }

        $(document).ready(function () {
            updateConsole({{$server['id']}});
        });

        $(".command").click(function (e) {
            var This = $(this);
            $.get("/json/{{$server['id']}}/" + This.attr("action"));
        });

        $("#send_command_submit").click(function (e) {
            $.get("/json/{{$server['id']}}/command/" + $("#send_command").val());
            $("#send_command").val("");
        });

        $('#console_command').on('submit', function(e){
            e.preventDefault();
            $.get("/json/{{$server['id']}}/command/" + $("#send_command").val());
            $("#send_command").val("");
        });

    </script>
@stop
