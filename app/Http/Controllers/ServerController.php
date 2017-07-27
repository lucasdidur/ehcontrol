<?php

namespace EhControl\Http\Controllers;

use Mcprohosting\MulticraftApi\MulticraftApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use EhControl\Http\Requests;
use EhControl\Http\Controllers\Controller;

class ServerController extends Controller
{
    public function __construct()
    {
        $this->multicraft = new MulticraftApi(config('credentials.local.url'), config('credentials.local.user'), config('credentials.local.key'));
    }

    /**
     * Display a overview of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route = Route::getFacadeRoot()->current()->uri();
        return view('server.overview', compact('server', 'route'));
}

    public function showConfiguration()
    {
        $route = Route::getFacadeRoot()->current()->uri();

        return view('server.configuration', compact('route'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAll()
    {
        $response = $this->multicraft->call("listServers");
        $route = Route::getFacadeRoot()->current()->uri();

        $servers = array();
        if ($response['success'] == true) {
            foreach ($response['data']['Servers'] as $k => $v) {

                $infos2 = $this->multicraft->call("getServerStatus", ['id' => $k])['data'];

                $servers[$k]['id'] = $k;
                $servers[$k]['name'] = $v;
                $servers[$k]['status'] = $infos2['status'];
                $servers[$k]['online'] = $infos2['onlinePlayers'];
            }

            uasort($servers, function ($a, $b) {
                if ($a['name'] == $b['name']) return 0;
                return $a['name'] > $b['name'] ? 1 : -1;
            });
        }
        return view('server.list', compact('servers', 'route'))->withErrors($response['errors']);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infos = $this->multicraft->call("getServer", ['id' => $id])['data']['Server'];
        $status = $this->multicraft->call("getServerStatus", ['id' => $id])['data'];
        $route = Route::getFacadeRoot()->current()->uri();

        $server['id'] = $id;
        $server['name'] = $infos['name'];
        $server['status'] = $status['status'];
        $server['online'] = $status['onlinePlayers'];
        $server['max'] = $infos['players'];
        $server['port'] = $infos['port'];
        $server['ip'] = $infos['ip'];
        $server['memory'] = $infos['memory'];
        $server['suspended'] = $infos['suspended'];


        return view('server.index', compact('server', 'route'));
    }

    /**
     * Display the server console.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function showConsole($id)
    {
        //$status = $this->multicraft->call("getServerLog", ['id' => $id])['data'];
        $infos = $this->multicraft->call("getServer", ['id' => $id])['data']['Server'];
        $route = Route::getFacadeRoot()->current()->uri();

        $server['id'] = $id;
        $server['name'] = $infos['name'];

        //$server['name'] = $infos['name'];

        //foreach($status as $k => $v)
        //{
        //    $server['lines'][] = $v['line'];
        //}

        //$server['line'] = array_reverse($server['line']);*/

        return view('server.console', compact('server', 'route'));
    }


    public function showPlayers($id)
    {
        $infos = $this->multicraft->call("getServer", ['id' => $id])['data']['Server'];
        $route = Route::getFacadeRoot()->current()->uri();

        $server['id'] = $id;
        $server['name'] = $infos['name'];

        return view('server.players', compact('server', 'route'));
    }

    public function showPermissionsPermission($server_id)
    {
        $infos = $this->multicraft->call("getServer", ['id' => $server_id])['data']['Server'];
        $route = Route::getFacadeRoot()->current()->uri();

        $server['id'] = $server_id;
        $server['name'] = $infos['name'];

        $groups[] = 'Jogador';
        $groups[] = 'VIP';
        $groups[] = 'Fundador';

        for($i = 0; $i < 10; $i++)
        {
            $permissions[$i]['node'] = 'permission.teste' . ($i + 1);
            $permissions[$i]['id'] = $i+1;
        }

        return view('server.permissions.permissions', compact('server', 'route', 'groups', 'permissions'));
    }

    public function showPermissionsUser($server_id)
    {
        $infos = $this->multicraft->call("getServer", ['id' => $server_id])['data']['Server'];
        $route = Route::getFacadeRoot()->current()->uri();

        $server['id'] = $server_id;
        $server['name'] = $infos['name'];

        $groups[] = 'Jogador';
        $groups[] = 'VIP';
        $groups[] = 'Fundador';

        $users[0]['user'] = 'lucasdidur';
        $users[0]['id'] = 1;
        $users[1]['user'] = 'cassio';
        $users[1]['id'] = 2;
        $users[2]['user'] = 'marcos3ds';
        $users[2]['id'] = 3;
        $users[3]['user'] = 'bull';
        $users[3]['id'] = 4;
        $users[4]['user'] = 'thiago';
        $users[4]['id'] = 5;

        return view('server.permissions.users', compact('server', 'route', 'groups', 'users'));
    }
}
