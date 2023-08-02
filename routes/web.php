<?php

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

Route::prefix('backoffice')
    ->name('backoffice.')
    ->group(function () {
        Route::get('/', function() {
            return view('backoffice.homepage');
        })->name('homepage');
        Route::prefix('movies')
            ->name('movies.')
            ->group(function () {
                Route::get('/', [\App\Http\Controllers\Backoffice\MovieController::class,'index'])->name('index');
                Route::get('show/{id}', [\App\Http\Controllers\Backoffice\MovieController::class,'show'])->name('show');
                Route::get('edit/{id}', [\App\Http\Controllers\Backoffice\MovieController::class,'edit'])->name('edit');
                Route::get('create', [\App\Http\Controllers\Backoffice\MovieController::class,'create'])->name('create');
                Route::get('delete/{id}', [\App\Http\Controllers\Backoffice\MovieController::class,'delete'])->name('delete');
            });
    });

Route::get('/login', function () {
    return "Hello ".request()->get('name')." , Authentication is required ! Please log in !";
})->name('login');


