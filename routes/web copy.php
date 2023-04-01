<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FontendController;
use App\Http\Controllers\ProductsController;
use GuzzleHttp\Promise\Create;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin', function () {
    return view('backend.index');
});


// categories
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.list');
Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoriesController::class, 'store'])->name('categories.store');
Route::get('/categories/edit/{category}', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::patch('/categories/edit{category}', [CategoriesController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

Route::get('/categories-traste', [CategoriesController::class, 'traste'])->name('categories.truste');
Route::get('/categories-restore/{category}', [CategoriesController::class, 'restore'])->name('categories.restore');
Route::delete('/categories-delete/{category}', [CategoriesController::class, 'delete'])->name('categories.delete');





// product
Route::get('/products', [ProductsController::class, 'index'])->name('products.list');
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
Route::post('/products/create', [ProductsController::class, 'store'])->name('products.store');
Route::get('/products/edit/{product}', [ProductsController::class, 'edit'])->name('products.edit');
Route::patch('/products/edit/{product}', [ProductsController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');

Route::get('/products-trast', [ProductsController::class, 'traste'])->name('products.trast');
Route::get('/products-restore/{product}', [ProductsController::class, 'restore'])->name('product.restore');
 Route::delete('/products-delete/{product}', [ProductsController::class, 'delete'])->name('product.delete');










// fontend
Route::get('/fontend', [FontendController::class, 'index'])->name('fontend.index');
