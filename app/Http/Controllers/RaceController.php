<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Http\Requests\StoreRaceRequest;
use App\Http\Requests\UpdateRaceRequest;

class RaceController extends Controller
{
    /**
     * De indexfunctie haalt alle racebanen op en geeft deze door aan de circuitweergave.
     * 
     * return een weergave genaamd 'tracks' en het doorgeven van de variabele 'tracks' aan de
     * weergave.
     */
    public function index()
    {
        $tracks = Race::all();
        return view('tracks', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRaceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Race $race)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Race $race)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRaceRequest $request, Race $race)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Race $race)
    {
        //
    }
}
