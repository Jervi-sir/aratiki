<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\PurchaseController as ClientPurchase; 
use App\Http\Controllers\Client\TicketController as ClientTicket;
use App\Http\Controllers\Client\UpgradeController as ClientUpgrade;
use App\Http\Controllers\Client\ProfileController as ProfileController;
use App\Http\Controllers\Client\NotificationController as NotificationController;


/*
|--------------------------
|   Client;  get my tickets, show a ticket, refunds, purchases, like, bookmark
|--------------------------
*/

//Route::middleware(['auth'])->group( function() {});
Route::controller(ClientPurchase::class)->middleware(['auth'])->group(function() {
    Route::post('/refund&={event_id}', 'refund')->name('user.refund');
    Route::post('/purchase', 'purchase')->name('user.purchase');
});

Route::controller(ClientTicket::class)->middleware(['auth'])->group(function() {
    Route::get('/getMyTickets', 'allMyTickets')->name('user.allTickets');
    Route::get('/getThisTicket/{id}', 'getThisTicket')->name('user.thisTicket');
});

Route::controller(ClientUpgrade::class)->middleware(['auth'])->group(function() {
    Route::get('upgradeToAdvertiser', 'upgradePage')->name('user.upgradePage');     
    Route::post('upgradeToAdvertiser', 'upgrade')->name('user.upgrade'); 
});

Route::controller(ProfileController::class)->middleware(['auth'])->group(function() {
    Route::get('/editProfile', 'edit')->name('user.edit');
    Route::post('/editProfile', 'update')->name('user.update');
});

Route::controller(NotificationController::class)->middleware(['auth'])->group(function() {
    Route::get('/notifications', 'allMyNotifications')->name('user.notifications');
});
