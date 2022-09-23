<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Offer;
use App\Models\Template;

class HomeController extends Controller
{
    public function home() {
        $offers = Offer::all();

        $categories = Template::all();

        foreach($offers as $index=>$offer) {
            $data['offers'][$index] = [
                'image' => '/media/' . json_decode($offer->images)[0],
                'date' => date('M d' ,strtotime($offer->event_starts)), //[x]
                'duration' => $offer->duration,
                'event_name' => $offer->event_name, //[x]
                'promoter_name' => $offer->promoter_name, //[x]
                'location' => $offer->location,
                'price_vip' => $offer->price_vip, //[x]
                'price_economy' => $offer->price_economy, //[x]
                'url' => route('showOffer', ['id' => $offer->id]),
            ];
        }

        foreach($categories as $index=>$category) {
            $data['categories'][$index] = [
                'name' => $category->template_name,
                'type' => $category->type,
                'url' => '$category->template_name',
            ];
        }

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
