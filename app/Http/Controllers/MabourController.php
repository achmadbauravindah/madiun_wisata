<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Mabour;
use App\Models\Tour;
use Illuminate\Http\Request;

class MabourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::all();
        $buses  = Bus::all();
        return view('mabours.index', compact('tours', 'buses'));
    }

    public function indexAdmin()
    {
        $tours = Tour::all();
        $buses  = Bus::all();
        return view('auth.admin.mabours.index', compact('tours', 'buses'));
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
     * @param  \App\Models\Mabour  $mabour
     * @return \Illuminate\Http\Response
     */
    public function show(Mabour $mabour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mabour  $mabour
     * @return \Illuminate\Http\Response
     */
    public function edit(Mabour $mabour)
    {
        $tours = Tour::all();
        $buses  = Bus::all();
        return view('auth.admin.mabours.edit', compact('tours', 'buses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mabour  $mabour
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mabour  $mabour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mabour $mabour)
    {
        //
    }
}
