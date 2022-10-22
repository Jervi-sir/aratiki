<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function allMyNotifications() {
        $user = Auth()->user();
        $tickets = $user->tickets;

        $data['user'] = [
            'name' => $user->name,
            'bio' => $user->bio ? $user->bio : 'no Bio',
            'phone_number' => $user->phone_number,
            'total_tickets' => $tickets->count(),
            'active_tickets' => $tickets->count(),
        ];

        $notifications = json_decode($user->notifications);

        $data['notifications'] = [];
        foreach ($notifications as $index => $notification) {
            $data['notifications'][$index] = [
                'type'    => $notification->type,
                'url'     => str_replace('/', '&69', $notification->url),
                'title'   => $notification->title,
                'details' => $notification->details,
                'writtenDate' => $notification->writtenDate,
                'date' => $notification->date,
                'notVisited' => $notification->notVisited,
            ];
        }

        return view('Client.myNotifications.index',
            [
                'user' => $data['user'],
                'notifications' => $data['notifications']
            ]);
    }

    public function viewNotification($index, $redirect) {
        $index = $index;
        $redirect = str_replace('&69', '/', $redirect);

        //make it as viewed
        $user = Auth()->user();
        $user_notifications = json_decode($user->notifications);
        $user_notifications[$index]->notVisited = false;

        $user->notifications = json_encode($user_notifications);
        $user->save();

        return redirect($redirect);
    }
}
