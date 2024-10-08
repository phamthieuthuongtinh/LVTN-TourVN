<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\DepartureController;
use App\Http\Controllers\ItineraryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\MethodPaymentController;
use App\Http\Controllers\TypetourController;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [IndexController::class, 'index'])->name('homeweb');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin
Route::get('/users/manage-doanh-nghiep', [AdminController::class, 'business_manage'])->name('admin.business_manage');
Route::get('/users/manage-khach-hang', [AdminController::class, 'customer_manage'])->name('admin.customer_manage');
Route::post('/users/destroy/{id}', [AdminController::class, 'destroy_customer'])->name('admin.destroy_customer');

Route::get('/users/manage-doanh-nghiep/duyet-dn/{id}', [AdminController::class, 'edit_register'])->name('admin.accept_register');
Route::patch('/users/manage-doanh-nghiep/tuchoi-dn/{id}', [AdminController::class, 'refuse_register'])->name('admin.refuse_register');
Route::patch('/users/manage-doanh-nghiep/boduyet-dn/{id}', [AdminController::class, 'boduyet_register'])->name('admin.boduyet_register');
Route::post('/users/manage-doanh-nghiep/tao-account', [AdminController::class, 'create_account_business'])->name('admin.create_account_business');
Route::get('/tours/admin-manage-tour', [ToursController::class, 'admin_index_tour'])->name('tours.admin_index_tour');

//Home page function
Route::get('tim-kiem', [IndexController::class, 'search'])->name('tim-kiem');
// Route::get('loc', [IndexController::class, 'filterTours'])->name('filter');

//Categories
Route::resource('/categories', CategoriesController::class);
//Categories
Route::resource('/types', TypetourController::class);

//Tours
Route::get('/tours/departure', [ToursController::class, 'manage_departure'])->name('tours.departure');
Route::get('/tour/{slug}', [ToursController::class, 'tour'])->name('tour');
Route::get('/chi-tiet-tour/{slug}', [ToursController::class, 'detail_tour'])->name('chi-tiet-tour');
Route::get('/tours/itinerary', [ToursController::class, 'manage_itinerary'])->name('tours.itinerary');
Route::get('/tours/service', [ToursController::class, 'manage_service'])->name('tours.service');
Route::resource('/tours', ToursController::class);
Route::get('/tours/xem/{id}', [ToursController::class, 'xem'])->name('tours.xem');
Route::post('/upload-image', [ImageUploadController::class, 'uploadImage'])->name('upload.image');
Route::patch('/tours/gui-duyet/{id}', [ToursController::class, 'gui_duyet'])->name('tours.guiduyet');
Route::patch('/tours/duyet/{id}', [ToursController::class, 'duyet'])->name('tours.duyet');
Route::patch('/tours/tuchoi-duyet/{id}', [ToursController::class, 'tuchoi_duyet'])->name('tours.tuchoi_duyet');
Route::post('/tour/like', [ToursController::class, 'tour_like'])->name('tour.like');

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
Route::get('dang-nhap-tai-khoan', [IndexController::class, 'login_customer'])->name('login_customer');
Route::get('dang-ky-tai-khoan', [IndexController::class, 'register_customer'])->name('register_customer');
Route::post('dang-nhap', [CustomerController::class, 'login'])->name('customers.login');
Route::post('dang-xuat', [CustomerController::class, 'logout'])->name('customers.logout');
Route::get('thong-tin-khach-hang/{id}', [CustomerController::class, 'infor'])->name('customers.infor');
Route::get('thong-tin-tour-dat/{id}', [CustomerController::class, 'ordered'])->name('customers.ordered');
Route::get('tour-da-thich/{id}', [CustomerController::class, 'liked'])->name('customers.liked');


// bussiness
Route::get('dang-ky-doanh-nghiep', [BusinessController::class, 'register_business'])->name('businesses.register_business');
Route::post('dang-ky', [BusinessController::class, 'store_register'])->name('businesses.store_register_business');


//Banner
Route::resource('/banners', BannersController::class);


//Order
Route::resource('/orders', OrderController::class);
Route::get('/orders/business/order', [OrderController::class, 'business_index'])->name('orders.business_index');
Route::post('/confirm-order', [OrderController::class, 'confirm_order'])->name('orders.confirm');
Route::post('/orders/update_quantity', [OrderController::class, 'update_quantity'])->name('orders.update_quantity'); //cạp nhật số lượng người và trạng thái tt


//Comment
Route::resource('/comment', CommentController::class);
Route::post('/reply', [CommentController::class, 'reply'])->name('comment.reply');
Route::get('/comment/bussiness/index', [CommentController::class, 'business_index'])->name('comment.business_index');
Route::get('/comment/bussiness/reply', [CommentController::class, 'business_create'])->name('comment.business_create');

//Voucher
Route::resource('/vouchers', VoucherController::class);
Route::post('/check-voucher', [VoucherController::class, 'check_voucher'])->name('vouchers.check');

//service
Route::resource('/tours/services', ServiceController::class);


///Thanh toan
Route::post('/thanh-toan-vnpay', [MethodPaymentController::class, 'vnpay'])->name('methods.vnpay');
Route::post('/thanh-toan-zalopay', [MethodPaymentController::class, 'zalopay'])->name('methods.zalopay');
Route::post('/thanh-toan-momo', [MethodPaymentController::class, 'momo'])->name('methods.momo');
Route::post('/thanh-toan-viettel', [MethodPaymentController::class, 'viettel'])->name('methods.viettel');
Route::get('/thanh-toan-thanh-cong', [IndexController::class, 'payment_success'])->name('payment-success');

// Dashboard
Route::get('/dashboard/statistic', [DashboardController::class, 'show_dashboard'])->name('dashboard.show_dashboard');
Route::post('/dashboard/statistic-filter', [DashboardController::class, 'filterStatistics'])->name('dashboard.filter_dashboard');
