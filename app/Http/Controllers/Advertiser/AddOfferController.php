<?php

namespace App\Http\Controllers\Advertiser;

use App\Models\Offer;
use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Stichoza\GoogleTranslate\GoogleTranslate;
require dirname(__DIR__) . '\zHelpers\helper.php';
require dirname(__DIR__) . '\zHelpers\upload.php';
require dirname(__DIR__) . '\zHelpers\helperDB.php';

class AddOfferController extends Controller
{
    /*--------------------------------------------------------
    |   [done]  Add Offer
    ----------------------------------------------------------*/
    public function addOfferPage() {
       
        $data['categories'] = [];
        $data['phone_number'] = Auth::user()->advertiser->phone_number;
        
        $data['categories'] = listAllCategories();
        $data['payments'] = listAllPayments();

        return view('Advertiser.post.index', 
            [
                'payments' => $data['payments'], 
                'categories' => $data['categories'], 
                'phone_number' => $data['phone_number']
            ]
        );
    }

    public function addOffer(Request $request) {
        $user = Auth::user();
        $advertiser = $user->advertiser;
        $uuid = Str::uuid();

        $offer = new Offer();
        /*--[ foreign keys ]--*/
        $offer->user_id = $user->id;
        $offer->uuid = Str::uuid();
        $offer->uuid_for_images = str_replace('-', '', $uuid);
        $offer->advertiser_id = $advertiser->id;
        $category = getCategory($request->category, $request->other_category);
        $offer->category_id = $category->id;
        $offer->payment_id = intval($request->payment_type);

        /*--[ specific details ]--*/
        $offer->event_name = $request->event_name;
        $offer->event_category = $category->name;
        $offer->location = $request->location;
        $offer->map_location = $request->map_location;
        $offer->description = $request->description;
        $offer->images = json_encode(uploadBase64Images($request->images, $offer->uuid_for_images));
        /*--[ date ]--*/
        $offer->event_starts = $request->event_starts;
        $offer->event_ends = $request->event_ends;
        $offer->duration = getDateDifference($request->event_starts, $request->event_ends);
        /*--[ tickets ]--*/
        if($request->containVIP == "on") {
            $offer->hasVip = true;
            $offer->price_vip = $request->price_vip;
            $offer->total_tickets_vip = intval($request->ticket_vip_amount);
            $offer->tickets_left_vip = intval($request->ticket_vip_amount);
        }
        $offer->price_economy = $request->price_economy;
        $offer->total_tickets_economy = intval($request->ticket_economy_amount);
        $offer->tickets_left_economy = intval($request->ticket_economy_amount);
        //$tickets['economic'] = $request->price_economy;
        //$offer->tickets = json_encode($tickets);
        $offer->payment_type_name = Payment::find(intval($request->payment_type))->name;
        /*--[ advertiser data ]--*/
        $offer->advertiser_name = $advertiser->name;
        $offer->advertiser_details = $advertiser->details;
        $offer->phone_number = $request->phone_number;
        /*--[ of search data ]--*/
        $offer->for_search = createKeyword($offer);
        $offer->save();

        return redirect()->route('get.advertiser.offer', ['id' => $offer->id]);
        
        
    }
}
