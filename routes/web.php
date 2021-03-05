<?php

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

Route::get('/', [\App\Http\Controllers\WebsiteController::class,'index'])->name('welcome');
Route::get('/shop', [\App\Http\Controllers\WebsiteController::class,'shop'])->name('shop');
Route::get('/shop/{id}-{slug}', [\App\Http\Controllers\WebsiteController::class,'product'])->name('product');
Route::post('newsletter',[\App\Http\Controllers\Admin\NewsLetterController::class,'store'])->name('newsletter.store');
Route::prefix('cart')->name('cart.')->group(static function(){
    Route::get('/',[\App\Http\Controllers\CartController::class,'index'])->name('index');
    Route::get('/checkout',[\App\Http\Controllers\CartController::class,'checkout'])->name('checkout');
    Route::post('/order',[\App\Http\Controllers\CartController::class,'order'])->name('order');
    Route::post('/add/{id}',[\App\Http\Controllers\CartController::class,'store'])->name('store');
    Route::put('/update',[\App\Http\Controllers\CartController::class,'update'])->name('update');
    Route::delete('/removeItem/{id}',[\App\Http\Controllers\CartController::class,'removeItem'])->name('remove');
    Route::post('/clear',[\App\Http\Controllers\CartController::class,'clearCart'])->name('clear');
});

Route::get('/contact', [\App\Http\Controllers\ContactController::class,'index'])->name('contact');
Route::post('/contact', [\App\Http\Controllers\ContactController::class,'send'])->name('contact.send');

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
