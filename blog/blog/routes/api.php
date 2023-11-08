<?php

use App\Http\Controllers\CategoryApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// NOte

// Route::get('/categories',[CategoryApiController::class,'index']);
// Route::get('/categories/{id}', [CategoryApiController::class, 'show']);
// Route::post('/categories', [CategoryApiController::class, 'store']);
// Route::put('/categories/{id}', [CategoryApiController::class, 'update']);
// Route::delete('/categories/{id}', [CategoryApiController::class, 'destory']);


Route::apiResource('/categories', CategoryApiController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
