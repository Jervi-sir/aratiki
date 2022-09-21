<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use Carbon\Carbon;
use App\Models\Offer;
use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
    |   []  generate my ticket
    ----------------------------------------------------------*/
    public function purchase($offer_id)
    {
        $offer = Offer::find($offer_id);
        if($offer->tickets_left == 0 || $offer->is_active != 1) {
            //TODO: return error
        }

        $user = Auth::user();

        $ticket = new Ticket();
        $ticket->user_id = $user->id;
        $ticket->offer_id = $offer_id;
        $ticket->qrcode = $this->qrcodeGenerate($offer, $user, 2);
        $ticket->details = '$details';
        $ticket->type = $offer->type;
        $ticket->place = 2; //use random code for place

        $ticket->save();

        if($offer->tickets_left != 0) {
            $offer->tickets_left--;
        }else {/*disavtivate the offer*/}
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
