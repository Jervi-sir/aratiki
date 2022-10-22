<?php

namespace App\Http\Controllers\Advertiser;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function showProfile($id) {
        $user = User::find($id);
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
                'image' => '/media/' . json_decode($offer->images)[0],
                'date' => date('M d' ,strtotime($offer->event_starts)), 
                'duration' => $offer->duration,
                'event_name' => $offer->event_name, 
                'advertiser_name' => $offer->advertiser_name, 
                'location' => $offer->location,
                'hasVip' => $offer->hasVip, 
                'price_economy' => $offer->price_economy, 
                'url' => route('showOffer', ['id' => $offer->id]),
            ];
        }

        return view('Advertiser.showProfile.index', 
        [
            'user' => $data['user'],
            'offers' => $data['offers'],
        ]);
        
    }
}
