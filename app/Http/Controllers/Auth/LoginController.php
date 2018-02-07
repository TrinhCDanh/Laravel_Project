<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Http\Requests\LoginRequest;
use Hash;

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
    protected $redirectTo = '/admin/product/list';
    //protected $redirectAfterLogout = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    /*public function login($request) {
        if (Auth::attempt(['email' => email, 'password' => password, 'level' => 1])) {
            return redirect()->route('admin.cate.getAdd');
        } else {
            return redirect()->back();
        }
    }*/

    /*public function getLogin() {
        if (isset(\Auth::user()->username))
            return redirect()->route('admin.cate.getAdd');
        else
            return view('admin.login');
    }

    public function postLogin(LoginRequest $request) {
        $login = array(
            'username' => $request->user, 
            'password' => $request->password,
            'level' => 1
        );
        if (\Auth::attempt($login)) {
            return redirect()->route('admin.cate.getAdd');
        } else {
            return redirect()->back();
        }
    }*/
}
