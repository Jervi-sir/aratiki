<?php

namespace App\Http\Controllers\Advertiser;

use DateTime;

use App\Models\Offer;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

require dirname(__DIR__) . '\zHelpers\helper.php';
require dirname(__DIR__) . '\zHelpers\upload.php';

class OfferController extends Controller
{
    /*--------------------------------------------------------
    |   []  get list of all offers
    ----------------------------------------------------------*/
    public function manageOffers() {
        $user = Auth()->user();
        $offers = $user->offers;

        $data['user'] = [
            'name' => $user->name,
            'bio' => $user->bio ? $user->bio : 'no Bio',
            'phone_number' => $user->phone_number,
            'total_events' => $offers->count(),
            'active_events' => $offers->count(),
        ];

        $data['offers'] = [];

        foreach($offers as $index=>$offer) {
            $data['offers'][$index] = [
                'id' => $offer->id,
                'event_name' => $offer->event_name, //[x]
                'location' => $offer->location, //[x]
                'main_image' => url('/') . '/media/' . json_decode($offer->images)[0],

                'category' => Category::find($offer->category_id)->name, //[x]
                'is_verified' => $offer->is_verified, //[]
                'is_active' => $offer->is_active, //[]
                'created_at' => date('d M Y', strtotime($offer->created_at)), //[]
                'details' => substr($offer->details, 0, 5) . '...',

                'event_starts' => date('M d, g:i A' ,strtotime($offer->event_starts)), //[x]
                'event_ends' => date('M d, g:i A' ,strtotime($offer->event_ends)), //[x]

                'total_tickets' => $offer->total_tickets_economy,
                'tickets_sold' => $offer->total_tickets_economy - $offer->tickets_left_economy,
                'price_economy' => $offer->price_economy . ' D.A', //[x]

                'url' => route('get.advertiser.offer', ['id' => $offer->id]),
            ];
        }
        
        return view('Advertiser.myOffers.index', 
        [
            'user' => $data['user'],
            'offers' => $data['offers'],
        ]);
    }

    /*--------------------------------------------------------
    |   [x]  show an offer
    ----------------------------------------------------------*/
    public function showOffer($id)  {

        $user = Auth()->user();
        $offer = Offer::find($id);
    
        //if not owner
        if($offer->user_id != $user->id) {
            return view('showOffer', ['id' => $id]);
        }
    
        $data['offer'] = [
            'id' => $offer->id,
            'category' => Category::find($offer->category_id)->name, //[x]
    
            'event_name' => $offer->event_name, //[x]
            'location' => $offer->location, //[x]
            'map_location' => $offer->map_location, //[x]
            'description' => $offer->description, //[x]
            'images' => getArrayImageUrl($offer->images), //[x]

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
