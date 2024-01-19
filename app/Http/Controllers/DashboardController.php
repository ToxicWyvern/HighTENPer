<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Maak een nieuwe instantie van de controller aan.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); // Middleware voor authenticatie
    }

    /**
     * Toon het dashboard van de applicatie.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }
}
