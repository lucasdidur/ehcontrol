<?php

namespace EhControl\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Mcprohosting\MulticraftApi\MulticraftApi;
use Illuminate\Http\Request;

use EhControl\Http\Requests;
use EhControl\Http\Controllers\Controller;
use Mcprohosting\MulticraftApi\Multicraft;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'doLogout']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route = Route::getFacadeRoot()->current()->uri();;

        return view("home", compact('route'));
    }


}
