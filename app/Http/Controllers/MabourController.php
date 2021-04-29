<?php

namespace App\Http\Controllers;

use App\Models\Mabour;
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
        return view('mabour');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mabour  $mabour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mabour $mabour)
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
