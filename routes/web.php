<?php

use App\Http\Controllers\JuicebarController;
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

Route::get('/products', [JuicebarController::class, 'product'])->name('products');

Route::get('/index', [JuicebarController::class, 'index'])->name('home');
Route::get('/', [JuicebarController::class, 'index'])->name('home');

// if a user tries to go to /single_product without an id they will be redirected to home page
Route::get('/single_product', function(){
    return redirect('/');
})->name('single_product_redirect');

Route::get('/about', function(){
    return view('about');
})->name('about');

Route::get('/single_product/{id}', [JuicebarController::class, 'single_product'])->name('single_product');
