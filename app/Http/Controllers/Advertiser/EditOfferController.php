<?php

namespace App\Http\Controllers\Advertiser;

use App\Models\Offer;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
require dirname(__DIR__) . '\zHelpers\upload.php';
require dirname(__DIR__) . '\zHelpers\helper.php';

class EditOfferController extends Controller
{
    /*--------------------------------------------------------
    |   [xx]  edit Offer
    ----------------------------------------------------------*/
    public function editOffer($id)  {
        $offer = Offer::find($id);
        if($offer->advertiser->id != Auth::user()->advertiser->id) {
            return abort(404);
        }
        
        $data['offer'] = [
            'url' => route('update.advertiser.editOffer', ['id' => $offer['id']]),
            'category' => Category::find($offer->category_id)->name,
            'payment_id' => $offer->payment_id,
            
            'event_name' => $offer->event_name,
            'location' => $offer->location,
            'map_location' => $offer->map_location,
            'description' => $offer->description,
            'images' => getArrayImageUrl($offer->images),
     
            'event_starts' => $offer->event_starts,
            'event_ends' => $offer->event_ends,
     
            'hasVip' => $offer->hasVip,
            'price_vip' => $offer->price_vip,
            'total_tickets_vip' => $offer->total_tickets_vip,
            'tickets_left_vip' => $offer->tickets_left_vip + 1,
            'price_economy' => $offer->price_economy,
            'total_tickets_economy' => $offer->total_tickets_economy,
            'tickets_left_economy' => $offer->tickets_left_economy + 1,
     
            'phone_number' => $offer->phone_number,
            
            'is_verified' => $offer->is_verified,  /*[-]*/  
            'is_active' => $offer->is_active,      /*[-]*/  
            'nb_visited' => $offer->nb_visited,    /*[-]*/  
            'votes' => $offer->votes,              /*[-]*/  
        ];

        $data['categories'] = listAllCategories();
        $data['payments'] = listAllPayments();

        return view('Advertiser.editOffer.index', 
            [
                'offer' => $data['offer'],
                'payments' => $data['payments'],
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
        
        $offer->category_id = getCategory($request->category_id, $request->other_type)->id;
        /*--[ specific details ]--*/
        $offer->event_name = $request->event_name;
        $offer->location = $request->location;
        $offer->map_location = $request->map_location;
        $offer->description = $request->description;
        $offer->images = json_encode(updateImages($offer->images ,$request->images, $offer->uuid));
        /*--[ date ]--*/
        $offer->event_starts = $request->event_starts;
        $offer->event_ends = $request->event_ends;
        $offer->duration = getDateDifference($request->event_starts, $request->event_ends);
        /*--[ tickets ]--*/
        if($request->containVIP) {
            $offer->price_vip = $request->price_vip;
            $offer->total_tickets_vip = intval($request->ticket_vip_amount);
        }

        $offer->price_economy = $request->price_economy;
        $offer->total_tickets_economy = intval($request->ticket_economy_amount);

        $offer->payment_id = $request->payment_id;
        $offer->payment_type_name = Payment::find(intval($request->payment_id))->name;
        /*--[ advertiser data ]--*/
        $offer->phone_number = $request->phone_number;
        /*--[ of search data ]--*/
        $offer->for_search = createKeyword($offer);    

        $offer->save();
    
        return redirect()->route('get.advertiser.offer', ['id' => $offer->id]);
    }

}
