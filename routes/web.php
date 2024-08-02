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
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ImageUploadController;

use Illuminate\Support\Facades\Auth;

Route::get('/', [IndexController::class, 'index'])->name('homeweb');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Categories
Route::resource('/categories', CategoriesController::class);

//Tours
Route::get('/tours/departure', [ToursController::class, 'manage_departure'])->name('tours.departure');
Route::get('/tour/{slug}', [ToursController::class, 'tour'])->name('tour');
Route::get('/chi-tiet-tour/{slug}', [ToursController::class, 'detail_tour'])->name('chi-tiet-tour');
Route::get('/tours/itinerary', [ToursController::class, 'manage_itinerary'])->name('tours.itinerary');
Route::get('/tours/service', [ToursController::class, 'manage_service'])->name('tours.service');
Route::resource('/tours', ToursController::class);
Route::post('/upload-image', [ImageUploadController::class, 'uploadImage'])->name('upload.image');

//Departure
Route::resource('/tours/departures', DepartureController::class);
//Itinerary
Route::resource('/tours/itineraries', ItineraryController::class);
Route::get('/tours/itinerary/add/{day_number}/{tour_id}', [ItineraryController::class, 'add'])->name('itineraries.add');
Route::get('/tours/itinerary/change/{tour_id}/{day_number}', [ItineraryController::class, 'change'])->name('itineraries.change');
Route::post('/tours/itinerary/updated/{tour_id}/{day_number}', [ItineraryController::class, 'update_itinerary'])->name('itineraries.updated');
Route::delete('/tours/itinerary/change/destroy/{itinerarydetail}', [ItineraryController::class, 'destroy_itinerarydetail'])->name('itineraries.destroy_itinerarydetail');
Route::get('/tours/itinerary/edit/{itinerarydetail}', [ItineraryController::class, 'show_itinerayDetail'])->name('itineraries.show_itinerayDetail');
Route::post('/tours/itinerary/edit/{itinerarydetail}', [ItineraryController::class, 'edit_itinerayDetail'])->name('itineraries.edit_itinerayDetail');
Route::post('/upload-image', [ImageUploadController::class, 'uploadImage']);
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

//service
Route::resource('/tours/services', ServiceController::class);


