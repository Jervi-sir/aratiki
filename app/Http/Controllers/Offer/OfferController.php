<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Offer;


class OfferController extends Controller
{
    /*--------------------------------------------------------
    |   []  show a single offer
    ----------------------------------------------------------*/
    public function showOffer($id)
    {
        $offer = Offer::find($id);

        return view('Offer.show.index', ['offer' => $offer]);
    }
}
