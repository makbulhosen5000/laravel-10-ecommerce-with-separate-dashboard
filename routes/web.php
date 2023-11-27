<?php

use App\Http\Controllers\Backend\AdminDashboardController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PaymentGateWayController;
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
//     return view('frontend.home');
// });

Route::get('/',[HomeController::class,'index']);
Route::get('/product-details/{id}',[HomeController::class,'productDetails'])->name('product.details');
//search product
Route::get('search-product',[HomeController::class,'searchProduct'])->name('search.product');
//add to cart route
Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/show-cart', [CartController::class, 'showCart'])->name('show.cart');
Route::get('/delete-cart/{id}', [CartController::class, 'deleteCart'])->name('delete.cart');

//cash on delivery route to order
Route::get('/cash-on-delivery',[PaymentGateWayController::class,'cashOnDelivery'])->name('cash.on.delivery');
//stripe payment gateway
Route::get('/stripe/{subTotal}',[PaymentGateWayController::class,'stripePayment'])->name('stripe.payment');
Route::post('/stripe-store/{subTotal}',[PaymentGateWayController::class,'stripePaymentStore'])->name('stripe-store');



//user dashboard route and middleware
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //user profile route
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::get('/admin/dashboard', function () {
// })->middleware(['auth:admin', 'verified'])->name('admin.dashboard');


//admin dashboard route and middleware
Route::middleware('auth:admin')->group(function () {
//admin dashboard
Route::get('/admin/dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard');
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
//product routes
Route::get('/view-product',[ProductController::class,'index'])->name('view.product');
Route::get('/create-product',[ProductController::class,'create'])->name('create.product');
Route::post('/store-product',[ProductController::class,'store'])->name('store.product');
Route::get('/edit-product/{id}',[ProductController::class,'edit'])->name('edit.product');
Route::post('/update-product/{id}',[ProductController::class,'update'])->name('update.product');
Route::get('/delete-product/{id}',[ProductController::class,'destroy'])->name('delete.product');
//multiple image routes and controller for product
Route::get('/product-gallery/{id}', [ProductController::class,'gallery'])->name('product.gallery');
Route::post('/product-gallery-store', [ProductController::class,'galleryStore'])->name('gallery.store');
//order route 
Route::get('/order-view', [OrderController::class,'index'])->name('view.order');
Route::get('/deliver-order/{id}', [OrderController::class,'deliverOrder'])->name('deliver.order');
//dom pdf
Route::get('/order-print-pdf/{id}', [OrderController::class, 'orderPrintPdf'])->name('order.print.pdf');
//email notification for user
Route::get('/send-email/{id}', [OrderController::class, 'sendEmail'])->name('send.email');
Route::post('/send-user-email/{id}', [OrderController::class, 'sendUserEmail'])->name('send.user.email');
//product search
Route::get('/product-search', [OrderController::class, 'productSearch'])->name('product.search');
});


require __DIR__.'/adminauth.php';
