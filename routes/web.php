<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\leadController;
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


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    // Route untuk halaman leads, bisa disesuaikan sesuai kebutuhan
    Route::group(['prefix' =>'leads' ],function(){
        Route::get('/', [leadController::class, 'index'])->name('leads.index');
        Route::get('/create', [leadController::class, 'create'])->name('leads.create');
        Route::post('/', [leadController::class, 'store'])->name('leads.store'); 
        Route::get('/{id}/edit', [leadController::class, 'edit'])->name('leads.edit');
        Route::put('/{id}', [leadController::class, 'update'])->name('leads.update'); 
        Route::delete('/{id}', [leadController::class, 'destroy'])->name('leads.destroy');
    });
    

});