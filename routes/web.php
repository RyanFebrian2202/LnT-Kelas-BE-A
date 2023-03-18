<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/',[DashboardController::class, 'getHomePage'])->name('homePage');
Route::get('/contact',[DashboardController::class, 'getContactPage'])->name('contactPage');
Route::post('/contact',[ContactController::class, 'store'])->name('storeContact');
Route::get('/manage',[DashboardController::class, 'getManagePage'])->name('managePage');

// Book
Route::get('/manage/create',[BookController::class, 'getCreateBook'])->name('getBookPage');
Route::post('/manage/create',[BookController::class, 'createBook'])->name('createBook');

Route::get('/manage/update/{id}',[BookController::class, 'getUpdateBook'])->name('getUpdateBook');
Route::patch('/manage/update/{id}',[BookController::class,'updateBook'])->name('updateBook');

Route::delete('/manage/delete/{id}',[BookController::class, 'deleteBook'])->name('deleteBook');


Route::middleware(["auth"])->group(function(){

});