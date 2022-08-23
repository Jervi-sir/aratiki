<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Offer;
use App\Models\Template;
use App\Models\Advertiser;
use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class AdvertiserController extends Controller
{
    /*--------------------------------------------------------
    |  add a fresh client
    ----------------------------------------------------------*/
    public function joinAdvertiserPage()
    {
        //TODO: if already requests
        return view('tailwind.advertiser.join');
    }

    //? joined as a new one
    public function joinAdvertiser(Request $request)
    {
        $user = new User();
        $user->role_id = Role::where('name', 'advertiser')->first()->id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $adv = new Advertiser();
        $adv->user_id = $user->id;
        $adv->company_name = $request->company_name;
        $adv->phone_number = $request->phone_number;
        $adv->details = $request->details;
        //TODO: $adv->images = $request->images;
        $adv->save();

        event(new Registered($user));

        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);

    }

    /*--------------------------------------------------------
    |   Add Offer
    ----------------------------------------------------------*/
    public function addOfferPage()
    {
        $templates = Template::all();
        return view('tailwind.advertiser.addOffer', ['templates' => $templates]);
    }

    public function addOffer(Request $request)
    {
        dd($request);
        $advertiser = Auth::user()->advertiser;

        $offer = new Offer();
        $offer->advertiser_id = $advertiser->id;
        //TODO: set template id
        $offer->template_id = Template::find($request->type)->id;
        $offer->tickets_left = intval($request->tickets_left);
        $offer->images = '$request->images';
        $offer->details = $request->details;
        $offer->campaign_name = $request->campaign_name;
        $offer->campaign_starts = $request->campaign_starts;
        $offer->campaign_ends = $request->campaign_ends;
        $offer->save();

        $search = new Search();
        $search->advertiser_id = $advertiser->id;
        $search->offer_id = $offer->id;

        $search->company_name = $advertiser->company_name;
        $search->campaign_name = $offer->campaign_name;
        //$search->is_active = $offer->id;
        $search->details = $offer->details;
        $search->advertiser_details = $advertiser->details;
        $search->location = 'location';
        $search->price = 'price';
        $search->save();

        dd($offer);
    }


    /*--------------------------------------------------------
    |   get list of all offers
    ----------------------------------------------------------*/
    public function manageOffers()
    {
        $offers = Auth::user()->advertiser->offers;
        return view('tailwind.advertiser.allOffers', ['offers' => $offers]);
    }

    /*--------------------------------------------------------
    |   show an offer
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
    |   edit Offer
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
