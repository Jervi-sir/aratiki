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
