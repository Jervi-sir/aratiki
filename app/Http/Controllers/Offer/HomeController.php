<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Offer;

class HomeController extends Controller
{
    public function home() {
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

        return view('Home.index', ['events' => $data['offers']]);
    }

    /*--------------------------------------------------------
    |   [done]  show a single offer
    ----------------------------------------------------------*/
    public function index()
    {
        return redirect()->route('home');
    }
}
