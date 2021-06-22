<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSellerRequest;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.seller.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {
        $seller = auth()->guard('seller')->user();
        return view('auth.seller.edit', compact('seller'));
    }

    public function editPassword()
    {
        return view('auth.seller.editPassword');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSellerRequest $request, Seller $seller)
    {
        $seller_id = auth()->guard('seller')->user()->id;
        $seller = Seller::find($seller_id);

        $attr = request()->all();

        // Update jika request password kosong
        if (request()->password) {
            $attr['password'] = Hash::make(request()->password);
        } else {
            $attr['password'] = $seller->password;
        }
        // Update jika request gambar kosong
        $ktp_img = request()->file('ktp_img');
        if (isset($ktp_img)) {
            $nik = request()->nik;
            $ktp_imageUrl = $ktp_img->storeAs("images/ktps/sellers", "{$nik}.{$ktp_img->extension()}");
            Storage::delete($seller->ktp_img);
        } else {
            $ktp_imageUrl = $seller->ktp_img;
        }

        $attr['ktp_img'] = $ktp_imageUrl;

        $seller->update($attr);

        return redirect()->route('seller.edit')->with('success', 'Akun telah diubah');
    }

    public function updatePassword()
    {
        request()->validate([
            'oldPassword' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $attr = request()->all();

        $seller_id = auth()->guard('seller')->user()->id;
        $seller = Seller::find($seller_id);

        if (Hash::check(request()->oldPassword, $seller->password)) {
            $attr['password'] = Hash::make(request()->password);
            $seller->update($attr);
            return redirect()->route('seller.editPassword')->with('success', 'Password telah diubah');
        } else {
            return redirect()->route('seller.editPassword')->with('error', 'Password lama salah');
        }

        return redirect()->route('seller.editPassword')->with('success', 'Password telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        //
    }
}
