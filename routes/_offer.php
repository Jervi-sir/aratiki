<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Offer\OfferController as OfferFunctions;
use App\Http\Controllers\Offer\SearchController as SearchOffers;
use App\Http\Controllers\Offer\HomeController as HomeController;

/*
|--------------------------
|   Home; Show home with trendy offers,
|--------------------------
*/
Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index')->name('homepage');                     //[x]
    Route::get('/home', 'home')->name('home');                      //[x]
});

/*
|--------------------------
|   Offer; show offer, search offer
|--------------------------
*/
Route::controller(SearchOffers::class)->group(function() {
    Route::get('search&=', 'search')->name('search');                   //[]
    Route::get('popular&={category}', 'popularByCategories')->name('category.popular');
});

Route::controller(OfferFunctions::class)->group(function() {
    Route::get('show/{id}', 'showOffer')->name('showOffer');            //[x]
});
