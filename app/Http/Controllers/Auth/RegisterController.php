<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Admin;
use App\Models\Lodger;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterLodgerRequest;
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

    // Lodger
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLodgerRegisterForm()
    {
        return view('auth.lodger.register');
    }

    // Lodger
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createLodger(RegisterLodgerRequest $request)
    {
        // Get Path File For FOTO KTP (ktp_img)
        $nik = request()->nik;
        $ktp_img = request()->file('ktp_img');
        $imageUrl = $ktp_img->storeAs("images/ktps", "{$nik}.{$ktp_img->extension()}");

        Lodger::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nik' => $request->nik,
            'ktp_img' => $imageUrl,
            'password' => Hash::make($request->password),
            'no_telp' => $request->no_telp,
            'no_wa' => $request->no_wa,
            'alamat' => $request->alamat,
        ]);

        return redirect()->intended('lodger/login')->with('success', 'Akun telah ditambahkan, Silahkan Login');
    }
}
