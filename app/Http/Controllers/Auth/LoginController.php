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
        $this->middleware('guest:manager')->except('logout');
        $this->middleware('guest:seller')->except('logout');
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
            return redirect()->intended('/admin');
        }
        session()->flash('error', 'Username atau Password salah');
        return back()->withInput($request->only('username', 'remember'));
    }

    // Lodgers
    public function showLodgerLoginForm()
    {
        return view('auth.lodger.login');
    }

    public function lodgerLogin(Request $request)
    {
        $this->validate($request, [
            'nik'   => 'required|min:16',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('lodger')->attempt(['nik' => $request->nik, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/lodger');
        }
        session()->flash('error', 'Username atau Password salah');
        return back()->withInput($request->only('nik', 'remember'));
    }

    // Manager
    public function showManagerLoginForm()
    {
        return view('auth.manager.login');
    }

    public function managerLogin(Request $request)
    {
        $this->validate($request, [
            'nik'   => 'required|min:16',
            'password' => 'required|min:6'
        ]);

        // dd($request->password);
        if (Auth::guard('manager')->attempt(['nik' => $request->nik, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/manager');
        }
        session()->flash('error', 'Username atau Password salah');
        return back()->withInput($request->only('nik', 'remember'));
    }

    // Manager
    public function showSellerLoginForm()
    {
        return view('auth.seller.login');
    }

    public function sellerLogin(Request $request)
    {
        $this->validate($request, [
            'nik'   => 'required|min:16',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('seller')->attempt(['nik' => $request->nik, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/seller');
        }
        session()->flash('error', 'Username atau Password salah');
        return back()->withInput($request->only('nik', 'remember'));
    }
}
