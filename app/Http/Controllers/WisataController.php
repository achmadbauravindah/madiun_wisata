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

        session()->flash('success', 'The post was created');
        return redirect(route('wisatas.create'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wisata $wisata)
    {
        //
    }
}
