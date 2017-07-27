@extends('template')

@section('top_bar')
    @include('component.top_bar-title')
@stop

@section('content')
    <div class="row">
        <div>
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="fa fa-remove pr10"></i>
                        <strong>Oops!</strong> {!!  $error !!}
                    </div>
                @endforeach
            @endif

            <div class="panel ">
                <div class="panel-heading">
                    <span class="panel-title hidden-xs"> Servidores </span>
                </div>
                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table admin-form theme-warning fs13 ">
                            <thead>
                            <tr class="bg-light">
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Status</th>
                                <th>Players</th>
                                <th>Ping</th>
                                <th>Ação</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($servers  as $server)
                            <tr>
                                <td><a href="/server/{{$server['id']}}" class="btn btn-default">{{$server['id']}}</a></td>
                                <td>{{$server['name']}}</td>

                                @if( $server['status'] == 'online')
                                <td><span class="label label-success">Online</span></td>
                                @else
                                <td><span class="label label-danger">Offline</span></td>
                                @endif

                                <td>{{$server['online']}} players</td>
                                <td><span class="label label-success">200ms</span></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Ação
                                            <span class="caret ml5"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="/server/{{$server['id']}}">Visão geral</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="/server/{{$server['id']}}/console">Console</a>
                                            </li>
                                            <li>
                                                <a href="/server/{{$server['id']}}/players">Players</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="/server/{{$server['id']}}/configurations">Configurações</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop