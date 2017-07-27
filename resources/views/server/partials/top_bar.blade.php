@section('top_bar')
    <header id="topbar" class="ph10">
        <div class="topbar-left">
            <ul class="nav nav-list nav-list-topbar pull-left">
                <li>
                    <b>{{$server['name']}}</b>
                </li>
                <li class="@if (!preg_match('[console|players|permissions|configuracoes]', $route)) active @endif">
                    <a href="/server/{{$server['id']}}/"><span class="fa fa-dashboard"></span> Visão Geral</a>
                </li>
                <li class="@if (preg_match('[console]', $route)) active @endif">
                    <a href="/server/{{$server['id']}}/console"><span class="fa fa-desktop"></span> Console</a>
                </li>
                <li class="@if (preg_match('[players]', $route)) !== false) active @endif">
                    <a href="/server/{{$server['id']}}/players"><span class="fa fa-gamepad"></span> Players</a>
                </li>
                <li class="@if (preg_match('[permissions]', $route)) !== false) active @endif">
                    <a href="/server/{{$server['id']}}/permissions"><span class="fa fa-lock"></span> Permissions</a>
                </li>
                <li class="@if (preg_match('[configuracoes]', $route)) !== false) active @endif">
                    <a href="/server/{{$server['id']}}/configurations"><span class="fa fa-cog"></span> Configurações</a>
                </li>
            </ul>
        </div>
    </header>
@stop

