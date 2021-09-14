<?php

use App\Http\Controllers\CitiesController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\SportFieldsController;
use App\Http\Controllers\UserFieldsController;
use App\Http\Controllers\UserFriendsController;
use App\Http\Controllers\UserScheduleController;
use Illuminate\Support\Facades\Route;

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

Route::view('home', 'home')->name('home');
Route::get('/users/friends_list', [UserFriendsController::class, 'listUserFriends'])->name('friends_list');
Route::post('/users/friends_list', [UserFriendsController::class, 'store'])->name('add_friend');
Route::get('/users/delete/{id}', [UserFriendsController::class, 'destroy'])->name('delete_friend');

Route::get('/users/fields_list', [UserFieldsController::class, 'listUserFields'])->name('user_fields');
Route::post('/users/fields_list', [UserFieldsController::class, 'store'])->name('add_field');
Route::get('/users/fields/delete/{id}', [UserFieldsController::class, 'destroy'])->name('delete_field');

Route::get('/countries/list', [CountriesController::class, 'index'])->name('countries_list');
Route::get('/countries/create', [CountriesController::class, 'create'])->name('create_country');
Route::post('/countries/create', [CountriesController::class, 'store'])->name('store_country');
Route::delete('/countries/delete/{id}', [CountriesController::class, 'destroy'])->name('delete_country');

Route::get('/cities/list', [CitiesController::class, 'index'])->name('cities_list');
Route::get('/cities/getbycountry/{id}', [CitiesController::class, 'getCitiesByCountry'])->name('country_city');
Route::get('/cities/create', [CitiesController::class, 'create'])->name('create_city');
Route::post('/cities/create', [CitiesController::class, 'store'])->name('store_city');
Route::delete('/cities/delete/{id}', [CitiesController::class, 'destroy'])->name('delete_city');

Route::get('/fields/list', [SportFieldsController::class, 'index'])->name('fields_list');
Route::get('/fields/create', [SportFieldsController::class, 'create'])->name('create_field');
Route::post('/fields/create', [SportFieldsController::class, 'store'])->name('store_field');
Route::delete('/fields/delete/{id}', [SportFieldsController::class, 'destroy'])->name('delete_field');
Route::get('/fields/show/{id}', [SportFieldsController::class, 'show'])->name('show_field');

Route::get('/users/userfields', [UserFieldsController::class, 'index'])->name('user_fields');
Route::post('/users/userfields', [UserFieldsController::class, 'store'])->name('add_user_field');
Route::get('/users/userfield/delete/{id}', [UserFieldsController::class, 'destroy'])->name('delete_user_field');
Route::get('/users/getfieldbycity/{id}', [UserFieldsController::class, 'getFieldsByCity'])->name('city_fields');

Route::post('/users/schedule/{id}', [UserScheduleController::class, 'store'])->name('store_schedule');