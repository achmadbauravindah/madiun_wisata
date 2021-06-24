<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKiosRequest;
use App\Http\Requests\UpdateKiosRequest;
use App\Models\Kios;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class KiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function indexSeller()
    {
        $seller_id = auth()->guard('seller')->user()->id;
        $kios =
            DB::table('kios')
            ->where('seller_id', '=', $seller_id)
            ->first();

        return view('auth.seller.kios.index', compact('kios'));
    }

    public function indexManager()
    {
        $manager = auth()->guard('manager')->user();
        $lapakumkm_id = auth()->guard('manager')->user()->lapakumkm_id;
        $kioses =
            DB::table('kios')
            ->where('lapakumkm_id', '=', $lapakumkm_id)
            ->get();
        return view('auth.manager.verification-kioses.index', compact('kioses', 'manager'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.seller.kios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Kios $kios, StoreKiosRequest $request)
    {
        $seller = auth()->guard('seller')->user();
        $seller_id = $seller->id;
        $lapakumkm_id = $seller->lapakumkm->id;

        // Kios
        $attr['nama'] = $request->nama_kios;
        $attr['seller_id'] = $seller_id;
        $attr['lapakumkm_id'] = $lapakumkm_id;
        $slug = Str::slug($request->nama_kios);
        $attr['slug'] = $slug;
        Kios::create($attr);

        // Clear in attr
        unset($attr);

        // Menus
        $kios_id = DB::getPdo()->lastInsertId();
        $attr['kios_id'] = $kios_id;
        $attr['nama'] = $request->nama_menu;
        $attr['jenis_menu'] = $request->jenis_menu;
        $attr['harga'] = $request->harga;
        Menu::create($attr);

        // unset nama biar ga tabrakan nama di kolom naa yang sama
        unset($attr['nama']);
        unset($attr['jenis_menu']);
        unset($attr['harga']);

        // Update seller
        DB::table('sellers')->where('id', '=', $seller_id)->update($attr);


        session()->flash('success', 'Kios telah didaftarkan');
        return redirect(route('seller'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kios  $kios
     * @return \Illuminate\Http\Response
     */
    public function show(Kios $kios)
    {
        //
    }

    public function showManager(Kios $kios)
    {
        return view('auth.manager.verification-kioses.show', compact('kios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kios  $kios
     * @return \Illuminate\Http\Response
     */
    public function edit(Kios $kios)
    {
        $seller_id = auth()->guard('seller')->user()->id;
        $kios =
            DB::table('kios')
            ->where('seller_id', '=', $seller_id)
            ->first();
        $menus =
            DB::table('menus')
            ->where('kios_id', '=', $kios->id)
            ->get();

        return view('auth.seller.kios.edit', compact('kios', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kios  $kios
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKiosRequest $request, Kios $kios)
    {
        $attr = $request->all();
        $slug = Str::slug($request->nama);
        $attr['slug'] = $slug;

        // Foto kios tidak dipakai
        $foto = request()->file('foto');
        if ($foto) {
            Storage::delete($kios->foto);
            $fotoUrl = $foto->storeAs("images/kioses", "{$slug}.{$foto->extension()}");
        } else {
            $fotoUrl = $kios->foto;
        }

        $attr['foto'] = $fotoUrl;

        $kios->update($attr);

        session()->flash('success', 'kios berhasil diedit');
        return redirect(route('seller.kios'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kios  $kios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kios $kios)
    {
        // Delete menus Table
        DB::table('menus')->where('kios_id', '=', $kios->id)->delete();

        $kios->delete();
        Storage::delete($kios->foto);
        session()->flash('success', 'Kios berhasil dihapus');
        return redirect(route('manager.kioses'));
    }

    public function verification(Kios $kios)
    {
        $attr = request()->all();

        if (request()->agree == 2) {
            if (!request()->no_kios) {
                session()->flash('no_kios', 'Harap isi nomer kios');
                return redirect()->back();
            }
        }
        if (request()->agree == 2) {
            session()->flash('success', 'Kios telah diterima');
        } else {
            session()->flash('success', 'Kios telah ditolak');
        }

        $kios->update($attr);

        return redirect(route('manager.kioses'));
    }

    public function searchInManager()
    {
        $manager = auth()->guard('manager')->user();
        $lapakumkm_id = auth()->guard('manager')->user()->lapakumkm_id;
        if (request()->searchInManager) {
            $kioses = DB::table('kios')
                ->where('lapakumkm_id', '=', $lapakumkm_id)
                ->where(
                    function ($kioses) {
                        $kioses->where('nama', 'like', '%' . request()->searchInManager . '%')
                            ->get();
                    }
                )->simplePaginate(15);
        } else {

            $kioses =
                DB::table('kios')
                ->where('lapakumkm_id', '=', $lapakumkm_id)
                ->get();
        }
        return view('auth.manager.verification-kioses.index', compact('manager', 'kioses'));
    }
}
