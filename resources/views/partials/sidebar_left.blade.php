<aside id="sidebar_left" class="nano nano-light side">

    <!-- Start: Sidebar Left Content -->
    <div class="sidebar-left-content nano-content">

        <!-- Start: Sidebar Header -->
        <header class="sidebar-header">

            <!-- Sidebar Widget - Menu (Slidedown) -->
            <div class="sidebar-widget menu-widget">
                <div class="row text-center mbn">
                    <div class="col-xs-4">
                        <a href="dashboard.html" class="text-primary" data-toggle="tooltip" data-placement="top"
                           title="Dashboard">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_messages.html" class="text-info" data-toggle="tooltip" data-placement="top"
                           title="Messages">
                            <span class="glyphicon glyphicon-inbox"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_profile.html" class="text-alert" data-toggle="tooltip" data-placement="top"
                           title="Tasks">
                            <span class="glyphicon glyphicon-bell"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_timeline.html" class="text-system" data-toggle="tooltip" data-placement="top"
                           title="Activity">
                            <span class="fa fa-desktop"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_profile.html" class="text-danger" data-toggle="tooltip" data-placement="top"
                           title="Settings">
                            <span class="fa fa-gears"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_gallery.html" class="text-warning" data-toggle="tooltip" data-placement="top"
                           title="Cron Jobs">
                            <span class="fa fa-flask"></span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sidebar Widget - Author (hidden)  -->
            <div class="sidebar-widget author-widget hidden">
                <div class="media">
                    <a class="media-left" href="#">
                        <img src="assets/img/avatars/3.jpg" class="img-responsive">
                    </a>

                    <div class="media-body">
                        <div class="media-links">
                            <a href="#" class="sidebar-menu-toggle">User Menu -</a> <a
                                    href="pages_login.html">Logout</a>
                        </div>
                        <div class="media-author">Michael Richards</div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Widget - Search (hidden) -->
            <div class="sidebar-widget search-widget hidden">
                <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-search"></i>
              </span>
                    <input type="text" id="sidebar-search" class="form-control" placeholder="Search...">
                </div>
            </div>

        </header>
        <!-- End: Sidebar Header -->

        <!-- Start: Sidebar Menu -->
        <ul class="nav sidebar-menu">
            <li class="sidebar-label pt20">Menu</li>
            <li class="active">
                <a href="/">
                    <span class="glyphicon glyphicon-home"></span>
                    <span class="sidebar-title">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-label pt15">Gerenciar Servidores</li>

            {{-- Server --}}
            <li>
                <a class="accordion-toggle @if (preg_match('[server/]',$route)) menu-open @endif" href="#">
                    <span class="glyphicon glyphicon-hdd"></span>
                    <span class="sidebar-title">Servidores</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav" style="">
                    <li class="@if (!preg_match('[server/list|server/configuration]',$route)) active @endif">
                        <a href="/server">
                            <span class="glyphicon glyphicon-book"></span> Visao Geral </a>
                    </li>
                    <li class="@if (preg_match('[server/list]',$route)) active @endif">
                        <a href="/server/list">
                            <span class="glyphicon glyphicon-book"></span> Listar Servidores </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-label pt15">Loja</li>

            {{-- Shop --}}
            <li>
                <a class="accordion-toggle @if (preg_match('[shop/]',$route)) menu-open @endif" href="#">
                    <span class="glyphicon glyphicon-tags"></span>
                    <span class="sidebar-title">Shop</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav" style="">
                    <li class="@if (!preg_match('[shop/]',$route)) active @endif">
                        <a href="/server">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Visao Geral </a>
                    </li>
                    <li class="@if (preg_match('[shop/product]',$route)) active @endif">
                        <a href="/server/list">
                            <span class="glyphicon glyphicon-tags"></span> Produtos </a>
                    </li>
                    <li class="@if (preg_match('[shop/order]',$route)) active @endif">
                        <a href="/server/list">
                            <span class="fa fa-money"></span> Pedidos </a>
                    </li>
                    <li class="@if (preg_match('[shop/client]',$route)) active @endif">
                        <a href="/server/list">
                            <span class="fa fa-users"></span> Clientes </a>
                    </li>
                    <li class="@if (preg_match('[shop/configuration]',$route)) active @endif">
                        <a href="/server/list">
                            <span class="fa fa-gears"></span> Configurações da Loja </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-label pt15">Ferramentas</li>

            {{-- Bans --}}
            <li class="@if (preg_match('[bans]',$route)) active @endif">
                <a href="/permissions">
                    <span class="glyphicons glyphicons-ban"></span>
                    <span class="sidebar-title">Bans</span>
                </a>
            </li>

            <li class="sidebar-label pt15">Plugins</li>

            {{-- Permissions --}}
            <li class="@if (preg_match('[qualquercoisa]',$route)) active @endif">
                <a href="/permissions">
                    <span class="glyphicon glyphicon-lock"></span>
                    <span class="sidebar-title">Qualqueroica</span>
                </a>
            </li>

            <li class="sidebar-label pt15"></li>
            <li>
                <a class="accordion-toggle @if (preg_match('[settings/]',$route)) menu-open @endif" href="#">
                    <span class="glyphicon glyphicon-cog"></span>
                    <span class="sidebar-title">Configurações</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li class="@if (preg_match('[settings/servers]',$route)) active @endif">
                        <a href="/settings/servers">
                            <span class="glyphicon glyphicon-tasks"></span> Servidores </a>
                    </li>
                    <li class="@if (preg_match('[settings/permissions]',$route)) active @endif">
                        <a href="/settings/permissions">
                            <span class="glyphicon glyphicon-modal-window"></span> Permissões
                        </a>
                    </li>
                </ul>
            </li>



        </ul>
        <!-- End: Sidebar Menu -->

        <!-- Start: Sidebar Collapse Button -->
        <div class="sidebar-toggle-mini">
            <a href="#">
                <span class="fa fa-sign-out"></span>
            </a>
        </div>
        <!-- End: Sidebar Collapse Button -->

    </div>
    <!-- End: Sidebar Left Content -->

</aside>