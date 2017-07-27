<?php

namespace EhControl\Http\Controllers;

use Illuminate\Http\Request;

use EhControl\Http\Requests;
use EhControl\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route = Route::getFacadeRoot()->current()->uri();;

        return view('permissions.index', compact('route'));
    }


    public function editPermissions($server_id)
    {
        $route = Route::getFacadeRoot()->current()->uri();;
        $server['id'] = $server_id;

        $groups[] = 'Jogador';
        $groups[] = 'VIP';
        $groups[] = 'Fundador';

        for($i = 0; $i < 10; $i++)
        {
            $permissions[$i]['node'] = 'permission.teste' . ($i + 1);
            $permissions[$i]['id'] = $i+1;
        }

        return view('permissions.permissions', compact('server', 'route', 'groups', 'permissions'));
    }

    public function editUsers($server_id)
    {
        $route = Route::getFacadeRoot()->current()->uri();;
        $server['id'] = $server_id;

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

        return view('permissions.edit.users', compact('server', 'route', 'groups', 'users'));
    }

    public function showConfiguration()
    {
        $route = Route::getFacadeRoot()->current()->uri();;

        return view('permissions.configuration', compact('route'));
    }

    public function addPermissionGet($server_id)
    {
        $route = Route::getFacadeRoot()->current()->uri();;

        return view("permissions.add.permission", compact('route'));
    }

    public function addPermissionPost(Request $request)
    {

    }

    public function addUserGet($server_id)
    {
        $route = Route::getFacadeRoot()->current()->uri();;

        return view("permissions.add.user", compact('route'));
    }

    public function addUserPost(Request $request)
    {

    }

}
