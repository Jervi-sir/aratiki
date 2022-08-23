<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Template;
use App\Models\Advertiser;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    /*--------------------------------------------------------
    |   templates
    ----------------------------------------------------------*/
    /**
     * Open Page to add template.
     */
    public function addTemplatePage()
    {
        return view('tailwind.admin.addTemplate');
    }

    /**
     * save added template.
     */
    public function addTemplate(Request $request)
    {
        $template = new Template();
        $template->template_name = $request->template_name;
        $template->type = $request->type;
        $template->source_code = $request->source_code;
        $template->save();
        dd($template);
    }

    /*--------------------------------------------------------
    |   Adfertisers
    ----------------------------------------------------------*/
    /**
     * get list of Not Verified Advertisers.
     */
    public function listNonVerifiedAdv()
    {
        $advs = Advertiser::where('is_verified', 0)->get();
        return view('tailwind.admin.advertisers.nonVerifiedAdvertisers', ['advs' => $advs]);
    }

    /**
     * get list of All Advertisers verified or not.
     */
    public function allAdv() {
        $advs = Advertiser::all();

        return view('tailwind.admin.advertisers.allAdvs', ['advs' => $advs]);
    }

    /**
     * open edit advertiser page.
     */
    public function editAdv($id)
    {
        $adv = Advertiser::find($id);

        return view('tailwind.admin.advertisers.editAdvertiser',['adv' => $adv]);
    }


    /**
     * confirm advertiser.
     */
    public function confirmAdv($id)
    {
        $adv = Advertiser::find($id);
        $adv->is_verified = 1;
        $adv->save();

        return back();
    }

    /**
     * unconfirm advertiser.
     */
    public function unconfirmAdv($id)
    {
        $adv = Advertiser::find($id);
        $adv->is_verified = 0;
        $adv->save();

        return back();
    }


    /*--------------------------------------------------------
    |   OFFERS
    ----------------------------------------------------------*/
    /**
     * get list of Not Verified offers.
     */
    public function listNonVerifiedOffer()
    {
        $offers = Offer::where('is_verified', 0)->get();
        return view('tailwind.admin.offers.nonVerifiedOffers', ['offers' => $offers]);

    }

    /**
     * get list of all offers.
     */
    public function allOffers()
    {
        $offers = Offer::all();

        return view('tailwind.admin.offers.allOffers',['offers' => $offers]);
    }

    /**
     * confirm offer.
     */
    public function confirmOffer($id)
    {
        $offer = Offer::find($id);
        $offer->is_verified = 1;
        $offer->save();

        return back();
    }

    /**
     * show offer.
     */
    public function showOffer($id)
    {
        $offer = Offer::find($id);

        return view('test.admin.showOffer',['offer' => $offer]);
    }

    public function destroy($id)
    {
        //
    }
}
