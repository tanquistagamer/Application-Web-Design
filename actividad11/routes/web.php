<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controlador;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [Controlador::class, 'home'])->name('home');
Route::get('/photos', [Controlador::class, 'photos'])->name('photos');
Route::get('/contact', [Controlador::class, 'contact'])->name('contact');