<?php

namespace App\Http\Controllers\Advertiser;

use DateTime;

use Carbon\Carbon;
use App\Models\Offer;
use App\Models\Template;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    /*--------------------------------------------------------
    |   [done]  Add Offer       
    ----------------------------------------------------------*/
    public function addOfferPage() {
        $templates = Template::all();
        $phone_number = Auth::user()->advertiser->phone_number;
        return view('Advertiser.post.index', 
            [
                'types' => $templates, 
                'phone_number' => $phone_number
            ]
        );
    }

    

    public function addOffer(Request $request) {
        $user = Auth::user();
        $advertiser = $user->advertiser;

        $savedImages = [];
        /*-- Upload images --*/
        foreach($request->images as $image) {
            //? Maybe add Location Wilaya in filename
            if($image) {
                $file = explode( ',', $image)[1];
                $filename = '/' . str_replace(' ', '_', $advertiser->company_name) . '__' . 
                                $request->campaign_name . '__' . 
                                date("Y_m_d") . '__' . 
                                Carbon::now()->timestamp . 
                                '.png';
                $filePath = str_replace(' ', '_', $user->name) . '/' . $filename;
                Storage::disk('public')->put($filePath, base64_decode($file));
                array_push($savedImages, $filePath);
            }

        }
        $offer = new Offer();
        /*--[ foreign keys ]--*/
        $offer->advertiser_id = $advertiser->id;
        $offer->template_id = $this->getTemplateId($request->type, $request->other_type);
        /*--[ specific details ]--*/
        $offer->event_name = $request->event_name;
        $offer->location = $request->location;
        $offer->map_location = $request->map_location;
        $offer->description = $request->description;
        $offer->images = json_encode($savedImages);
        /*--[ date ]--*/
        $offer->event_starts = $request->event_starts;
        $offer->event_ends = $request->event_ends;
        $offer->duration = $this->getDateDifferencet($request->event_starts, $request->event_ends);
        /*--[ tickets ]--*/
        if($request->containVIP) {
            $offer->price_vip = $request->price_vip;
            $offer->total_tickets_vip = intval($request->ticket_vip_amount);
            $offer->tickets_left_vip = intval($request->ticket_vip_amount);
        }
        $offer->price_economy = $request->price_economy;
        $offer->total_tickets_economy = intval($request->ticket_economy_amount);
        $offer->tickets_left_economy = intval($request->ticket_economy_amount);
        $offer->payment_type_id = $request->payment_type;
        $offer->payment_type_name = 'paymentType';
        /*--[ advertiser data ]--*/
        $offer->promoter_name = $advertiser->company_name;
        $offer->promoter_details = $advertiser->advertiser_details;
        $offer->phone_number = $request->phone_number;
        /*--[ of search data ]--*/
        $offer->for_search = $this->createKeyword($offer);    //?

        $offer->save();

        return redirect()->route('get.advertiser.offer', ['id' => $offer->id]);

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
    public function showOffer($id)  {

        $advertiser = Auth::user()->advertiser;
        $offer = Offer::find($id);

        //if not owner
        if($offer->advertiser_id != $advertiser->id) {
            return view('showOffer', ['id' => $id]);
        }

        $data['offer'] = [
            'type' => Template::find($offer->template_id)->template_name, //[x]

            'event_name' => $offer->event_name, //[x]
            'location' => $offer->location, //[x]
            'map_location' => $offer->map_location, //[x]
            'description' => $offer->description, //[x]
            'images' => json_decode($offer->images), //[x]
            'date' => date('M d' ,strtotime($offer->event_starts)), //[x]
            'event_starts' => date('M d, g:i A' ,strtotime($offer->event_starts)), //[x]
            'event_ends' => date('M d, g:i A' ,strtotime($offer->event_ends)), //[x]
            'duration' => $offer->duration, //[x]
            'price_vip' => $offer->price_vip, //[x]
            'total_tickets_vip' => $offer->total_tickets_vip, //[x]
            'tickets_left_vip' => $offer->tickets_left_vip, //[x]
            'price_economy' => $offer->price_economy, //[x]
            'total_tickets_economy' => $offer->total_tickets_economy, //[x]
            'tickets_left_economy' => $offer->tickets_left_economy, //[x]
            'payment_type_id' => $offer->payment_type_id, //[]
            'payment_type_name' => $offer->payment_type_name, //[]
            'promoter_name' => $offer->promoter_name, //[x]
            'promoter_details' => $offer->promoter_details, //[]
            'phone_number' => $offer->phone_number, //[]
            'is_verified' => $offer->is_verified, //[]
            'is_active' => $offer->is_active, //[]
            'nb_visited' => $offer->nb_visited, //[]
            'votes' => $offer->votes, //[]
            'created_at' => date('d M Y', strtotime($offer->created_at)), //[]
            //'url' => route('showOffer', ['id' => $offer->id]),
        ];

        return view('Advertiser.showOffer.index', ['offer' => $data['offer']]);
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

   


    function getDateDifferencet($start, $end) {
        $start = new DateTime($start);
        $end = new DateTime($end);
        $duration = $start->diff($end);
        $durationFinal = '';
        $days = $duration->format('%d');
        $hours = $duration->format('%h');
        if($hours != 0) {
            $durationFinal = $hours . ' hours';
        }
        if($days != 0) {
            $durationFinal = $days . ' days';
        }

        return $durationFinal;
    }

    function createKeyword($offer) {
        $isVIP = $offer->price_vip ? 'vip' : '';

        $keywords = $offer->location . ' ' . 
            $offer->event_name . ' ' . 
            $offer->promoter_name . ' ' . 
            $offer->promoter_details . ' ' . 
            'economic ' . 
            $isVIP;
    
        return Str::of(strtolower($keywords))->replaceMatches('/ {2,}/', ' ')->value;      
    }

    function getTemplateId($templateId, $textIfNew = '') {
        if($templateId == 'other') {
            $template = new Template();
            $template->template_name = $textIfNew;
            $template->type = 'other';
            $template->source_code = 'other';
            $template->save();
            return $template->id;
        }

        return Template::find($templateId)->id;
    }
}
