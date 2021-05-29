<?php

// namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers;




use App\Models\Lapakumkm;
use Illuminate\Http\Request;
use Auth;

class LapakumkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lapakumkms =  Lapakumkm::latest()->paginate(8);
        return view('lapakumkm', compact('lapakumkms'));
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
     * @param  \App\Models\Lapakumkm  $lapakumkm
     * @return \Illuminate\Http\Response
     */
    public function show(Lapakumkm $lapakumkm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lapakumkm  $lapakumkm
     * @return \Illuminate\Http\Response
     */
    public function edit(Lapakumkm $lapakumkm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lapakumkm  $lapakumkm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lapakumkm $lapakumkm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lapakumkm  $lapakumkm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lapakumkm $lapakumkm)
    {
        //
    }
}
