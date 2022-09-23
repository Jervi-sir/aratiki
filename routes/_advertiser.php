<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Advertiser\JoinController as AdvertoserJoin;
use App\Http\Controllers\Advertiser\OfferController as AdvertiserOffer;

/*
|--------------------------
|   [Advertiser]; join as adv, add, show all offers, show/edit/delete offer
|--------------------------
*/
Route::controller(AdvertoserJoin::class)->middleware(['guest'])->group(function() {
    Route::get('/joinAdv', 'joinAdvertiserPage')->name('advertiser.join');                           //[x]
    Route::post('/joinAdv', 'joinAdvertiser')->name('post.advertiser.join');                         //[x]
});

//, 'isAdvertiser'
Route::controller(AdvertiserOffer::class)->middleware(['auth'])->group(function() {
    Route::get('/advertiser/addOffer', 'addOfferPage')->name('get.advertiser.addOffer');    //[x] make date picker, add google map api
    Route::post('/advertiser/addOffer', 'addOffer')->name('post.advertiser.addOffer');  //[x] ba9i wilaya f file name, google api

    Route::get('/advertiser/allMyOffers', 'manageOffers')->name('get.advertiser.allOffers');            //[]
    Route::get('/advertiser/showOffer/{id}', 'showOffer')->name('get.advertiser.offer');                //[x]
    Route::get('/advertiser/editOffer/{id}', 'editOffer')->name('get.advertiser.editOffer');            //[-]
    Route::post('/advertiser/editOffer/{id}', 'updateOffer')->name('update.advertiser.editOffer');      //[]
});
