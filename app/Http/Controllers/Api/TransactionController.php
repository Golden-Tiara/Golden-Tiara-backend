<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $transactions = Transaction::get();

        return $transactions;
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
   /**
 * Display the specified resource.
 */
    public function show($id)
    {
        $transaction = Transaction::find($id);

        if ($transaction) {
            return $transaction;
        } else {
            return response()->json(['error' => 'ไม่พบข้อมูล Transaction'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $status = $request->input('status');

        // อัปเดตสถานะตามค่าที่ได้รับ
        if ($status === 'pass' || $status === 'not pass') {
            $transaction->status = $status;
            $transaction->save();

            return response()->json(['message' => 'สถานะอัปเดตเรียบร้อย']);
        } else {
            return response()->json(['error' => 'สถานะไม่ถูกต้อง'], 400);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return response()->json(['message' => 'Transaction ถูกลบเรียบร้อย']);
    }

}
