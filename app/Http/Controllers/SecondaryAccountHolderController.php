<?php

namespace App\Http\Controllers;

use App\Models\SecondaryAccountHolder;
use Illuminate\Http\Request;

class SecondaryAccountHolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secondaryAccountHolders = SecondaryAccountHolder::all();

        return view('secondaryAccountHolders.index',['secondaryAccountHolders' => $secondaryAccountHolders]);
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
     * @param  \App\Models\SecondaryAccountHolder  $secondaryAccountHolder
     * @return \Illuminate\Http\Response
     */
    public function show(SecondaryAccountHolder $secondaryAccountHolder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SecondaryAccountHolder  $secondaryAccountHolder
     * @return \Illuminate\Http\Response
     */
    public function edit(SecondaryAccountHolder $secondaryAccountHolder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SecondaryAccountHolder  $secondaryAccountHolder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SecondaryAccountHolder $secondaryAccountHolder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SecondaryAccountHolder  $secondaryAccountHolder
     * @return \Illuminate\Http\Response
     */
    public function destroy(SecondaryAccountHolder $secondaryAccountHolder)
    {
        //
    }
}
