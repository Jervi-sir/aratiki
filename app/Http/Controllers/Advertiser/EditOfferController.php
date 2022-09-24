<?php

namespace App\Http\Controllers\Advertiser;

use App\Models\Offer;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditOfferController extends Controller
{
    /*--------------------------------------------------------
    |   [x]  edit Offer
    ----------------------------------------------------------*/
    public function editOffer($id)  {
        $offer = Offer::find($id);
        if($offer->advertiser->id != Auth::user()->advertiser->id) {
            return abort(404);
        }
        
        $data['offer'] = [
            'id' => $offer->id,
            'category' => Category::find($offer->category_id)->name, //[x]
            'event_name' => $offer->event_name, //[x]
            'location' => $offer->location, //[x]
            'map_location' => $offer->map_location, //[x]
            'description' => $offer->description, //[x]
            'images' => getArrayImageUrl($offer->images), //[x]
            'date' => date('M d' ,strtotime($offer->event_starts)), //[x]
            'event_starts' => $offer->event_starts, //[x]
            'event_ends' => $offer->event_ends, //[x]
            'duration' => $offer->duration, //[x]
            'price_vip' => $offer->price_vip, //[x]
            'total_tickets_vip' => $offer->total_tickets_vip, //[x]
            'tickets_left_vip' => $offer->tickets_left_vip, //[x]
            'price_economy' => $offer->price_economy, //[x]
            'total_tickets_economy' => $offer->total_tickets_economy, //[x]
            'tickets_left_economy' => $offer->tickets_left_economy, //[x]
            'payment_type_id' => $offer->payment_type_id, //[]
            'payment_type_name' => $offer->payment_type_name, //[]
            'advertiser_name' => $offer->advertiser_name, //[x]
            'advertiser_details' => $offer->advertiser_details, //[]
            'phone_number' => $offer->phone_number, //[]
            'is_verified' => $offer->is_verified, //[]
            'is_active' => $offer->is_active, //[]
            'nb_visited' => $offer->nb_visited, //[]
            'votes' => $offer->votes, //[]
            'created_at' => date('d M Y', strtotime($offer->created_at)), //[]
            //'url' => route('showOffer', ['id' => $offer->id]),
        ];

        $categories = Category::all();
        foreach($categories as $index=>$category) {
            $data['categories'][$index] = [
                'id' => $category->id,
                'name' => $category->name,
                'type' => $category->type,
            ];
        }

        return view('Advertiser.editOffer.index', 
            [
                'offer' => $data['offer'],
                'categories' => $data['categories']
            ]
        );
    }

    public function updateOffer($id, Request $request) {
        $offer = Offer::find($id);
        if($offer->advertiser->id != Auth::user()->advertiser->id) {
            return redirect('/');
            //TODO: redirect to 404
        }
        
        $offer->category_id = getCategoryId($request->type, $request->other_type);
        /*--[ specific details ]--*/
        $offer->event_name = $request->event_name;
        $offer->location = $request->location;
        $offer->map_location = $request->map_location;
        $offer->description = $request->description;
        $offer->images = json_encode(updateImages($offer->images ,$request->images, 'uuid'));
        /*--[ date ]--*/
        $offer->event_starts = $request->event_starts;
        $offer->event_ends = $request->event_ends;
        $offer->duration = getDateDifferencet($request->event_starts, $request->event_ends);
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
        $offer->phone_number = $request->phone_number;
        /*--[ of search data ]--*/
        $offer->for_search = createKeyword($offer);    //?

        $offer->save();
    
        return back();
    }

}
