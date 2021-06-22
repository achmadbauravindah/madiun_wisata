<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
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
    public function store(StoreMenuRequest $request)
    {
        $attr = request()->all();

        $seller = auth()->guard('seller')->user();
        $kios_id = auth()->guard('seller')->user()->kios_id;
        $attr['kios_id'] = $kios_id;
        Menu::create($attr);
        return redirect()->route('kios.edit', $seller->kios->slug)
            ->with('success', 'Menu Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function updateAnddelete(UpdateMenuRequest $request, $id)
    {
        $menu = Menu::find($id);
        if ($menu) {
            if (request()->update) {
                $attr = request()->all();
                $menu->update($attr);
                return redirect()->route('kios.edit', $menu->kios->slug)->with('success', 'Menu Berhasil Diedit');
            } else if (request()->delete) {
                $menu->delete();
                return redirect()->route('kios.edit', $menu->kios->slug)->with('success', 'Menu Berhasil Dihapus');
            }
        } else {
            abort(404);
        }
    }
}
