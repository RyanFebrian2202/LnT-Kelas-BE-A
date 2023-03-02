<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/',[DashboardController::class, 'getHomePage'])->name('homePage');
Route::get('/contact',[DashboardController::class, 'getContactPage'])->name('contactPage');
Route::get('/manage',[DashboardController::class, 'getManagePage'])->name('managePage');

// Book
// Route::get('/manage/create',[BookController::class, 'getCreateBook'])->name('getBookPage');
Route::post('/manage/create',[BookController::class, 'createBook'])->name('createBook');

Route::get('/manage/update/{id}',[BookController::class, 'getUpdateBook'])->name('getUpdateBook');
Route::patch('/manage/update/{id}',[BookController::class,'updateBook'])->name('updateBook');

Route::delete('/manage/delete/{id}',[BookController::class, 'deleteBook'])->name('deleteBook');