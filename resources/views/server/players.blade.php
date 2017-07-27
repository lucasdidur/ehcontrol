@extends('template')

@section('stylesheet')
    <style>
        .heads {
            width: 80px;
            height: 80px;
            margin: 0 40px 40px 0;
            float: left;
        }

        .heads p {
            font-size: 12px;
            text-align: center;
        }
    </style>
@stop

@include('server.partials.top_bar')

@section('content')
    <div class="tray tray-center">
        <div class="pl20 pr50">
            <div class="row">

            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>

        $(document).ready(function () {
            updateBar({{$server['id']}});
        });

        function updateBar(element) {
            $.ajax({
                url: "/json/" + element + "/players",
                success: function (data) {
                    $(".row").html("");

                    $.each(data, function (index) {
                        $(".row").append("<div class='heads'><img src='https://cravatar.eu/helmhead/" + data[index] + "/96.png'><p>" + data[index] + "</p></div>");
                    });
                },
                cache: false
            });

            setTimeout(updateBar, 3000, element);
        }
    </script>
@stop