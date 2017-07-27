<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Demindo\MulticraftApi\MulticraftApi;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
