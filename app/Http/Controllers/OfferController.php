<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Search;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /*--------------------------------------------------------
    |   Search
    ----------------------------------------------------------*/
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $search = Search::where('company_name' , 'like', '%' . $keyword . '%')
                        ->orWhere('campaign_name', 'like', '%' . $keyword . '%')
                        ->orWhere('details', 'like', '%' . $keyword . '%')
                        ->orWhere('advertiser_details', 'like', '%' . $keyword . '%')
                        ->orWhere('location', 'like', '%' . $keyword . '%')
                        ->orWhere('price', 'like', '%' . $keyword . '%')
                        ->get();

        dd($search);
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

        return view('search.search', ['events' => $data['offers']]);
        return view('result');
    }
    public function index()
    {
        return redirect()->route('home');
    }


    /*--------------------------------------------------------
    |   show a single offer
    ----------------------------------------------------------*/
    public function showOffer($id)
    {
        $offer = Offer::find($id);

        return view('tailwind.showOffer', ['offer' => $offer]);
    }
}
