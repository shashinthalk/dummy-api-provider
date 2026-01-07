<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PostController;

/*

| Here is where can register API routes for this application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group.

*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    // API Version 1 Routes
    Route::apiResource('posts', PostController::class)
        ->scoped(['post' => 'post_id']);
});