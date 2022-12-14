<?php

use App\Http\Controllers\Host\ApartmentController;
use Illuminate\Support\Facades\Auth;
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
        Route::get('/apartments/{apartmentId}/images/{imageId}', 'ApartmentController@changeCoverApartment')->name('apartments.changeCoverApartment');
        Route::get('apartments/deleted/{id}','ApartmentController@restoreApartments')->name('apartments.restoreApartments');
        Route::get('apartments/forceDeleted/{id}','ApartmentController@deletePermanently')->name('apartments.deletePermanently');
        Route::delete('apartments/deletedApartmentImage/{id}','ApartmentController@deletedApartmentImage')->name('apartments.deleteImage');
        Route::get('apartments/changeSponsorshipApartment/{id}', 'ApartmentController@changeSponsorshipApartment')->name('sponsorshipApartment');
        Route::resource('/apartments', 'ApartmentController');
    });

Route::get("{any?}", function(){
    return view("guest.home");
})->where("any", ".*");