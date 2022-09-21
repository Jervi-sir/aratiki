<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
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

        return view('home.home', ['events' => $data['offers']]);
    }
}
