<?php

use App\Models\Offer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


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

/*
|--------------------------
|   Adverrtiser
|--------------------------
*/
require __DIR__.'/_advertiser.php';


/*
|--------------------------
|   Client
|--------------------------
*/
require __DIR__.'/_client.php';


/*
|--------------------------
|   Offer
|--------------------------
*/
require __DIR__.'/_offer.php';


/*
|--------------------------
|   Auth
|--------------------------
*/
require __DIR__.'/auth.php';



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
    return view('offer.offer', ['events' => $data['offers']]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
