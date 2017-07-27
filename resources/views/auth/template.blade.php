@include('auth.partials.header')

<body class="external-page sb-l-c sb-r-c">

<!-- Start: Main -->
<div id="main" class="animated fadeIn">

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

        <!-- begin canvas animation bg -->
        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>

        <!-- Begin: Content -->
        <section id="content">
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="fa fa-remove pr10"></i>
                        <strong>Oops!</strong> {!!  $error !!}
                    </div>
                @endforeach
            @endif

            <div class="admin-form theme-info" id="login1">
                <div class="row mb15 table-layout">

                    <div class="col-xs-6 va-m pln">
                        <a href="/" title="Voltar para página inicial">
                            {!! Html::image("assets/img/logos/logo_white.png", "Eh Aqui", ['class' => 'img-responsive w250']) !!}
                        </a>
                    </div>

                    <div class="col-xs-6 text-right va-b pr5">
                        <div class="login-links">
                            <a href="/auth/login" class="active" title="Sign In">Login</a>
                            <span class="text-white"> | </span>
                            <a href="/auth/register" class="" title="Register">Registre-se</a>
                        </div>

                    </div>

                </div>

                @yield('content')

            </div>
        </section>
        <!-- End: Content -->

    </section>
    <!-- End: Content-Wrapper -->

</div>
<!-- End: Main -->

@include('auth.partials.footer')