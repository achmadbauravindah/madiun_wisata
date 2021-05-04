<?php

namespace App\Http\Controllers;

use App\Models\Penginapan;
use Illuminate\Http\Request;

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
    public function create()
    {
        dd('wait');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('wait');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penginapan  $penginapan
     * @return \Illuminate\Http\Response
     */
    public function show(Penginapan $penginapan)
    {
        dd('wait');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penginapan  $penginapan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penginapan $penginapan)
    {
        dd('wait');
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
        dd('wait');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penginapan  $penginapan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penginapan $penginapan)
    {
        dd('wait');
    }
}
