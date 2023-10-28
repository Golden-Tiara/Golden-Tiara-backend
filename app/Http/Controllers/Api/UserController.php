<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use http\Client\Request;

class UserController extends Controller
{

    public function show(Request $request)
    {
        return response()->json($request->user());
    }

    public function update(Request $request)
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

}
