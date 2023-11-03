<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ExaminationController;
use App\Http\Controllers\Api\GoldController;
use App\Http\Controllers\Api\PawnController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ... ส่วนอื่น ๆ ...

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    // ... ส่วนที่เกี่ยวกับ authentication ...

});

// เพิ่ม middleware ที่คุณต้องการเพื่อให้ตรวจสอบสิทธิ์
Route::apiResource('/pawn', PawnController::class);
Route::apiResource('/examination', ExaminationController::class);
Route::apiResource('/gold', GoldController::class);
Route::apiResource('/transaction', TransactionController::class);

Route::get('/user/check/{nationalId}', [UserController::class, 'findUserByNationalId']);

