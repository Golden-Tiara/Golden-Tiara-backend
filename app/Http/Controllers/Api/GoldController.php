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
        $gold = new Gold();
        $gold->weight = $request->get('weight');
        $gold->purity = $request->get('purity');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/gold'), $imageName);
            $gold->image_path = $imageName;
        }

        $gold->examination_id = $request->get('examination_id');

        $gold->status = "examining";

        $gold->save();
        $gold->refresh();

        return $gold;
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
    $status = $request->input('status');

    // อัปเดตสถานะตามค่าที่ได้รับ
    if ($status === 'verified' || $status === 'unverified') {
        $gold->status = $status;
        $gold->save();

        return response()->json(['message' => 'สถานะอัปเดตเรียบร้อย']);
    } else {
        return response()->json(['error' => 'สถานะไม่ถูกต้อง'], 400);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gold $gold)
    {
        //
    }
}
