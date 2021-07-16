<?php

namespace App\Http\Controllers\Restaurant\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Restaurant;
use Illuminate\Http\Request;

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
    protected function redirectTo() {
        session()->flash('flash_message', 'ログインしました');
        return RouteServiceProvider::RESTAURANT_HOME;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:restaurant')->except('logout');
    }

    public function showLoginForm()
    {
        return view('restaurant.auth.login');
    }

    protected function guard(){
        return Auth::guard('restaurant');
    }

    //ゲストユーザー用のユーザーIDを定数として定義
    private const GUEST_USER_ID = 1;

    //ゲストログイン処理
    public function guestLogin()
    {
        if (Auth('restaurant')->loginUsingId(self::GUEST_USER_ID)) {
            return redirect('/restaurant')->with('flash_message', 'ログインしました');
        }
        return redirect('/restaurant');
    }

    // ログアウト時にフラッシュメッセージの表示（オーバーライド）
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        session()->flash('flash_message', 'ログアウトしました');

        return $this->loggedOut($request) ?: redirect('/');
    }
}
