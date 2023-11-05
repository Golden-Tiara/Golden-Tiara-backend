<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Examination;
use App\Models\Pawn;
use Illuminate\Http\Request;

class PawnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $pawns = Pawn::get();


        // if($user->isSeller() || $user->isOwner()){
        //     $pawns = Pawn::get();
        // }
        // elseif($user->isCustomer()){
        //     $pawns = Pawn::where('customer_id', $user->national_id)->get();
        // }
        // else{
        //     return response()->json(['error' => 'Unauthenticated'], 401);
        // }

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
        $golds = $pawn->golds;
        $transactions = $pawn->transactions;
        return $pawn;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pawn $pawn)
    {

        $paidAmount = $request->input('paidAmount');
        $paidTerm = $request->input('paidTerm');
        $nextPayment = $request->input('nextPayment');

        $pawn->paid_amount = $paidAmount;
        $pawn->paid_term = $paidTerm;
        $pawn->next_payment = $nextPayment;
        $pawn->save();

        return response()->json(['message' => 'Transaction updated successfully']);
    }

    public function destroy(Pawn $pawn)
    {
        $id = $pawn->id;

        try {
            $pawn->delete();

        return [
            'message' => "Pawn ID {$id} has been deleted",
            'success' => true

        ];
    } catch (\Exception $e) {
        return response()->json([
            'status' => 500,
            'error' => $e->getMessage(),
        ], 500);
    }

}
    public function findPawnById($pawn_id)
    {
        $pawn = Pawn::where('id', $pawn_id)->first();
        $golds = $pawn->golds;

        if ($pawn != null){
            return $pawn;
        }
        else{
            return null;
        }
    }
}
