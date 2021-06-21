<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateLodgerRequest;
use App\Models\Lodger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class LodgerController extends Controller
{
    public function index()
    {
        return view('auth.lodger.index');
    }

    public function indexAdmin()
    {
        $lodgers = Lodger::all();
        return view('auth.admin.manage-lodgers.index', compact('lodgers'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lodger  $lodger
     * @return \Illuminate\Http\Response
     */
    public function show(Lodger $lodger)
    {
        return view('lodger');
    }

    public function showAdmin(Lodger $lodger)
    {
        return view('auth.admin.manage-lodgers.show', compact('lodger'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lodger  $lodger
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $lodger = auth()->guard('lodger')->user();
        return view('auth.lodger.edit', compact('lodger'));
    }

    public function editPassword()
    {
        return view('auth.lodger.editPassword');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lodger  $lodger
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLodgerRequest $request)
    {
        $lodger_id = auth()->guard('lodger')->user()->id;
        $lodger = Lodger::find($lodger_id);

        $attr = request()->all();

        // Update jika request password kosong
        if (request()->password) {
            $attr['password'] = Hash::make(request()->password);
        } else {
            $attr['password'] = $lodger->password;
        }
        // Update jika request gambar kosong
        $ktp_img = request()->file('ktp_img');
        if (isset($ktp_img)) {
            $nik = request()->nik;
            $ktp_imageUrl = $ktp_img->storeAs("images/ktps/lodgers", "{$nik}.{$ktp_img->extension()}");
            Storage::delete($lodger->ktp_img);
        } else {
            $ktp_imageUrl = $lodger->ktp_img;
        }

        $attr['ktp_img'] = $ktp_imageUrl;

        $lodger->update($attr);

        return redirect()->route('lodger.edit')->with('success', 'Akun telah diubah');
    }

    public function updatePassword()
    {
        request()->validate([
            'oldPassword' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $attr = request()->all();

        $lodger_id = auth()->guard('lodger')->user()->id;
        $lodger = Lodger::find($lodger_id);

        if (Hash::check(request()->oldPassword, $lodger->password)) {
            $attr['password'] = Hash::make(request()->password);
            $lodger->update($attr);
            return redirect()->route('lodger.editPassword')->with('success', 'Password telah diubah');
        } else {
            return redirect()->route('lodger.editPassword')->with('error', 'Password lama salah');
        }

        return redirect()->route('lodger.editPassword')->with('success', 'Password telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lodger  $lodger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lodger $lodger)
    {
        $lodger->delete();

        return redirect()->route('manage-lodger')->with('success', 'Akun berhasil dihapus');
    }
}
