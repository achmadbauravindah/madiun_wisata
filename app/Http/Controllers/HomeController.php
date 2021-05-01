<?php


namespace App\Http\Controllers;

namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers;

use App\Models\Admin;
// use Illuminate\Http\Request;
use Auth;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\True_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // Construct ini akan jalan jika sistem tampil, jika tidak memerlukan login, ini di disable saja
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Admin $admin, Request $request)
    {
        $user = Auth::user();
        return view('home', compact('user'));
    }

    function disableDefaultAuth()
    {
        return redirect('/');
    }
}
