<?php

namespace App\Http\Controllers\Client;

use Carbon\Carbon;
use App\Models\Offer;
use App\Models\Ticket;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class PurchaseController extends Controller
{
    /*--------------------------------------------------------
    |   []  refund
    ----------------------------------------------------------*/
    public function refund($offer_id)
    {
        //
    }


    /*--------------------------------------------------------
    |   [x]  generate my ticket
    ----------------------------------------------------------*/
    public function purchase($offer_id,Request $request) {
        $offer = Offer::find($offer_id);

        if($offer->tickets_left == 0 || $offer->is_active != 1) {
            //TODO: return error
        }

        $user = Auth::user();

        $ticket = new Ticket();
        $ticket->uuid = Str::uuid();
        $ticket->user_id = $user->id;
        $ticket->offer_id = $offer_id;
        $ticket->qrcode = $this->qrcodeGenerate($offer, $user, 2);
        $ticket->event_type = Category::find($offer->category_id)->name;
        $ticket->details = json_encode([
            'event_name' => $offer->event_name,
            'location' => $offer->location,
            'event_starts' => $offer->event_starts,
            'event_ends' => $offer->event_ends,
            'duration' => $offer->duration,
            'advertiser_id' => $offer->user_id,
        ]);
        $ticket->save();


        if($offer->tickets_left_economy != 0) {
            $offer->tickets_left_economy--;
        }
        if($offer->tickets_left_economy == 0) {
            $offer->is_active = 0;
        }
        $offer->save();

        return back();
    }

    private function qrcodeGenerate($offer, $user, $place) {
        $qrcode = 'name' . $user->name . '&' .
            'festival' . $offer->id . '&' .
            'source' . $offer->advertiser()->first()->id . '&' .
            'secret_code' . Str::random(16) . '&' .
            'date' . Carbon::now()->format('Y-m-d') . '&' .
            'place' . $place;

        return $qrcode;
    }
}
