<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Admin;
use App\Models\Lodger;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:lodger');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }

    // Lodger
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLodgerRegisterForm()
    {
        return view('auth.register', ['url' => 'lodger']);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */


    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createAdmin(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|alpha_num|min:5|max:25|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);
        Admin::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/admin');
    }



    // Lodger


    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createLodger(Request $request)
    {
        // Get Path File For FOTO KTP (ktp_img)
        $no_ktp = request()->no_ktp;
        $ktp_img = request()->file('ktp_img');
        $gambarUrl = $ktp_img->storeAs("images/ktps", "{$no_ktp}.{$ktp_img->extension()}");

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:lodgers',
            'no_ktp' => 'required|string|min:16|unique:lodgers',
            'ktp_img' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'password' => 'required|string|min:6|confirmed',
            'no_telp' => 'required|string|max:20',
            'no_wa' => 'required|string|max:20',
            'alamat' => 'required|string',
        ]);
        Lodger::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_ktp' => $request->no_ktp,
            'ktp_img' => $gambarUrl,
            'password' => Hash::make($request->password),
            'no_telp' => $request->no_telp,
            'no_wa' => $request->no_wa,
            'alamat' => $request->alamat,
        ]);

        return redirect()->intended('login/lodger');
    }
}
