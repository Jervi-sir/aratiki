<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvertiserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


/*
|--------------------------
|   Home
|--------------------------
*/
Route::controller(HomeController::class)->group(function() {
    Route::get('/home', 'index')->name('home');
});

/*
|--------------------------
|   Advertiser
|--------------------------
*/
Route::controller(AdvertiserController::class)->group(function() {
    Route::get('/joinAdv', 'joinAdvertiserPage')->name('get.advertiser.join');                           //[done]
    Route::post('/joinAdv', 'joinAdvertiser')->name('post.advertiser.join');                             //[done]
    Route::get('/advertiser/addOffer', 'addOfferPage')->name('get.advertiser.addOffer');                //[done]
    Route::post('/advertiser/addOffer', 'addOffer')->name('post.advertiser.addOffer');                  //[done]
    Route::get('/advertiser/allMyOffers', 'manageOffers')->name('get.advertiser.allOffers');            //[done]
    Route::get('/advertiser/showOffer/{id}', 'showOffer')->name('get.advertiser.offer');                //[]
    //TODO: show by stats, lefts and location of purchasess
    Route::get('/advertiser/editOffer/{id}', 'editOffer')->name('get.advertiser.editOffer');            //[done]
    Route::post('/advertiser/editOffer/{id}', 'updateOffer')->name('update.advertiser.editOffer');      //[done]
    //TODO: delete, change offer
    //Route::middleware(['auth', 'isAdvertiser'])->group( function() {});
});
/*
|--------------------------
|   User
|--------------------------
*/
Route::controller(UserController::class)->group(function() {
    Route::get('upgradeToAdvertiser', 'upgradePage')->name('user.upgradePage');                             //[done]
    Route::post('upgradeToAdvertiser', 'upgrade')->name('user.upgrade');                                    //[]
    Route::get('/getMyTickets', 'allMyTickets')->name('user.allTickets');                                   //[done]
    Route::get('/getThisTicket/{qrcode}', 'getThisTicket')->name('user.thisTicket');                        //[done]
    Route::post('/refund&={offer_id}', 'refund')->name('user.refund');                                      //[]
    //TODO: change below to post
    Route::post('/purchase&={offer_id}', 'purchase')->name('user.purchase');
    //Route::middleware(['auth'])->group( function() {});
});

/*
|--------------------------
|   Offer
|--------------------------
*/
Route::controller(OfferController::class)->middleware(['auth'])->group(function() {
    Route::get('/', 'index')->name('home');                             //[done]
    Route::get('show/{id}', 'showOffer')->name('showOffer');            //[done]
    Route::get('search&=', 'search')->name('search');                   //[]
});
/*
|--------------------------
|   Admin
|--------------------------
*/
Route::controller(AdminController::class)->group(function() {
    Route::get('admin/addTemplate', [AdminController::class, 'addTemplatePage'])->name('admin.addTemplatePage');                    //[done]
    Route::post('admin/addTemplate', [AdminController::class, 'addTemplate'])->name('admin.addTemplate');                           //[]
    Route::get('admin/adv/nonVerified', [AdminController::class, 'listNonVerifiedAdv'])->name('admin.nonVerifiedAdv');              //[done]
    Route::post('admin/adv/confirm/{id}', [AdminController::class, 'confirmAdv'])->name('admin.confirmAdv');                        //[done]
    Route::post('admin/adv/unconfirm/{id}', [AdminController::class, 'unconfirmAdv'])->name('admin.unconfirmAdv');                  //[done]
    Route::get('admin/adv/allAdvs', [AdminController::class, 'allAdv'])->name('admin.allAdv');                                      //[done]
    Route::get('admin/adv/edit/{id}', [AdminController::class, 'editAdv'])->name('admin.editAdv');                                  //[done]
    Route::get('admin/offer/nonVerifiedOffers', [AdminController::class, 'listNonVerifiedOffer'])->name('admin.nonVerifiedOffer');  //[done]
    Route::get('admin/offer/allOffers', [AdminController::class, 'allOffers'])->name('admin.allOffers');                            //[done]
    Route::post('admin/offer/confirm/{id}', [AdminController::class, 'confirmOffer'])->name('admin.confirmOffer');                  //[done]
    //? Route::get('admin/offer/show/{id}', [AdminController::class, 'showOffer'])->name('admin.showOffer');
    //Route::middleware(['auth', 'isAdmin'])->group( function() {});
});

/*
|--------------------------
|   Auth
|--------------------------
*/
require __DIR__.'/auth.php';
