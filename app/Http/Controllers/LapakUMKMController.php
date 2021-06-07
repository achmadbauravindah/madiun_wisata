<?php

// namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers;

use App\Http\Requests\StoreLapakumkmRequest;
use App\Http\Requests\UpdateLapakumkmRequest;
use App\Models\Lapakumkm;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LapakumkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lapakumkms =  Lapakumkm::all();
        return view('lapakumkms.index', compact('lapakumkms'));
    }

    public function indexAdmin()
    {
        $lapakumkms =  Lapakumkm::all();
        return view('auth.admin.lapakumkms.index', compact('lapakumkms'));
    }

    public function indexManager()
    {
        $manager_id = auth()->guard('manager')->user()->id;
        $lapakumkm = Lapakumkm::where('manager_id', '=', $manager_id)->first();

        return view('auth.manager.lapakumkms.index', compact('lapakumkm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.admin.lapakumkms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLapakumkmRequest $request)
    {
        $attr = $request->all();

        $slug = Str::slug($request->nama);
        $attr['slug'] = $slug;

        // Menyimpan File foto
        $foto = request()->file('foto');
        $fotoUrl = $foto->storeAs("images/lapakumkms", "{$slug}.{$foto->extension()}");
        $attr['foto'] = $fotoUrl;

        Lapakumkm::create($attr);

        session()->flash('success', 'Lapak UMKM telah ditambahkan');
        return redirect(route('admin.lapakumkms'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lapakumkm  $lapakumkm
     * @return \Illuminate\Http\Response
     */
    public function show(Lapakumkm $lapakumkm)
    {
        // $kios =
        //     DB::table('kioses')
        //     ->where('lapakumkm_id', '=', $lapakumkm->id)
        //     ->get();
        return view('lapakumkms.show', compact('lapakumkm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lapakumkm  $lapakumkm
     * @return \Illuminate\Http\Response
     */
    public function edit(Lapakumkm $lapakumkm)
    {
        return view('auth.admin.lapakumkms.edit', compact('lapakumkm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lapakumkm  $lapakumkm
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLapakumkmRequest $request, Lapakumkm $lapakumkm)
    {
        $attr = $request->all();
        $slug = Str::slug($request->nama);
        $attr['slug'] = $slug;

        $foto = request()->file('foto');
        if ($foto) {
            Storage::delete($lapakumkm->foto);
            $fotoUrl = $foto->storeAs("images/lapakumkms", "{$slug}.{$foto->extension()}");
        } else {
            $fotoUrl = $lapakumkm->foto;
        }

        $attr['foto'] = $fotoUrl;

        $lapakumkm->update($attr);

        session()->flash('success', 'lapakumkm berhasil diedit');
        if (auth()->guard('admin')->check()) {
            return redirect(route('admin.lapakumkms'));
        }
        return redirect(route('manager.lapakumkm'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lapakumkm  $lapakumkm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lapakumkm $lapakumkm)
    {
        if ($lapakumkm->manager_id) {
            session()->flash('error', 'Lapak gagal dihapus, karena masih ada manager yang punya');
            return redirect(route('admin.lapakumkms'));
        }
        if ($lapakumkm->kioses) {
            session()->flash('error', 'Lapak gagal dihapus, karena masih ada kios yang punya');
            return redirect(route('admin.lapakumkms'));
        }
        $lapakumkm->delete();
        Storage::delete($lapakumkm->foto);
        session()->flash('success', 'Lapak berhasil dihapus');
        return redirect(route('admin.lapakumkms'));
    }
}
