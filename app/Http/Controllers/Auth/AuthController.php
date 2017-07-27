<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Redirect;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\ThrottlesLogins;

class AuthController extends Controller
{
    use AuthenticatesUsers  ;


    public function __construct()
    {
        $this->middleware('guest', ['except' => 'doLogout']);
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $validator = Validator::make($request->all(), array(
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        ));

        if ($validator->fails()) {
            return Redirect::to('auth/login')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            $userdata = array(
                'email' => $request->input('email'),
                'password' => $request->input('password')
            );

            if (Auth::attempt($userdata, $request->remember)) {
                return Redirect::to('/');
            } else {
                return Redirect::to('auth/login')
                    ->withErrors("Nome de usuário ou senha inválidos!");
            }
        }
    }

    public function doLogout()
    {
        Auth::logout();
        return Redirect::to('auth/login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function doRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return Redirect::to('auth/register')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        Auth::login($this->create($request->all()));

        return redirect("/");
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:4',
            'username_minecraft' => 'required|max:255|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'username_minecraft' => $data['username_minecraft'],
            'phone' => $data['phone']
        ]);
    }
}
