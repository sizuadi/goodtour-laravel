<?php

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/travelpacks', 'TravelController@index')->name('travel');

Route::get('/about', 'AboutController@index')->name('about');

Route::get('/detail/{slug}', 'DetailController@index')->name('detail');

Route::group(['middleware' => 'auth', 'verified'], function () {
        Route::get('profile/{name}', 'ProfileController@edit')
            ->name('profile.edit');
    
        Route::patch('profile/{name}', 'ProfileController@update')
            ->name('profile.update');
        Route::get('rating', 'CommentController@index')
        ->name('rating');
        Route::post('', 'CommentController@store')
        ->name('rating.store');
    });

Route::get('/country/{country}', 'CountryController@index')->name('country');

Route::get('/country/cari', 'CountryController@cari')->name('countrycari');




Route::post('/checkout/{id}', 'CheckoutController@process')
        ->name('checkout_process')
        ->middleware(['auth', 'verified']);

Route::get('/checkout/{id}', 'CheckoutController@index')
        ->name('checkout')
        ->middleware(['auth', 'verified']);

Route::post('/checkout/create/{detail_id}', 'CheckoutController@create')
        ->name('checkout-create')
        ->middleware(['auth', 'verified']);

Route::get('/checkout/remove/{detail_id}', 'CheckoutController@remove')
        ->name('checkout-remove')
        ->middleware(['auth', 'verified']);

Route::get('/checkout/confirm/{detail_id}', 'CheckoutController@success')
        ->name('checkout-success')
        ->middleware(['auth', 'verified']);

Route::get('/checkout/cancel/{detail_id}', 'CheckoutController@cancel')
        ->name('checkout-cancel')
        ->middleware(['auth', 'verified']);

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function(){
        Route::get('/', 'DashboardController@index')
            ->name('dashboard');
        Route::get('report-pdf','DashboardController@generatePDF')->name('reportDashboard');
        Route::resource('travel-packs', 'TravelPacksController');

        Route::resource('galleries', 'GalleriesController');

        Route::resource('transactions', 'TransactionsController');

        Route::resource('transactionsReport', 'TransactionsReportController');
        
        Route::resource('countries', 'CountriesController');

        Route::resource('users', 'UsersController');

        
    });

Auth::routes(['verify' => true]);

