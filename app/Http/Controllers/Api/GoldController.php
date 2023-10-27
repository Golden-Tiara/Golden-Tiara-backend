<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gold;
use Illuminate\Http\Request;

class GoldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $golds = Gold::get();

        // if($user->isSeller() || $user->isOwner()){
        //     $golds = Gold::get();
        // }
        // elseif($user->isCustomer()){
        //     $golds = Gold::whereHas('examination', function ($query) use ($user) {
        //         $query->where('customer_id', $user->national_id);
        //     })->get();
        // }
        // else{
        //     return response()->json(['error' => 'Unauthenticated'], 401);
        // }

        return $golds;
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
    public function show(Gold $gold)
    {
        return $gold;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gold $gold)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gold $gold)
    {
        //
    }
}
