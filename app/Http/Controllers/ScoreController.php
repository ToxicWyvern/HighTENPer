<?php

namespace App\Http\Controllers;

use App\Models\score;
use App\Http\Requests\StorescoreRequest;
use App\Http\Requests\UpdatescoreRequest;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorescoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatescoreRequest $request, score $score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(score $score)
    {
        //
    }
}
