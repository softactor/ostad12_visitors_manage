<?php

use App\Http\Controllers\api\v1\admin\VisitorSiteController;
use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\vi\admin\VisitorProfileController;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [AuthController::class,'login']);
Route::post('forgot-password', [AuthController::class,'forgotpassword']);
Route::post('reset-password', [AuthController::class,'resetPassword']);


Route::apiResource('visitor-site',VisitorSiteController::class);
Route::apiResource('visitor-profile',VisitorProfileController::class);


Route::get('/profie', [AuthController::class,'me'])->middleware('auth:api');