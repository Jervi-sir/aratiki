<?php

use App\Models\Offer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\AdvertiserController;

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

Route::get('/ss', function() {
    $offers = Offer::all();

    foreach($offers as $index=>$offer) {
        $data['offers'][$index] = [
            'date' => $offer->campaign_starts,
            'duration' => $offer->duration,
            'name' => $offer->campaign_name,
            'promoter' => $offer->company_name,
            'location' => $offer->location,
            'price' => $offer->price,
            'url' => route('showOffer', ['id' => $offer->id]),
        ];
    }

    return view('search.search', ['events' => $data['offers']]);
});

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
    Route::get('/advertiser/addOffer', 'addOfferPage')->name('get.advertiser.addOffer');    //[done] make date picker, add google map api
    Route::post('/advertiser/addOffer', 'addOffer')->name('post.advertiser.addOffer');  //[done] ba9i just compress images and maybe wilaya f file name
    Route::get('/advertiser/allMyOffers', 'manageOffers')->name('get.advertiser.allOffers');            //[done] align div

    Route::get('/advertiser/showOffer/{id}', 'showOffer')->name('get.advertiser.offer');                //[]
    Route::get('/joinAdv', 'joinAdvertiserPage')->name('get.advertiser.join');                           //[]
    Route::post('/joinAdv', 'joinAdvertiser')->name('post.advertiser.join');                             //[]
    //TODO: show by stats, lefts and location of purchasess
    Route::get('/advertiser/editOffer/{id}', 'editOffer')->name('get.advertiser.editOffer');            //[]
    Route::post('/advertiser/editOffer/{id}', 'updateOffer')->name('update.advertiser.editOffer');      //[]
    //TODO: delete, change offer
    //Route::middleware(['auth', 'isAdvertiser'])->group( function() {});
});
/*
|--------------------------
|   User
|--------------------------
*/
Route::controller(UserController::class)->group(function() {
    Route::get('upgradeToAdvertiser', 'upgradePage')->name('user.upgradePage');                             //[]
    Route::post('upgradeToAdvertiser', 'upgrade')->name('user.upgrade');                                    //[]
    Route::get('/getMyTickets', 'allMyTickets')->name('user.allTickets');                                   //[]
    Route::get('/getThisTicket/{qrcode}', 'getThisTicket')->name('user.thisTicket');                        //[]
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
    Route::get('/', 'index');                             //[]
    Route::get('show/{id}', 'showOffer')->name('showOffer');            //[]
    Route::get('search&=', 'search')->name('search');                   //[]
});
/*
|--------------------------
|   Admin
|--------------------------
*/
Route::controller(AdminController::class)->group(function() {
    Route::get('admin/addTemplate', [AdminController::class, 'addTemplatePage'])->name('admin.addTemplatePage');                    //[]
    Route::post('admin/addTemplate', [AdminController::class, 'addTemplate'])->name('admin.addTemplate');                           //[]
    Route::get('admin/adv/nonVerified', [AdminController::class, 'listNonVerifiedAdv'])->name('admin.nonVerifiedAdv');              //[]
    Route::post('admin/adv/confirm/{id}', [AdminController::class, 'confirmAdv'])->name('admin.confirmAdv');                        //[]
    Route::post('admin/adv/unconfirm/{id}', [AdminController::class, 'unconfirmAdv'])->name('admin.unconfirmAdv');                  //[]
    Route::get('admin/adv/allAdvs', [AdminController::class, 'allAdv'])->name('admin.allAdv');                                      //[]
    Route::get('admin/adv/edit/{id}', [AdminController::class, 'editAdv'])->name('admin.editAdv');                                  //[]
    Route::get('admin/offer/nonVerifiedOffers', [AdminController::class, 'listNonVerifiedOffer'])->name('admin.nonVerifiedOffer');  //[]
    Route::get('admin/offer/allOffers', [AdminController::class, 'allOffers'])->name('admin.allOffers');                            //[]
    Route::post('admin/offer/confirm/{id}', [AdminController::class, 'confirmOffer'])->name('admin.confirmOffer');                  //[]
    //? Route::get('admin/offer/show/{id}', [AdminController::class, 'showOffer'])->name('admin.showOffer');
    //Route::middleware(['auth', 'isAdmin'])->group( function() {});
});

/*
|--------------------------
|   Auth
|--------------------------
*/
require __DIR__.'/auth.php';
