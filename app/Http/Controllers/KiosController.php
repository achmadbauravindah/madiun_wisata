<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateKiosRequest;
use App\Models\Kios;
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
        $menus =
            DB::table('menus')
            ->where('kios_id', '=', $kios->id)
            ->get();
        return view('auth.seller.kios.index', compact('kios', 'menus'));
    }

    public function indexManager()
    {
        $lapakumkm_id = auth()->guard('manager')->user()->lapakumkm_id;
        $kioses =
            DB::table('kios')
            ->where('lapakumkm_id', '=', $lapakumkm_id)
            ->get();
        return view('auth.manager.verification-kioses.index', compact('kioses'));
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
        //
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
        $kios->delete();
        Storage::delete($kios->foto);
        session()->flash('success', 'Kios berhasil dihapus');
        return redirect(route('manager.kioses'));
    }

    public function verification(Kios $kios)
    {
        $attr = request()->all();

        if (!request()->no_kios) {
            session()->flash('<no_kios></no_kios>', 'Harap isi nomer kios');
            return redirect()->back();
        }
        if (request()->agree == 2) {
            session()->flash('success', 'Kios telah diterima');
        } else {
            session()->flash('success', 'Kios telah ditolak');
        }

        $kios->update($attr);

        return redirect(route('manager.kioses'));
    }
}
