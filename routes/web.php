<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProfileController;
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
    return view('user.master');
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

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');


Route::middleware('auth:admin')->group(function () {
//category routes
Route::get('/view-category',[CategoryController::class,'index'])->name('view.category');
Route::get('/create-category',[CategoryController::class,'create'])->name('create.category');
Route::post('/store-category',[CategoryController::class,'store'])->name('store.category');
Route::get('/edit-category/{id}',[CategoryController::class,'edit'])->name('edit.category');
Route::post('/update-category/{id}',[CategoryController::class,'update'])->name('update.category');
Route::get('/delete-category/{id}',[CategoryController::class,'destroy'])->name('delete.category');
//brand routes
Route::get('/view-brand',[BrandController::class,'index'])->name('view.brand');
Route::get('/create-brand',[BrandController::class,'create'])->name('create.brand');
Route::post('/store-brand',[BrandController::class,'store'])->name('store.brand');
Route::get('/edit-brand/{id}',[BrandController::class,'edit'])->name('edit.brand');
Route::post('/update-brand/{id}',[BrandController::class,'update'])->name('update.brand');
Route::get('/delete-brand/{id}',[BrandController::class,'destroy'])->name('delete.brand');
});


require __DIR__.'/adminauth.php';
