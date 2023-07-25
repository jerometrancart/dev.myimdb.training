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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/movies/halloween', function(){
    return 'Movie title: Halloween';
})->name('show_movie');

Route::post('movies/create', function (){

})->name('create_movie');

Route::put('movies/halloween', function (){

})->name('update_movie');

Route::delete('movies/halloween', function (){

})->name('delete_movie');

Route::any('movies/', function (){

});

Route::match(['get', 'post'],'movies/', function (){

});


