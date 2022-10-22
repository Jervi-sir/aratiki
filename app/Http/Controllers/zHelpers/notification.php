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
