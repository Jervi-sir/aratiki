<?php

namespace App\Http\Controllers\Offer;

use App\Models\Offer;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Stichoza\GoogleTranslate\GoogleTranslate;
require dirname(__DIR__) . '\zHelpers\helper.php';
require dirname(__DIR__) . '\zHelpers\notification.php';

class HomeController extends Controller
{
    /*--------------------------------------------------------
    |   [x]  get list of all offers
    ----------------------------------------------------------*/
    public function home() {
        $offers = Offer::all();

        $data['categories'] = listAllCategories();
        
        $data['offers'] = [];
        foreach($offers as $index=>$offer) {
            $data['offers'][$index] = [
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

        notify($type = 'announce', $title = 'welcome Jervi', $message = '');
        return view('Home.index', 
            [
                'events' => $data['offers'],
                'categories' => $data['categories'],

            ]
        );
    }

    /*--------------------------------------------------------
    |   [done]  show a single offer
    ----------------------------------------------------------*/
    public function index()
    {
        return redirect()->route('home');
    }
}
