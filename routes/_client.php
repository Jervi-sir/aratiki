<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\PurchaseController as ClientPurchase; 
use App\Http\Controllers\Client\TicketController as ClientTicket;
use App\Http\Controllers\Client\UpgradeController as ClientUpgrade;


/*
|--------------------------
|   Client;  get my tickets, show a ticket, refunds, purchases, like, bookmark
|--------------------------
*/

//Route::middleware(['auth'])->group( function() {});
Route::controller(ClientPurchase::class)->middleware(['auth'])->group(function() {
    Route::post('/refund&={offer_id}', 'refund')->name('user.refund');                                      //[]
    Route::post('/purchase&={offer_id}', 'purchase')->name('user.purchase');
});

Route::controller(ClientTicket::class)->middleware(['auth'])->group(function() {
    Route::get('/getMyTickets', 'allMyTickets')->name('user.allTickets');                                   //[]
    Route::get('/getThisTicket/{qrcode}', 'getThisTicket')->name('user.thisTicket');                        //[]
});

Route::controller(ClientUpgrade::class)->middleware(['guest'])->group(function() {
    Route::get('upgradeToAdvertiser', 'upgradePage')->name('user.upgradePage');                             //[]
    Route::get('upgradeToAdvertiser', 'upgradePage')->name('user.upgradePage');                             //[]
    Route::post('upgradeToAdvertiser', 'upgrade')->name('user.upgrade');                                    //[]
});
