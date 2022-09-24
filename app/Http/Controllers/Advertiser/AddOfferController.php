<?php

namespace App\Http\Controllers\Advertiser;

use App\Models\Offer;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
require 'helper.php';
require 'upload.php';

class AddOfferController extends Controller
{
    /*--------------------------------------------------------
    |   [done]  Add Offer       
    ----------------------------------------------------------*/
    public function addOfferPage() {
        $categories = Category::all();
        $payments = Payment::all();

        $data['categories'] = [];
        $data['phone_number'] = Auth::user()->advertiser->phone_number;
        
        foreach ($categories as $index => $item) {
            $data['categories'][$index] = [
                'id' => $item->id,
                'name' => $item->name,
                'type' => $item->type,
            ];
        }

        foreach ($payments as $index => $item) {
            $data['payments'][$index] = [
                'id' => $item->id,
                'name' => $item->name,
                'token' => $item->token,
            ];
        }

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
        $offer->category_id = getCategoryId($request->type, $request->other_type);
        $offer->payment_id = intval($request->payment_type);

        /*--[ specific details ]--*/
        $offer->event_name = $request->event_name;
        $offer->location = $request->location;
        $offer->map_location = $request->map_location;
        $offer->description = $request->description;
        $offer->images = json_encode(uploadBase64Images($request->images, $offer->uuid_for_images));
        /*--[ date ]--*/
        $offer->event_starts = $request->event_starts;
        $offer->event_ends = $request->event_ends;
        $offer->duration = getDateDifferencet($request->event_starts, $request->event_ends);
        /*--[ tickets ]--*/
        if($request->containVIP) {
            $offer->price_vip = $request->price_vip;
            $offer->total_tickets_vip = intval($request->ticket_vip_amount);
            $offer->tickets_left_vip = intval($request->ticket_vip_amount);
        }
        $offer->price_economy = $request->price_economy;
        $offer->total_tickets_economy = intval($request->ticket_economy_amount);
        $offer->tickets_left_economy = intval($request->ticket_economy_amount);
        $offer->payment_type_name = 'paymentType';
        /*--[ advertiser data ]--*/
        $offer->advertiser_name = $advertiser->name;
        $offer->advertiser_details = $advertiser->details;
        $offer->phone_number = $request->phone_number;
        /*--[ of search data ]--*/
        $offer->for_search = createKeyword($offer);    //?

        $offer->save();

        return redirect()->route('get.advertiser.offer', ['id' => $offer->id]);

    }
}
