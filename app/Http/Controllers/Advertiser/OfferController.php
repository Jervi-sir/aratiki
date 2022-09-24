<?php

namespace App\Http\Controllers\Advertiser;

use DateTime;

use App\Models\Offer;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

require 'helper.php';

class OfferController extends Controller
{
    /*--------------------------------------------------------
    |   []  get list of all offers
    ----------------------------------------------------------*/
    public function manageOffers() {
        $offers = Auth::user()->advertiser->offers;
        foreach($offers as $index=>$offer) {
            $data['offers'][$index] = [
                'offer_id' => $offer->id,
                'main_image' => 'thumbnails/' . json_decode($offer->images)[0],
                'campaign_name' => $offer->campaign_name,
                'campaign_starts' => $offer->campaign_starts,
                'campaign_ends' => $offer->campaign_ends,

                'total_tickets' => $offer->total_tickets,
                'tickets_sold' => $offer->total_tickets - $offer->tickets_left,

                'location' => $offer->location,
                'phone_number' => $offer->phone_number,
                'price' => $offer->price,

                'details' => substr($offer->details, 0, 5) . '...',

                'is_verified' => $offer->is_verified,
                'is_active' => $offer->is_active,
            ];
        }

        return view('tailwind.advertiser.allOffers', ['offers' => $data['offers']]);
    }

    /*--------------------------------------------------------
    |   [x]  show an offer
    ----------------------------------------------------------*/
    public function showOffer($id)  {

        $advertiser = Auth::user()->advertiser;
        $offer = Offer::find($id);
    
        //if not owner
        if($offer->advertiser_id != $advertiser->id) {
            return view('showOffer', ['id' => $id]);
        }
    
        $data['offer'] = [
            'id' => $offer->id,
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
            'total_tickets_vip' => $offer->total_tickets_vip, //[x]
            'tickets_left_vip' => $offer->tickets_left_vip, //[x]
            'price_economy' => $offer->price_economy, //[x]
            'total_tickets_economy' => $offer->total_tickets_economy, //[x]
            'tickets_left_economy' => $offer->tickets_left_economy, //[x]
            'payment_type_name' => $offer->payment_type_name, //[]
            
            'advertiser_name' => $offer->promoter_name, //[x]
            'advertiser_details' => $offer->promoter_details, //[]
            'phone_number' => $offer->phone_number, //[]

            'is_verified' => $offer->is_verified, //[]
            'is_active' => $offer->is_active, //[]
            'nb_visited' => $offer->nb_visited, //[]
            'votes' => $offer->votes, //[]
            'created_at' => date('d M Y', strtotime($offer->created_at)), //[]
            //'url' => route('showOffer', ['id' => $offer->id]),
        ];
    
        return view('Advertiser.showOffer.index', ['offer' => $data['offer']]);
    }
}
