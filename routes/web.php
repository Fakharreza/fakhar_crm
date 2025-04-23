<?php

use App\Http\Controllers\productController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\leadController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\usersController;
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

    Route::group(['prefix' =>'users' ],function(){
        Route::get('/', [usersController::class, 'index'])->name('users.index');
        Route::get('/create', [usersController::class, 'create'])->name('users.create');
        Route::post('/', [usersController::class, 'store'])->name('users.store'); 
        Route::get('/{id}/edit', [usersController::class, 'edit'])->name('users.edit');
        Route::put('/{id}', [usersController::class, 'update'])->name('users.update'); 
        Route::delete('/{id}', [usersController::class, 'destroy'])->name('users.destroy');
    });

    Route::group(['prefix' =>'products' ],function(){
        Route::get('/', [productController::class, 'index'])->name('products.index');
        Route::get('/create', [productController::class, 'create'])->name('products.create');
        Route::post('/', [productController::class, 'store'])->name('products.store'); 
        Route::get('/{id}/edit', [productController::class, 'edit'])->name('products.edit');
        Route::put('/{id}', [productController::class, 'update'])->name('products.update'); 
        Route::delete('/{id}', [productController::class, 'destroy'])->name('products.destroy');
    });
    
    Route::group(['prefix' =>'transactions' ],function(){
        Route::get('/', [TransactionController::class, 'index'])->name('transactions.index');
        Route::get('/create', [TransactionController::class, 'create'])->name('transactions.create');
        Route::post('/', [TransactionController::class, 'store'])->name('transactions.store'); 
        Route::get('/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
        Route::put('/{id}', [TransactionController::class, 'update'])->name('transactions.update'); 
        Route::delete('/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
        Route::get('/transactions/{transaction}', [TransactionController::class, 'show'])->name('transactions.show');

    });

    Route::group(['prefix' =>'projects' ],function(){
        Route::get('/', [projectController::class, 'index'])->name('projects.index');
        Route::get('/create', [projectController::class, 'create'])->name('projects.create');
        Route::post('/', [projectController::class, 'store'])->name('projects.store'); 
        Route::get('/{id}/edit', [projectController::class, 'edit'])->name('projects.edit');
        Route::put('/{id}', [projectController::class, 'update'])->name('projects.update'); 
        Route::delete('/{id}', [projectController::class, 'destroy'])->name('projects.destroy');
    });
    

});