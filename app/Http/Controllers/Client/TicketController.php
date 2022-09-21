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

        return view('Client.myTickets.index', ['tickets' => $tickets]);
    }


    /*--------------------------------------------------------
    |   [done]  get my selected ticket
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

        return view('Client.showTicket.index', ['ticket' => $ticket]);
    }
}
