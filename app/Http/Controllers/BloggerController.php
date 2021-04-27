<?php

namespace App\Http\Controllers;

use App\Models\Blogger;
use Illuminate\Http\Request;

class BloggerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rrr');
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
     * @param  \App\Models\Blogger  $blogger
     * @return \Illuminate\Http\Response
     */
    public function show(Blogger $blogger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blogger  $blogger
     * @return \Illuminate\Http\Response
     */
    public function edit(Blogger $blogger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blogger  $blogger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blogger $blogger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blogger  $blogger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blogger $blogger)
    {
        //
    }
}
