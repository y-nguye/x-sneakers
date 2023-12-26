<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/{type}', [ShopController::class, 'index'])->where('type', 'new|men|women|kids')->name('type');

Route::get('/{sneakers}', [ShopController::class, 'show'])->name('sneakers');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/user', function () {
    return view('user');
})->middleware(['auth'])->name('user');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'authorization'])->name('dashboard');

Route::resource('/dashboard/products', ProductController::class)->middleware(['auth', 'verified', 'authorization']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
