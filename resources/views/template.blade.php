<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>AbsoluteAdmin - A Responsive Bootstrap 3 Admin Dashboard Template</title>
    <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme"/>
    <meta name="description" content="AbsoluteAdmin - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="AbsoluteAdmin">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>

    <!-- Glyphicons Pro CSS(font) -->
    {!!Html::style('assets/fonts/glyphicons-pro/glyphicons-pro.css')!!}

    <!-- Theme CSS -->
    {!!Html::style('assets/skin/default_skin/css/theme.css')!!}
    {!!Html::style('assets/admin-tools/admin-forms/css/admin-forms.css')!!}
    <!-- Required Plugin CSS -->
    {!!Html::style('vendor/plugins/select2/css/core.css')!!}
            <!-- Vendor CSS -->
    {!!Html::style('vendor/plugins/magnific/magnific-popup.css')!!}


    @yield('stylesheet')

            <!-- Favicon -->
    {!! Html::favicon('assets/img/favicon.ico') !!}

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Start: Main -->
<div id="main">

    <!-- Start: Header -->
    @include('partials.template_header')
            <!-- End: Header -->

    <!-- Start: Sidebar -->
    @include('partials.sidebar_left')

            <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

        @yield('top_bar')

                <!-- Begin: Content -->
        <section id="content" class="@yield('content_class')">
            @yield('content')
        </section>
        <!-- End: Content -->

    </section>

    <!-- Start: Right Sidebar -->
    @include('partials.sidebar_right')
            <!-- End: Right Sidebar -->

</div>
<!-- End: Main -->

<!-- BEGIN: PAGE SCRIPTS -->

<!-- jQuery -->
{!!Html::script('vendor/jquery/jquery-1.11.1.min.js')!!}
{!!Html::script('vendor/jquery/jquery_ui/jquery-ui.min.js')!!}

<!-- Theme Javascript -->
{!!Html::script('assets/js/utility/utility.js')!!}
{!!Html::script('assets/js/main.js')!!}
<!-- Select2 Plugin Plugin -->
{!!Html::script('vendor/plugins/select2/select2.min.js')!!}

<script type="text/javascript">
    jQuery(document).ready(function () {
        "use strict";

        // Init Theme Core
        Core.init();

        // Request permission
        Notification.requestPermission();
        //spawnNotification("teste", "http://cdn.sstatic.net/stackexchange/img/logos/so/so-icon.png", "title");

    });

    function spawnNotification(theBody, theIcon, theTitle) {
        var options = {
            body: theBody,
            icon: theIcon
        }
        var n = new Notification(theTitle, options);
    }
</script>
@yield('scripts')
        <!-- END: PAGE SCRIPTS -->

</body>
</html>
