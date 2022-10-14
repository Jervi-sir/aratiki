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
        // Split the terms by word.
        $terms = explode(" ", $request->keywords);
        $offers = Offer::query()
            ->Where(function ($query) use ($terms) {
                foreach ($terms as $term) {
                    $query->where('for_search', 'like', '%' . $term . '%');
                }
            })
            ->get();

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

        dd($data['offers']);
        return view('search.search', ['events' => $data['offers']]);
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
