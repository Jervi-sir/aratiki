<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Offer;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /*--------------------------------------------------------
    |   []  Search
    ----------------------------------------------------------*/
    public function search(Request $request) {
        $terms = explode(" ", $request->keywords);
        $data['keywords'] = $request->keywords;
        $offers = Offer::query()
            ->Where(function ($query) use ($terms) {
                foreach ($terms as $term) {
                    $query->where('for_search', 'like', '%' . $term . '%');
                }
            })
            ->get();
        $data['count'] = 0;

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
            $data['count'] = $index + 1;
        }

        return view('Home.search', 
        [
            'events' => $data['offers'],
            'keywords' => $data['keywords'],
            'count' => $data['count'],
        ]);
    }

    public function popularByCategories($category) {
        $offers = Offer::where('category_id', $category)->get();
        $categoryName = Category::find($category)->name;

        $data['count'] = '0';
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
            $data['count'] = $index + 1;
        }

        $searchedFor = 'Popular ' . Category::find($category)->name;
        return view('Home.search',
        [
            'events' => $data['offers'],
            'keywords' => $categoryName,
            'count' => $data['count'],
        ]);
    }

}
