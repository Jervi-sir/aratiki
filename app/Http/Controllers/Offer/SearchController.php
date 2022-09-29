<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Search;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    /*--------------------------------------------------------
    |   []  Search
    ----------------------------------------------------------*/
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $search = Search::where('advertiser_name' , 'like', '%' . $keyword . '%')
                        ->orWhere('event_name', 'like', '%' . $keyword . '%')
                        ->orWhere('details', 'like', '%' . $keyword . '%')
                        ->orWhere('advertiser_details', 'like', '%' . $keyword . '%')
                        ->orWhere('location', 'like', '%' . $keyword . '%')
                        ->orWhere('price', 'like', '%' . $keyword . '%')
                        ->get();

        $offers = Offer::all();

        foreach($offers as $index=>$offer) {
            $data['offers'][$index] = [
                'date' => $offer->event_starts,
                'duration' => $offer->duration,
                'name' => $offer->event_name,
                'advertiser_name' => $offer->advertiser_name,
                'location' => $offer->location,
                'price' => $offer->price,
                'url' => route('showOffer', ['id' => $offer->id]),
            ];
        }

        dd($data['offers']);

        return view('search.search', ['events' => $data['offers']]);
        return view('result');
    }

    public function popularByCategories($category) {
        $offers = Offer::where('category_id', $category)->get();

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
                'price_economy' => $offer->price_economy . ' D.A', 
                'url' => route('showOffer', ['id' => $offer->id]),
            ];
        }

        $searchedFor = 'Popular ' . Category::find($category)->name;
        return view('Offer.results.index',
        [
            'events' => $data['offers'],
            'searchedFor' => $searchedFor
        ]);
    }

}
