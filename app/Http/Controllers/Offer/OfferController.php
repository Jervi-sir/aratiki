<?php

namespace App\Http\Controllers\Offer;

use App\Models\Offer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    /*--------------------------------------------------------
    |   []  show a single offer
    ----------------------------------------------------------*/
    public function showOffer($id) {
        if(Auth()) {
            $isOwner = Auth()->user()->advertiser->offers->find($id);
            if($isOwner) {
                return redirect()->route('get.advertiser.offer', ['id' => $id]);
            }
        }
        $offers = Offer::all();
        $offer = Offer::find($id);

        $data['offer'] = [
            'category' => Category::find($offer->category_id)->name, //[x]

            'event_name' => $offer->event_name, //[x]
            'location' => $offer->location, //[x]
            'map_location' => $offer->map_location, //[x]
            'description' => $offer->description, //[x]
            'images' => json_decode($offer->images), //[x]

            'date' => date('M d' ,strtotime($offer->event_starts)), //[x]
            'event_starts' => date('M d, g:i A' ,strtotime($offer->event_starts)), //[x]
            'event_ends' => date('M d, g:i A' ,strtotime($offer->event_ends)), //[x]
            'duration' => $offer->duration, //[x]

            'hasVip' => $offer->hasVip, //[x]
            'price_vip' => $offer->price_vip, //[x]
            'tickets_left_vip' => $offer->tickets_left_vip, //[x]
            'price_economy' => $offer->price_economy, //[x]
            'tickets_left_economy' => $offer->tickets_left_economy, //[x]
            'payment_type_name' => $offer->payment_type_name, //[]

            'advertiser_name' => $offer->advertiser_name, //[x]
            'advertiser_details' => $offer->advertiser_details, //[]
            'phone_number' => $offer->phone_number, //[]
            //'url' => route('showOffer', ['id' => $offer->id]),
        ];
        
        foreach($offers as $index=>$offer) {
            $data['suggestions'][$index] = [
                'image' => '/media/' . json_decode($offer->images)[0],
                'date' => date('M d' ,strtotime($offer->event_starts)), //[x]
                'duration' => $offer->duration,
                'event_name' => $offer->event_name, //[x]
                'advertiser_name' => $offer->promoter_name, //[x]
                'location' => $offer->location,
                'hasVip' => $offer->hasVip, //[x]
                'price_economy' => $offer->price_economy, //[x]
                'url' => route('showOffer', ['id' => $offer->id]),
            ];
        }

        return view('Offer.show.index', 
            [
                'offer' => $data['offer'],
                'suggestions' => $data['suggestions'],
            ]
        );
    }
}
