<?php

namespace EhControl\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use EhControl\Http\Requests;
use EhControl\Http\Controllers\Controller;

class SettingsController extends Controller
{

    public function serversGet()
    {
        $route = Route::getFacadeRoot()->current()->uri();

        return view ("settings.servers",  compact('server', 'route'));
    }

    public function permissionsGet()
    {
        $route = Route::getFacadeRoot()->current()->uri();

        return view ("settings.permissions",  compact('server', 'route'));
    }

}
