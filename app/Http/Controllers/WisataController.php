<?php

namespace App\Http\Controllers\Auth;
// For Auth
namespace App\Http\Controllers;

use App\Http\Requests\Wisata as RequestsWisata;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Auth;


class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $wisatas =  Wisata::latest()->paginate(8);
        return view('wisatas.index', compact('wisatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Wisata $wisata)
    {
        return view('wisatas.create', compact('wisata'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsWisata $request)
    {
        $attr = $request->all();
        $slug = \Str::slug($request->nama);
        $attr['slug'] = $slug;

        // Menyimpan File gambar
        $gambar = request()->file('gambar');
        $gambarUrl = $gambar->storeAs("images/wisatas", "{$slug}.{$gambar->extension()}");
        $attr['gambar'] = $gambarUrl;

        // Validasi terjadi di RequestWisata (file Request)
        Wisata::create($attr);

        session()->flash('success', 'Wisata telah ditambahkan');
        return redirect(route('wisatas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function show(Wisata $wisata)
    {
        if (!$wisata) {
            abort(404);
        }

        return view('wisatas.show', compact('wisata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function edit(Wisata $wisata)
    {
        return view('wisatas.edit', compact('wisata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wisata $wisata)
    {

        $attr = $request->all();
        $slug = \Str::slug($request->nama);

        $attr['slug'] = $slug;

        // Jika tidak ada gambar maka ambil gambar sebelumnya
        $gambar = request()->file('gambar');
        if (isset($gambar)) {
            \Storage::delete($wisata->gambar);
            $gambarUrl = $gambar->storeAs("images/wisatas", "{$slug}.{$gambar->extension()}");
        } else {
            $gambarUrl = $wisata->gambar;
        }

        $attr['gambar'] = $gambarUrl;

        // Validasi terjadi di RequestWisata (file Request)
        $wisata->update($attr);

        session()->flash('success', 'Wisata berhasil diedit');
        return redirect(route('wisatas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wisata $wisata)
    {
        $wisata->delete();
        \Storage::delete($wisata->gambar);
        session()->flash('success', 'Wisata berhasil dihapus');
        return redirect(route('wisatas'));
    }
}
