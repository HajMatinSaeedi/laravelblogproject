<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Market\CategoryController;
use App\Http\Controllers\Market\CommentController;
use App\Http\Controllers\Market\DeliveryController;
use App\Http\Controllers\Market\DiscountController;
use App\Http\Controllers\Market\ProductController;
use App\Http\Controllers\Market\SearchController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController  ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing

// All Listings
// Route::get('/', [ListingController::class, 'index']);

Route::get('/' , [MainController::class , 'index']);
Route::get('/mainlogin',[MainController::class,'show']);

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->name('register')->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store'])->name('users');

// Log User Out
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);






Route::get('posts', [PostController::class, 'index']);
Route::get('contact', [ContactController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::get('/search',[SearchController::class,'index']);


Route::prefix('market')->namespace('Market')->group(function () {

    //category
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.market.category.index');
        Route::get('/create', [CategoryController::class, ''])->name('admin.market.category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.market.category.store');
        Route::get('/edit/{productCategory}', [CategoryController::class, 'edit'])->name('admin.market.category.edit');
        Route::put('/update/{productCategory}', [CategoryController::class, 'update'])->name('admin.market.category.update');
        Route::delete('/destroy/{productCategory}', [CategoryController::class, 'destroy'])->name('admin.market.category.destroy');
    });

    //brand
    Route::prefix('brand')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('admin.market.brand.index');
        Route::get('/create', [BrandController::class, 'create'])->name('admin.market.brand.create');
        Route::post('/store', [BrandController::class, 'store'])->name('admin.market.brand.store');
        Route::get('/edit/{brand}', [BrandController::class, 'edit'])->name('admin.market.brand.edit');
        Route::put('/update/{brand}', [BrandController::class, 'update'])->name('admin.market.brand.update');
        Route::delete('/destroy/{brand}', [BrandController::class, 'destroy'])->name('admin.market.brand.destroy');
    });

    //comment
    Route::prefix('comment')->group(function () {
        Route::get('/', [CommentController::class, 'index'])->name('admin.market.comment.index');
        Route::get('/show/{comment}', [CommentController::class, 'show'])->name('admin.market.comment.show');
        Route::post('/store', [CommentController::class, 'store'])->name('admin.market.comment.store');
        Route::get('/edit/{id}', [CommentController::class, 'edit'])->name('admin.market.comment.edit');
        Route::put('/update/{id}', [CommentController::class, 'update'])->name('admin.market.comment.update');
        Route::delete('/destroy/{id}', [CommentController::class, 'destroy'])->name('admin.market.comment.destroy');
        Route::get('/approved/{comment}', [CommentController::class, 'approved'])->name('admin.market.comment.approved');
        Route::get('/status/{comment}', [CommentController::class, 'status'])->name('admin.market.comment.status');
        Route::post('/answer/{comment}', [CommentController::class, 'answer'])->name('admin.market.comment.answer');
    });

    //delivery
    Route::prefix('delivery')->group(function () {
        Route::get('/', [DeliveryController::class, 'index'])->name('admin.market.delivery.index');
        Route::get('/create', [DeliveryController::class, 'create'])->name('admin.market.delivery.create');
        Route::post('/store', [DeliveryController::class, 'store'])->name('admin.market.delivery.store');
        Route::get('/edit/{delivery}', [DeliveryController::class, 'edit'])->name('admin.market.delivery.edit');
        Route::put('/update/{delivery}', [DeliveryController::class, 'update'])->name('admin.market.delivery.update');
        Route::delete('/destroy/{delivery}', [DeliveryController::class, 'destroy'])->name('admin.market.delivery.destroy');
        Route::get('/status/{delivery}', [DeliveryController::class, 'status'])->name('admin.market.delivery.status');
    });

    //discount
    Route::prefix('discount')->group(function () {
        Route::get('/copan', [DiscountController::class, 'copan'])->name('admin.market.discount.copan');
        Route::get('/copan/create', [DiscountController::class, 'copanCreate'])->name('admin.market.discount.copan.create');
        Route::get('/common-discount', [DiscountController::class, 'commonDiscount'])->name('admin.market.discount.commonDiscount');
        Route::post('/common-discount/store', [DiscountController::class, 'commonDiscountStore'])->name('admin.market.discount.commonDiscount.store');
        Route::get('/common-discount/edit/{commonDiscount}', [DiscountController::class, 'commonDiscountEdit'])->name('admin.market.discount.commonDiscount.edit');
        Route::put('/common-discount/update/{commonDiscount}', [DiscountController::class, 'commonDiscountUpdate'])->name('admin.market.discount.commonDiscount.update');
        Route::delete('/common-discount/destroy/{commonDiscount}', [DiscountController::class, 'commonDiscountDestroy'])->name('admin.market.discount.commonDiscount.destroy');
        Route::get('/common-discount/create', [DiscountController::class, 'commonDiscountCreate'])->name('admin.market.discount.commonDiscount.create');
        Route::get('/amazing-sale', [DiscountController::class, 'amazingSale'])->name('admin.market.discount.amazingSale');
        Route::get('/amazing-sale/create', [DiscountController::class, 'amazingSaleCreate'])->name('admin.market.discount.amazingSale.create');
        Route::post('/amazing-sale/store', [DiscountController::class, 'amazingSaleStore'])->name('admin.market.discount.amazingSale.store');
        Route::get('/amazing-sale/edit/{amazingSale}', [DiscountController::class, 'amazingSaleEdit'])->name('admin.market.discount.amazingSale.edit');
        Route::put('/amazing-sale/update/{amazingSale}', [DiscountController::class, 'amazingSaleUpdate'])->name('admin.market.discount.amazingSale.update');
        Route::delete('/amazing-sale/destroy/{amazingSale}', [DiscountController::class, 'amazingSaleDestroy'])->name('admin.market.discount.amazingSale.destroy');
        Route::post('/copan/store', [DiscountController::class, 'copanStore'])->name('admin.market.discount.copan.store');
        Route::get('/copan/edit/{copan}', [DiscountController::class, 'copanEdit'])->name('admin.market.discount.copan.edit');
        Route::put('/copan/update/{copan}', [DiscountController::class, 'copanUpdate'])->name('admin.market.discount.copan.update');
        Route::delete('/copan/destroy/{copan}', [DiscountController::class, 'copanDestroy'])->name('admin.market.discount.copan.destroy');
    });

    //order
    Route::prefix('order')->group(function () {
        Route::get('/', [OrderController::class, 'all'])->name('admin.market.order.all');
        Route::get('/new-order', [OrderController::class, 'newOrders'])->name('admin.market.order.newOrders');
        Route::get('/sending', [OrderController::class, 'sending'])->name('admin.market.order.sending');
        Route::get('/unpaid', [OrderController::class, 'unpaid'])->name('admin.market.order.unpaid');
        Route::get('/canceled', [OrderController::class, 'canceled'])->name('admin.market.order.canceled');
        Route::get('/returned', [OrderController::class, 'returned'])->name('admin.market.order.returned');
        Route::get('/show/{order}', [OrderController::class, 'show'])->name('admin.market.order.show');
        Route::get('/show/{order}/detail', [OrderController::class, 'detail'])->name('admin.market.order.show.detail');
        Route::get('/change-send-status/{order}', [OrderController::class, 'changeSendStatus'])->name('admin.market.order.changeSendStatus');
        Route::get('/change-order-status/{order}', [OrderController::class, 'changeOrderStatus'])->name('admin.market.order.changeOrderStatus');
        Route::get('/cancel-order/{order}', [OrderController::class, 'cancelOrder'])->name('admin.market.order.cancelOrder');
    });

    //payment
    Route::prefix('payment')->group(function () {
        Route::get('/', [PaymentController::class, 'index'])->name('admin.market.payment.index');
        Route::get('/online', [PaymentController::class, 'online'])->name('admin.market.payment.online');
        Route::get('/offline', [PaymentController::class, 'offline'])->name('admin.market.payment.offline');
        Route::get('/cash', [PaymentController::class, 'cash'])->name('admin.market.payment.cash');
        Route::get('/canceled/{payment}', [PaymentController::class, 'canceled'])->name('admin.market.payment.canceled');
        Route::get('/returned/{payment}', [PaymentController::class, 'returned'])->name('admin.market.payment.returned');
        Route::get('/show/{payment}', [PaymentController::class, 'show'])->name('admin.market.payment.show');
    });

    //product
    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.market.product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.market.product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('admin.market.product.store');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('admin.market.product.edit');
        Route::put('/update/{product}', [ProductController::class, 'update'])->name('admin.market.product.update');
        Route::delete('/destroy/{product}', [ProductController::class, 'destroy'])->name('admin.market.product.destroy');

    });
});
