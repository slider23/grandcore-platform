<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Create a new controller instance.
     *
     * @return redirect
     */
    public function checklogin(Request $request)
    {
        if (Auth::attempt([
            'email' => request()->input('email'),
            'password' => request()->input('password'),
        ])) {

            // здесь нужно глянуть является ли пользователь админом
            // если да нужно сгенерить jwtToken положить в заголовок и отдать клиенту
            // клиент пишет в localStorage и когда пойдет на /admin его пустит в админ панель
            return redirect('/');
        } else {
            return redirect('/')->with('error', 'Неверный логин или пароль');
        }
    }
}
