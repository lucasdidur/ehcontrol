<!-- BEGIN: PAGE SCRIPTS -->

<!-- jQuery -->
{!!Html::script('vendor/jquery/jquery-1.11.1.min.js')!!}
{!!Html::script('vendor/jquery/jquery_ui/jquery-ui.min.js')!!}

        <!-- CanvasBG Plugin(creates mousehover effect) -->
{!!Html::script('vendor/plugins/canvasbg/canvasbg.js')!!}

        <!-- Theme Javascript -->
{!!Html::script('assets/js/utility/utility.js')!!}
{!!Html::script('assets/js/main.js')!!}

        <!-- Page Javascript -->
<script type="text/javascript">
    jQuery(document).ready(function () {

        "use strict";

        // Init Theme Core
        Core.init();

        // Init CanvasBG and pass target starting location
        CanvasBG.init({
            Loc: {
                x: window.innerWidth / 2,
                y: window.innerHeight / 3.3
            },
        });

    });
</script>

</body>
</html>