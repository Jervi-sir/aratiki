<?php

use Illuminate\Support\Facades\Session;


/**
  * Return a Notification.
  *
  * @param  string  $type
  * @param  string  $title
  * @param  string  $message
  * @return 
  */

function notify_bottom(string $title, string $message) {
    Session::put('notify_bottom_message', $message);
    Session::put('notify_bottom_title', $title);
    return true;
}

function notify_center(string $title, string $message) {
  Session::put('notify_center_message', $message);
  Session::put('notify_center_title', $title);
  return true;
}

function push_notification(string $title, string $details = '', string $url = '') {
  $user = Auth()->user();
  $user_notifications = json_decode($user->notifications);
  $new_notification = [
    'url'     => $url,
    'title'   => $title,
    'details' => $details,
  ];
  array_unshift($user_notifications, $new_notification);
  $user->notifications = json_encode($user_notifications);
  $user->save();
  return true;
}
