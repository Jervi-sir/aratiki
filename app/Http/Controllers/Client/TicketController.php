<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /*--------------------------------------------------------
    |   [done]  get list of all my tickets
    ----------------------------------------------------------*/
    public function allMyTickets()
    {
        $user = Auth::user();
        $tickets = $user->tickets;

        $data['user'] = [
            'name' => $user->name,
            'bio' => $user->bio ? $user->bio : 'no Bio',
            'phone_number' => $user->phone_number,
            'total_tickets' => $tickets->count(),
            'active_tickets' => $tickets->count(),
        ];

        $data['tickets'] = [];
        foreach($tickets as $index=>$ticket) {
            $ticket_details = json_decode($ticket->details);
            $data['tickets'][$index] = [
                'event_name' => $ticket_details->event_name,
                'advertiser_name' => $ticket->offer->advertiser->name,
                'location' => $ticket_details->location,

                'price' => $ticket_details->price . ' D.A',
                'event_type' => $ticket->event_type,

                'event_day_starts' => date('d', strtotime($ticket_details->event_starts)),
                'event_month_starts' => date('M', strtotime($ticket_details->event_starts)),

                'event_date_starts' => date('M d', strtotime($ticket_details->event_starts)),
                'event_time_starts' => date('h:i A', strtotime($ticket_details->event_starts)),
                'event_date_ends' => date('M d', strtotime($ticket_details->event_ends)),
                'event_time_ends' => date('h:i A', strtotime($ticket_details->event_ends)),

                'duration' => $ticket_details->duration,
                'url' => route('user.thisTicket', ['id' => $ticket->id])
            ];
        }

        return view('Client.myTickets.index', 
            [
                'user' => $data['user'],
                'tickets' => $data['tickets']
            ]);
    }


    /*--------------------------------------------------------
    |   [done]  get my selected ticket
    ----------------------------------------------------------*/
    public function getThisTicket($ticket_id)
    {
        //TODO: generate whole ticket in server
        $user = Auth::user();
        $tickets = $user->tickets;

        $ticket = $tickets->find($ticket_id);

        if($user->id != $ticket->user->id) {
            dd(404);
            //TODO:
        }

        $ticket_details = json_decode($ticket->details);
        $data['ticket'] = [
            'qrcode' => $ticket->qrcode,
            'event_type' => $ticket->event_type,
            'ticket_type' => $ticket->ticket_type,
            'ticket_price' => $ticket->ticket_price,
            
            'advertiser_name' => $ticket->offer->advertiser->name,
            'purchased_date' => date('d M Y', strtotime($ticket->created_at)),
            'purchased_time' => date('h:i a', strtotime($ticket->created_at)),

            'event_name' => $ticket_details->event_name,
            'location' => $ticket_details->location,

            'event_date_starts' => date('M d', strtotime($ticket_details->event_starts)),
            'event_time_starts' => date('h:i A', strtotime($ticket_details->event_starts)),
            'event_date_ends' => date('M d', strtotime($ticket_details->event_ends)),
            'event_time_ends' => date('h:i A', strtotime($ticket_details->event_ends)),

            'duration' => $ticket_details->duration,
        ];

        return view('Client.showTicket.index', ['ticket' => $data['ticket']]);
    }
}
