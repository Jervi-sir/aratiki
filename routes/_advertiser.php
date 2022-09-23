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
    Route::get('/joinAdv', 'joinAdvertiserPage')->name('advertiser.join');                           //[]
    Route::post('/joinAdv', 'joinAdvertiser')->name('post.advertiser.join');                             //[]
});

Route::controller(AdvertiserOffer::class)->middleware(['auth'])->group(function() {
    Route::get('/advertiser/addOffer', 'addOfferPage')->name('get.advertiser.addOffer');    //[done] make date picker, add google map api
    Route::post('/advertiser/addOffer', 'addOffer')->name('post.advertiser.addOffer');  //[done] ba9i just compress images and maybe wilaya f file name

    Route::get('/advertiser/allMyOffers', 'manageOffers')->name('get.advertiser.allOffers');            //[done] align div
    Route::get('/advertiser/showOffer/{id}', 'showOffer')->name('get.advertiser.offer');                //[]
    Route::get('/advertiser/editOffer/{id}', 'editOffer')->name('get.advertiser.editOffer');            //[]
    Route::post('/advertiser/editOffer/{id}', 'updateOffer')->name('update.advertiser.editOffer');      //[]
    //TODO: show with stats, lefts and location of purchasess
    //TODO: delete, change offer
    //Route::middleware(['auth', 'isAdvertiser'])->group( function() {});

});
