<?php

namespace App\Http\Controllers\Auth;
// For Auth
namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Requests\Wisata as RequestsWisata;
use App\Models\Galeriwisata;
use App\Models\Wisata;
use App\Rules\MaxCountGaleries;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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
    public function store(RequestsWisata $request, Wisata $wisata)
    {
        $galeries = request()->file('galeri');

        // Galeries tidak boleh lebih 6 gambar
        if (count($galeries) > 6) {
            session()->flash('error', 'Foto tidak boleh lebih dari 6');
            return redirect(route('wisatas.create'));
        }

        // WISATAS
        $attr = $request->all();
        $slug = Str::slug($request->nama);
        $attr['slug'] = $slug;

        // Menyimpan File gambar wisata
        $gambar = request()->file('gambar');
        $gambarUrl = $gambar->storeAs("images/wisatas", "{$slug}.{$gambar->extension()}");
        $attr['gambar'] = $gambarUrl;

        // Create Data Wisata
        Wisata::create($attr);

        // Get last wisata
        $lastWisataId = DB::getPdo()->lastInsertId();

        // GALERIES
        foreach ($galeries as $galeri) {
            $rand = rand(0, 100);
            $galeriUrl = $galeri->storeAs("images/galerywisatas", "{$slug}.{$rand}.{$galeri->extension()}");
            // Create data galeri wisata
            Galeriwisata::create([
                'galeri' => $galeriUrl,
                'wisata_id' => $lastWisataId,
            ]);
        }

        // Validasi Form in Request File

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
        $galeriewisatas = DB::table('galeriwisatas')->where('wisata_id', $wisata->id)->get();
        return view('wisatas.show', compact('wisata', 'galeriewisatas'));
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
        // Validasi Form Manual
        $validator = Validator::make($request->all(), [
            'nama' => [
                'required',
                Rule::unique('wisatas')->ignore($wisata->nama),
            ],
            'deskripsi' => ['required'],
            'lokasi' => ['required'],
            'gambar' => [''],
            'galeri' => ['required', 'array', 'max:6'], // Ini nanti max 6 buat pengurangan di sama reouest inputnya
        ]);
        // dd($validator->fails());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $attr = $request->all();
        $slug = Str::slug($request->nama);

        $attr['slug'] = $slug;

        // Update jika request gambar kosong
        $gambar = request()->file('gambar');
        if (isset($gambar)) {
            $gambarUrl = $gambar->storeAs("images/wisatas", "{$slug}.{$gambar->extension()}");
            Storage::delete($wisata->gambar);
        } else {
            $gambarUrl = $wisata->gambar;
        }

        // Update jika galeri kosong
        $galeries = request()->galeri;
        if (isset($galeries)) {
            foreach ($galeries as $galeri) {
                Storage::delete($wisata->gambar);
                $gambarUrl = $gambar->storeAs("images/wisatas", "{$slug}.{$gambar->extension()}");
            }
        } else {
            $gambarUrl = $wisata->gambar;
        }

        $attr['gambar'] = $gambarUrl;

        // Update jika request gambar kosong

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
        // Delete galeriwisatas Table
        $galeriewisatas = DB::table('galeriwisatas')->where('wisata_id', $wisata->id)->get();
        foreach ($galeriewisatas as $galeriwisata) {
            Storage::delete($galeriwisata->galeri);
        }

        // Delete galeriwisatas Table
        DB::table('galeriwisatas')->where('wisata_id', '=', $wisata->id)->delete();

        // Delete wisatas Storage
        Storage::delete($wisata->gambar);

        // Delete wisatas Table
        $wisata->delete();


        session()->flash('success', 'Wisata berhasil dihapus');
        return redirect(route('wisatas'));
    }
}
