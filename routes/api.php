<?php

use App\Http\Controllers\BookAPIController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/test', function(){
    return response()->json([
        'message' => 'Testing'
    ]);
});

Route::get('/all',[BookAPIController::class, 'getAllBooks'])->name('api.getAll');
Route::get('/view/{id}',[BookAPIController::class, 'viewBook'])->name('api.viewBook');
Route::post('/manage/create',[BookAPIController::class, 'createBook'])->name('api.createBook');
Route::patch('/manage/update/{id}',[BookAPIController::class,'updateBook'])->name('api.updateBook');
Route::delete('/manage/delete/{id}',[BookAPIController::class, 'deleteBook'])->name('api.deleteBook');