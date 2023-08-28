<?php

use App\Http\Controllers\JuicebarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;

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

Route::get('/contact', function(){
    return view('contact');
})->name('contact');

Route::get('/single_product/{id}', [JuicebarController::class, 'single_product'])->name('single_product');

Route::get('/cart', [CartController::class, 'cart'])->name('cart');

Route::post('/add_to_cart', [CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('/add_to_cart', function(){
    return redirect('/');
});

Route::post('/remove_from_cart', [CartController::class, 'remove_from_cart'])->name('remove_from_cart');
Route::get('/remove_from_cart', function(){
    return redirect('/');
});

Route::post('/edit_product_quanity', [CartController::class, 'edit_product_quanity'])->name('edit_product_quanity');
Route::get('/edit_product_quanity', function(){
    return redirect('/');
});

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

Route::post('/place_order', [CartController::class, 'place_order'])->name('place_order');

Route::get('/payment', [PaymentController::class, 'payment'])->name('payment');