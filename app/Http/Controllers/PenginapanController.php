<?php

namespace App\Http\Controllers;

use App\Models\Penginapan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class PenginapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penginapans =  Penginapan::latest()->paginate(8);
        return view('penginapans.index', compact('penginapans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Penginapan $penginapan)
    {
        return view('penginapans.create', compact('penginapan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = $request->all();
        $slug = Str::slug($request->nama);
        $attr['slug'] = $slug;

        // Menyimpan File gambar
        $gambar = request()->file('gambar');
        $gambarUrl = $gambar->storeAs("images/penginapan", "{$slug}.{$gambar->extension()}");
        $attr['gambar'] = $gambarUrl;

        // Validasi terjadi di RequestWisata (file Request)
        Penginapan::create($attr);

        session()->flash('success', 'Penginapan telah ditambahkan');
        return redirect(route('penginapans'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penginapan  $penginapan
     * @return \Illuminate\Http\Response
     */
    public function show(Penginapan $penginapan)
    {
        if (!$penginapan) {
            abort(404);
        }

        return view('penginapans.show', compact('penginapan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penginapan  $penginapan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penginapan $penginapan)
    {
        return view('penginapans.edit', compact('penginapan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penginapan  $penginapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penginapan $penginapan)
    {
        $attr = $request->all();
        $slug = Str::slug($request->nama);

        $attr['slug'] = $slug;

        // Jika tidak ada gambar maka ambil gambar sebelumnya
        $gambar = request()->file('gambar');
        if (isset($gambar)) {
            Storage::delete($penginapan->gambar);
            $gambarUrl = $gambar->storeAs("images/penginapans", "{$slug}.{$gambar->extension()}");
        } else {
            $gambarUrl = $penginapan->gambar;
        }

        $attr['gambar'] = $gambarUrl;

        // Validasi terjadi di Requestpenginapan (file Request)
        $penginapan->update($attr);

        session()->flash('success', 'penginapan berhasil diedit');
        return redirect(route('penginapans'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penginapan  $penginapan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penginapan $penginapan)
    {
        $penginapan->delete();
        Storage::delete($penginapan->gambar);
        session()->flash('success', 'penginapan berhasil dihapus');
        return redirect(route('penginapans'));
    }
}
