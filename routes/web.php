<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\DepartureController;
use App\Http\Controllers\ItineraryController;

use Illuminate\Support\Facades\Auth;

Route::get('/', [IndexController::class, 'index'])->name('homeweb');
Route::get('/tour/{slug}', [ToursController::class, 'tour'])->name('tour');
Route::get('/chi-tiet-tour/{slug}', [ToursController::class, 'detail_tour'])->name('chi-tiet-tour');
Route::get('departture-date', [ToursController::class, 'manage_departure'])->name('tours.departure');
Route::get('itinerary', [ToursController::class, 'manage_itinerary'])->name('tours.itinerary');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Categories
Route::resource('/categories', CategoriesController::class);

//Tours
Route::resource('/tours', ToursController::class);

//Departure
Route::resource('/departures', DepartureController::class);
//Itinerary
Route::resource('/itineraries', ItineraryController::class);

//Gallery
Route::resource('/galleries', GalleryController::class);

//Customer
Route::resource('/customers', CustomerController::class);
Route::get('dang-nhap-dang-ky', [IndexController::class, 'login_reg'])->name('login-reg');
Route::post('dang-nhap', [CustomerController::class, 'login'])->name('customers.login');
Route::post('dang-xuat', [CustomerController::class, 'logout'])->name('customers.logout');
Route::get('thong-tin-khach-hang', [CustomerController::class, 'infor'])->name('customers.infor');

//Banner
Route::resource('/banners', BannersController::class);


//Order
Route::resource('/orders', OrderController::class);
Route::post('/confirm-order', [OrderController::class, 'confirm_order'])->name('orders.confirm');

//Comment
Route::resource('/comment', CommentController::class);
Route::post('/reply', [CommentController::class, 'reply'])->name('comment.reply');

//Voucher
Route::resource('/vouchers', VoucherController::class);
Route::post('/check-voucher', [VoucherController::class, 'check_voucher'])->name('vouchers.check');

