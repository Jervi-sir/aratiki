<?php

namespace App\Http\Controllers\Advertiser;

use App\Http\Controllers\Controller;

use App\Models\Offer;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class OfferController extends Controller
{
    /*--------------------------------------------------------
    |   [done]  Add Offer       
    ----------------------------------------------------------*/
    public function addOfferPage() {
        $templates = Template::all();
        $phone_number = Auth::user()->advertiser->phone_number;
        return view('Advertiser.post.index', ['templates' => $templates, 'phone_number' => $phone_number]);
    }

    public function addOffer(Request $request) {
        $advertiser = Auth::user()->advertiser;

        /*-- Upload images --*/
        $savedImages = [];
        foreach($request->file('images') as $image) {
            $extension = $image->extension();
            $filename = str_replace(' ', '_', $advertiser->company_name) . '__' . $request->campaign_name . '__' . date("Y_m_d") . '__' . Carbon::now()->timestamp . '.' . $extension;
            //? Maybe add Location Wilaya in filename
            $image->move(public_path('thumbnails'), $filename);
            array_push($savedImages, $filename);
        }

        $offer = new Offer();
        $offer->advertiser_id = $advertiser->id;
        $offer->template_id = Template::find($request->type)->id;
        $offer->campaign_name = $request->campaign_name;
        $offer->campaign_starts = $request->date_start;
        $offer->campaign_ends = $request->date_end;
        $offer->total_tickets = intval($request->total_tickets);
        $offer->tickets_left = intval($request->total_tickets);
        $offer->location = $request->location;
        $offer->price = $request->price;
        $offer->images = json_encode($savedImages);
        $offer->phone_number = $request->phone_number;
        $offer->details = $request->description;
        $offer->company_name = $advertiser->company_name;
        $offer->advertiser_details = $advertiser->advertiser_details;
        $offer->for_search = '$request->for_search';    //?

        $offer->save();
    }


    /*--------------------------------------------------------
    |   []  get list of all offers
    ----------------------------------------------------------*/
    public function manageOffers() {
        $offers = Auth::user()->advertiser->offers;
        foreach($offers as $index=>$offer) {
            $data['offers'][$index] = [
                'offer_id' => $offer->id,
                'main_image' => 'thumbnails/' . json_decode($offer->images)[0],
                'campaign_name' => $offer->campaign_name,
                'campaign_starts' => $offer->campaign_starts,
                'campaign_ends' => $offer->campaign_ends,

                'total_tickets' => $offer->total_tickets,
                'tickets_sold' => $offer->total_tickets - $offer->tickets_left,

                'location' => $offer->location,
                'phone_number' => $offer->phone_number,
                'price' => $offer->price,

                'details' => substr($offer->details, 0, 5) . '...',

                'is_verified' => $offer->is_verified,
                'is_active' => $offer->is_active,
            ];
        }

        return view('tailwind.advertiser.allOffers', ['offers' => $data['offers']]);
    }

    /*--------------------------------------------------------
    |   []  show an offer
    ----------------------------------------------------------*/
    public function showOffer($id)
    {
        $advertiser = Auth::user()->advertiser;
        $offers = $advertiser->offers();
        $offer = $offers->find($id);

        //TODO: if u arent the owner
        dd($offer);

    }

    /*--------------------------------------------------------
    |   []  edit Offer
    ----------------------------------------------------------*/
    public function editOffer($id)
    {
        $offer = Offer::find($id);
        if($offer->advertiser->id != Auth::user()->advertiser->id) {
            return redirect('/');
            //TODO: redirect to 404
        }
        $templates = Template::all();
        return view('tailwind.advertiser.editOffer', ['offer' => $offer,
                                                    'templates' => $templates]);
    }

    public function updateOffer($id, Request $request)
    {
        $offer = Offer::find($id);
        if($offer->advertiser->id != Auth::user()->advertiser->id) {
            return redirect('/');
            //TODO: redirect to 404
        }

        $offer->tickets_left = intval($request->tickets_left);
        $offer->images = '$request->images';
        $offer->details = $request->details;
        $offer->campaign_name = $request->campaign_name;
        $offer->campaign_starts = $request->campaign_starts;
        $offer->campaign_ends = $request->campaign_ends;
        $offer->save();

        return back();
    }
}
