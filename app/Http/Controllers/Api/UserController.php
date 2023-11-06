<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $users = user::get();

        return $users;
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
    public function show(User $user)
    {
        // $nationalId = user::find($user);

        // if ($nationalId) {
        //     return $nationalId;
        // } else {
        //     return response()->json(['error' => 'ไม่พบข้อมูล nationalID'], 404);
        // }

        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            // ตรวจสอบ fields อื่นๆ
        ]);

        $user = $request->user();
        $user->fill($validatedData);
        $user->save();

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function findUserByNationalId($nationalId)
    {
        $user = User::where('national_id', $nationalId)->first();

        if ($user != null){
            return $user;
        }
        else{
            return null;
        }
    }

}
