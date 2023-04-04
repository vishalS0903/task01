<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
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




// Route::get('/dashboard', function () {
//     return view('dashboard');
// });
Route::get('/dashboard',[DashboardController::class,'create'])->name('dashboard');

// Route::get('/category/create', function () {
//     return view('create');
// });

Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/store',[CategoryController::class,'store'])->name('store');
Route::get('/category/table',[CategoryController::class,'index'])->name('table');
Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('edit');
Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('update');
Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('delete');


//product
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/table',[ProductController::class,'index'])->name('product.table');
Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');

//color
Route::get('/color/create',[ColorController::class,'create'])->name('color.create');
Route::post('/color/store',[ColorController::class,'store'])->name('color.store');
Route::get('/colors',[ColorController::class,'index'])->name('color.table');
Route::get('/color/edit/{id}',[ColorController::class,'edit'])->name('color.edit');
Route::Post('/color/update/{id}',[ColorController::class,'update'])->name('color.update');
Route::get('/color/delete/{id}',[ColorController::class,'delete'])->name('color.delete');

//brand
Route::get('/brand/create',[BrandController::class,'create'])->name('brand.create');
Route::post('/brand/store',[BrandController::class,'store'])->name('brand.store');
Route::get('/brand/table',[BrandController::class,'index'])->name('brand.table');
Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
Route::Post('/brand/update/{id}',[BrandController::class,'update'])->name('brand.update');
Route::get('/brand/delete/{id}',[BrandController::class,'delete'])->name('brand.delete');

Route::get('/orders',[OrderController::class,'index'])->name('order.table');


Route::get('/reviews', function () {
    return view('Review.index');
});
});

require __DIR__.'/auth.php';
