<?php

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
    $gateway = new Braintree\Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey'),
    ]);

    $token = $gateway->ClientToken()->generate();

    return view('welcome', [
        'token' => $token
    ]);
});

Auth::routes();

Route::middleware('auth')
    ->namespace('host')
    ->name('host.')
    ->prefix('host')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        // Route::resource('/categories' , 'CategoryController');
        // Route::resource('/tags','TagController');
        Route::get('/apartments/deleted', 'ApartmentController@deletedApartments')->name('apartments.deletedApartments');
        Route::get('apartments/deleted/{id}','ApartmentController@restoreApartments')->name('apartments.restoreApartments');
        Route::get('apartments/forceDeleted/{id}','ApartmentController@deletePermanently')->name('apartments.deletePermanently');
        Route::resource('/apartments', 'ApartmentController');
    });
