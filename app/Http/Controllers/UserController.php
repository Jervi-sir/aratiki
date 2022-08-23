<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\Offer;
use App\Models\Ticket;
use App\Models\Advertiser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /*--------------------------------------------------------
    |   become an advertiser
    ----------------------------------------------------------*/
    public function upgradePage()
    {
        return view('tailwind.user.upgrade');
    }

    public function upgrade(Request $request)
    {
        $user = Auth::user();
        $user->role_id = Role::where('name', 'advertiser')->first()->id;
        $user->save();

        $adv = new Advertiser();
        $adv->user_id = $user->id;
        $adv->company_name = $request->company_name;
        $adv->phone_number = $request->phone_number;
        $adv->details = $request->details;
        //TODO: $adv->images = $request->images;
        $adv->save();

        dd($adv, $user);

    }


    /*--------------------------------------------------------
    |   get list of all my tickets
    ----------------------------------------------------------*/
    public function allMyTickets()
    {
        $user = Auth::user();
        $tickets = $user->tickets;

        return view('tailwind.user.myTickets', ['tickets' => $tickets]);
    }


    /*--------------------------------------------------------
    |   get my selected ticket
    ----------------------------------------------------------*/
    public function getThisTicket($qrcode)
    {
        //TODO: generate whole ticket in server
        $user = Auth::user();
        $tickets = $user->tickets;

        $ticket = $tickets->where('qrcode', $qrcode)->first();
        if($user->id != $ticket->user->id) {
            dd(404);
            //TODO:
        }

        return view('tailwind.user.thisTicket', ['ticket' => $ticket]);
    }

    public function refund($offer_id)
    {
        //
    }


    /*--------------------------------------------------------
    |   generate my ticket
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
