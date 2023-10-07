<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pawn;
use Illuminate\Http\Request;

class PawnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pawns = Pawn::get();
        return $pawns;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pawn $pawn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pawn $pawn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pawn $pawn)
    {
        //
    }
}
