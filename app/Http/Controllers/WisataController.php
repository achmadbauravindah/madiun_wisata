<?php

namespace App\Http\Controllers\Auth;
// For Auth
namespace App\Http\Controllers;

use App\Http\Requests\StoreWisataRequest;
use App\Http\Requests\UpdateWisataRequest;
use Illuminate\Support\Str;
use App\Models\Galeriwisata;
use App\Models\Wisata;
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
        $wisatas =  Wisata::all();
        return view('wisatas.index', compact('wisatas'));
    }

    public function indexAdmin()
    {
        $wisatas =  Wisata::all();
        return view('auth.admin.wisatas.index', compact('wisatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Wisata $wisata)
    {
        return view('auth.admin.wisatas.create', compact('wisata'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWisataRequest $request, Wisata $wisata)
    {

        // WISATAS
        $attr = $request->all();
        $slug = Str::slug($request->nama);
        $attr['slug'] = $slug;

        // Menyimpan File gambar wisata
        $gambar = request()->file('gambar');
        $gambarUrl = $gambar->storeAs("images/wisatas", "{$slug}.{$gambar->extension()}");
        $attr['gambar'] = $gambarUrl;

        Wisata::create($attr);

        // GALERIES
        $galeries = request()->file('galeri');
        $getLastWisataId = DB::getPdo()->lastInsertId();
        foreach ($galeries as $galeri) {
            // $getLastGaleri for naming image constraint
            $getLastGaleri = Galeriwisata::all()->last();
            if ($getLastGaleri == null) {
                $getLastGaleriId = 1;
            } else {
                $getLastGaleriId = $getLastGaleri->id + 1;
            }
            $galeriUrl = $galeri->storeAs("images/galerywisatas", "{$slug}.{$getLastGaleriId}.{$galeri->extension()}");
            Galeriwisata::create([
                'galeri' => $galeriUrl,
                'wisata_id' => $getLastWisataId,
            ]);
        }

        session()->flash('success', 'Wisata telah ditambahkan');
        return redirect(route('admin.wisatas', $wisata));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function show(Wisata $wisata)
    {
        // dd($wisata->author);
        if (!$wisata) {
            abort(404);
        }
        $galeriwisatas = DB::table('galeriwisatas')->where('wisata_id', $wisata->id)->get();
        return view('wisatas.show', compact('wisata', 'galeriwisatas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function edit(Wisata $wisata, Galeriwisata $galeries)
    {
        $galeriwisatas = DB::table('galeriwisatas')->where('wisata_id', $wisata->id)->get();

        return view('auth.admin.wisatas.edit', compact('wisata', 'galeriwisatas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWisataRequest $request, Wisata $wisata)
    {
        $attr = $request->all();

        // Update Slug
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

        // Galeries
        $galeries = request()->file('galeri');
        if ($galeries) {
            foreach ($galeries as $galeri) {
                // $getLastGaleri for naming image constraint
                $getLastGaleri = Galeriwisata::all()->last();
                if ($getLastGaleri == null) {
                    $getLastGaleriId = 1;
                } else {
                    $getLastGaleriId = $getLastGaleri->id + 1;
                }
                $galeriUrl = $galeri->storeAs("images/galerywisatas", "{$slug}.{$getLastGaleriId}.{$galeri->extension()}");
                Galeriwisata::create([
                    'galeri' => $galeriUrl,
                    'wisata_id' => $wisata->id,
                ]);
            }
        }

        $attr['gambar'] = $gambarUrl;

        $wisata->update($attr);

        session()->flash('success', 'Wisata berhasil diedit');
        return redirect(route('admin.wisatas'));
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
        $galeriwisatas = DB::table('galeriwisatas')->where('wisata_id', $wisata->id)->get();
        foreach ($galeriwisatas as $galeriwisata) {
            Storage::delete($galeriwisata->galeri);
        }

        // Delete galeriwisatas Table
        DB::table('galeriwisatas')->where('wisata_id', '=', $wisata->id)->delete();

        // Delete wisatas Storage
        Storage::delete($wisata->gambar);

        // Delete wisatas Table
        $wisata->delete();


        session()->flash('success', 'Wisata berhasil dihapus');
        return redirect(route('admin.wisatas'));
    }

    public function search()
    {
        $form = request();
        if ($form->search) {
            $wisatas = DB::table('wisatas')
                ->where('nama', 'like', '%' . $form->search . '%')
                ->orWhere('deskripsi', 'like', '%' . $form->search . '%')
                ->orWhere('lokasi', 'like', '%' . $form->search . '%')
                ->simplePaginate(5);
        } else {
            $wisatas = Wisata::simplePaginate(5);
        }
        return view('wisatas.index', compact('wisatas'));
    }
}
