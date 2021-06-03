<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(Request $request)
    {
        // Ini digunakan untuk melindungi Controller ini di middleware
        // Artinya gini, jika ada admin atau lodger yang sudah login, maka
        // akan dilindungi oleh midlewarenya, kecuali kalau dia logout (tidak login sama sekali)
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:lodger')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('auth.admin.login');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required|alpha_num|min:5',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            // dd(auth()->guard('admin')->check());
            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('username', 'remember'));
    }



    // Lodgers
    public function showLodgerLoginForm()
    {
        return view('auth.lodger.login', ['url' => 'lodger']);
    }

    public function lodgerLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email|string',
            'password' => 'required|min:6'
        ]);


        if (Auth::guard('lodger')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/lodger');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}
