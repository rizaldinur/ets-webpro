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

# Route::post('/produk/create', [CheckoutController::class, 'create_produk']);

// Route::get('/', function () {
//     return view('index');
// });


Route::get('/category-foods', function () {
    return view('category-foods');
});
// Route::get('/order', function () {
//     return view('order');
// });


Route::get('/admin', function () {
    return view('admin');
});
Auth::routes();


// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/add-categories', [App\Http\Controllers\CategoryController::class, 'create']);
Route::get('/category/edit/{category}', [App\Http\Controllers\CategoryController::class, 'edit']);
Route::post('/create-category', [App\Http\Controllers\CategoryController::class, 'store']);
Route::post('/update-category', [App\Http\Controllers\CategoryController::class, 'update']);
Route::get('/category/destroy/{category}', [App\Http\Controllers\CategoryController::class, 'destroy']);

Route::get('/foods', [App\Http\Controllers\FoodController::class, 'index']);
Route::get('/add-foods', [App\Http\Controllers\FoodController::class, 'create']);
Route::get('/food/edit/{food}', [App\Http\Controllers\FoodController::class, 'edit']);
Route::post('/create-food', [App\Http\Controllers\FoodController::class, 'store']);
Route::post('/update-food', [App\Http\Controllers\FoodController::class, 'update']);
Route::post('/search-food', [App\Http\Controllers\FoodController::class, 'show']);
Route::get('/food/destroy/{food}', [App\Http\Controllers\FoodController::class, 'destroy']);

Route::get('/order', [App\Http\Controllers\OrderController::class, 'index']);
// derController:
// Route::resource('/order', [App\Http\Controllers\Or:class, 'index']);