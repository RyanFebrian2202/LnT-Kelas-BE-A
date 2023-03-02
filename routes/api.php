<?php

use App\Http\Controllers\BookApiController;
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
        'message' => 'Hello, testing aja ini'
    ]);
});

// Book
Route::post('/create',[BookApiController::class, 'createBook'])->name('api.createBook');
Route::get('/all', [BookApiController::class, 'getAllBooks'])->name('api.getAll');
Route::get('/view/{id}', [BookApiController::class, 'getBookByID'])->name('api.getBookByID');
Route::patch('/manage/update/{id}',[BookApiController::class,'updateBook'])->name('api.updateBook');
Route::delete('/manage/delete/{id}',[BookApiController::class, 'deleteBook'])->name('api.deleteBook');