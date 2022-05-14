<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\MailController;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/',[FoodController::class, 'show'])->name('welcome');
/*Route::get('/email', function(){
    Mail::to('xingyi.14@gmail.com')->send(new WelcomeMail());
    return new WelcomeMail();
});*/

Route::get('/send-email', [MailController::class, 'sendEmail'])->name('welcome.email');
Route::get('/home',[FoodController::class, 'display']);
Route::get('/restaurant', [RestaurantController::class, 'list']);
Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
//Route::get('dish/{id}',[RestaurantController::class, 'displayOne']);
Route::get('dish/{id}',[RestaurantController::class, 'getRestaurant'])->name('dish.show');
Route::get('/r/create', [ReservationController::class, 'create']);
Route::post('/r', [ReservationController::class, 'store']);
Route::get('/reservation/{user}', [ReservationController::class, 'list'])->name('reservation.show');
Route::put('/reservation/{user}/{id}', [ReservationController::class, 'update'])->name('reservation.update');
Route::put('/order/{user}/{id}', [OrderController::class, 'update'])->name('order.update');
Route::get('/cart/{id}', [FoodController::class, 'getAddToCart']);
Route::get('/cart', [FoodController::class, 'getCart'])->name('food.cart');
Route::get('/reduce/{id}', [FoodController::class, 'getReduceByOne'])->name('cart.reduceByOne');
Route::get('/remove/{id}', [FoodController::class, 'getRemoveItem'])->name('cart.remove');
Route::get('/increase/{id}', [FoodController::class, 'getIncreaseByOne'])->name('cart.increaseByOne');
Route::post('/voucher/{user}', [OrderController::class, 'store'])->name('voucher.store');
Route::delete('/voucher/{user}', [OrderController::class, 'destroy'])->name('voucher.destroy');
Route::get('/checkout', [OrderController::class, 'getCheckout'])->name('order.checkout');
Route::post('/checkout', [OrderController::class, 'postCheckout'])->name('checkout');
Route::get('/delete/{id}', [ReservationController::class, 'delete'])->name('reservation.delete');
Route::get('/order/{user}', [OrderController::class, 'list'])->name('order.show');
##route for manager 
Route::get('/manager',[FoodController::class, 'manager']);

Route::get('/driver', [DriverController::class , 'index'])->name('driver')->middleware('driver');
Route::get('/driver/status', [DriverController::class , 'updateStatus'])->name('driver.status')->middleware('driver');