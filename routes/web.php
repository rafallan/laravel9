<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

// Route::get('/', [HomeController::class, 'index'])->name('index');
// Route::get('/create', [HomeController::class, 'create'])->name('create');
// Route::post('/store', [HomeController::class, 'store'])->name('store');
// Route::delete('/delete/{id}', [HomeController::class, 'destroy'])->name('destroy');
// Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('edit');
// Route::get('/show/{id}', [HomeController::class, 'show'])->name('show');


Route::middleware('auth')->group(function(){
    Route::resource('/posts', HomeController::class);
    Route::get('/sair', [LoginController::class, 'logout'])->name('sair');
});

Route::resource('/login', LoginController::class);
    

Route::get('/', function(){
    return view('welcome');
});