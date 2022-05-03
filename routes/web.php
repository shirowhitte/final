<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Mail\WelcomeMail;
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
Route::get('/email', function(){
    return new WelcomeMail();
});


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




