<?php

namespace App\Http\Controllers\Client;

use Carbon\Carbon;
use App\Models\Offer;
use App\Models\Ticket;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
require dirname(__DIR__) . '\zHelpers\notification.php';

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
    public function purchase(Request $request) {
        if($request->type != 'vip' || $request->type != 'economic') {
            //TODO: return error
        }

        $offer = Offer::find($request->offer_id);

        if($offer->tickets_left == 0 || $offer->is_active != 1) {
            //TODO: return error
        }

        //ticket type
        if($request->type == 'vip') {
            $ticket_type = 'vip';
            $ticket_price = $offer->price_vip;
        }
        if($request->type == 'economic') {
            $ticket_type = 'economic';
            $ticket_price = $offer->price_economy;
        }
        
        $user = Auth::user();

        $ticket = new Ticket();
        $ticket->uuid = Str::uuid();
        $ticket->user_id = $user->id;
        $ticket->offer_id = $offer->id;
        $ticket->ticket_type = $ticket_type;
        $ticket->ticket_price = $ticket_price;
        $ticket->qrcode = $this->qrcodeGenerate($offer, $user);
        $ticket->event_type = Category::find($offer->category_id)->name;
        $ticket->details = json_encode([
            'event_name' => $offer->event_name,
            'location' => $offer->location,
            'event_starts' => $offer->event_starts,
            'event_ends' => $offer->event_ends,
            'duration' => $offer->duration,
            'advertiser_id' => $offer->user_id,
            'type' => $ticket_type,
            'price' => $ticket_price,
        ]);
        $ticket->save();

        // vip decrease offer tickets
        if($offer->tickets_left_vip != 0) {
            $offer->tickets_left_vip--;
        }
        // economic decrease offer tickets
        if($offer->tickets_left_economy != 0) {
            $offer->tickets_left_economy--;
        }
        //event states
        if($offer->tickets_left_vip == 0
            && $offer->tickets_left_economy == 0) {
            $offer->is_active = 0;
        }
        $offer->save();

        push_notification(
            $type = 'purchased_ticket', 
            $title = 'Ticket Purchased', 
            $details = 'You have purchased a ticket successfully ✔️',
            $url = "/getThisTicket/" . $ticket->id
        );

        notify_center(__('_components.ticket_purchased'), ' ');

        return redirect()->route('user.thisTicket', ['id' => $ticket->id]);
    }

    private function qrcodeGenerate($offer, $user, $place = 0) {
        $qrcode = 'qrcode&='.
            'name' . $user->name . '&=' .
            'event' . $offer->id . '&=' .
            'advertiser' . $offer->advertiser()->first()->id . '&=' .
            'publiccode' . Str::random(16) . '&=' .
            'purchasedate' . Carbon::now()->format('Y-m-d') . '&=' .
            'place' . $place;

        return str_replace(' ', '_', $qrcode);
    }
}
