<?php

namespace App\Http\Controllers;

use App\Models\LapakUMKM;
use Illuminate\Http\Request;

class LapakUMKMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lapakUMKM');
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
     * @param  \App\Models\LapakUMKM  $lapakUMKM
     * @return \Illuminate\Http\Response
     */
    public function show(LapakUMKM $lapakUMKM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LapakUMKM  $lapakUMKM
     * @return \Illuminate\Http\Response
     */
    public function edit(LapakUMKM $lapakUMKM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LapakUMKM  $lapakUMKM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LapakUMKM $lapakUMKM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LapakUMKM  $lapakUMKM
     * @return \Illuminate\Http\Response
     */
    public function destroy(LapakUMKM $lapakUMKM)
    {
        //
    }
}
