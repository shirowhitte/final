<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RestaurantController;

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

Route::get('/home',[FoodController::class, 'display']);

Route::get('restaurant', [RestaurantController::class, 'list']);

//Route::get('dish/{id}',[RestaurantController::class, 'displayOne']);
Route::get('dish/{id}',[RestaurantController::class, 'getDishes']);


