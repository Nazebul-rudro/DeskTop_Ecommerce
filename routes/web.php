<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FontendController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SpecialofferController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function(){


Route::get('/admin', function () {
    return view('backend.index');
});

// user profile
Route::get('/profile', [Controller::class, 'profile'] )->name('user.profile');
Route::patch('/profile-update', [Controller::class, 'profileupdate'] )->name('profile.update');
Route::post('/profile-image-update', [Controller::class, 'profileimageupdate'] )->name('profileimage.update');



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


// spacial offer
Route::get('/Special-offer', [SpecialofferController::class, 'index'])->name('specialoffer.list');
Route::get('/Special-offer/create', [SpecialofferController::class, 'create'])->name('specialoffer.create');
Route::post('/Special-offer/create', [SpecialofferController::class, 'store'])->name('specialoffer.store');
Route::get('/Special-offer/edit{specialoffer}', [SpecialofferController::class, 'edit'])->name('specialoffer.edit');
Route::patch('/Special-offer/edit/{specialoffer}', [SpecialofferController::class, 'update'])->name('specialoffer.update');
Route::delete('/Special-offer/destory/{specialoffer}', [SpecialofferController::class, 'destory'])->name('specialoffer.destory');

Route::get('/Special-offer-trast', [SpecialofferController::class, 'trast'])->name('specialoffer.trast');
Route::get('/Special-offer-restore/{specialoffer}', [SpecialofferController::class, 'restore'])->name('specialoffer.restore');
Route::delete('/Special-offer-delete/{specialoffer}', [SpecialofferController::class, 'delete'])->name('specialoffer.delete');



//  slider
Route::get('/slider', [SliderController::class, 'index'])->name('slider.list');
Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');
Route::post('/slider/create', [SliderController::class, 'store'])->name('slider.store');
Route::get('/slider/edit/{slider}', [SliderController::class, 'edit'])->name('slider.edit');
Route::patch('/slider/edit/{slider}', [SliderController::class, 'update'])->name('slider.update');
Route::delete('/slider/{slider}', [SliderController::class, 'destory'])->name('slider.destroy');

Route::get('/slider-trast', [SliderController::class, 'traste'])->name('slider.trast');
Route::get('/slider-restore/{slider}', [SliderController::class, 'restore'])->name('slider.restore');
Route::delete('/slider-delete/{slider}', [SliderController::class, 'delete'])->name('slider.delete');



});


// fontend
Route::get('/fontend', [FontendController::class, 'index'])->name('fontend.index');
Route::get('/product-details/{product}', [FontendController::class, 'productdetails'])->name('product-details');






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

