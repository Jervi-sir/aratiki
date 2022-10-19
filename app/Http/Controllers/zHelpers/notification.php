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

function notify(string $type, string $title, string $message)
{
    Session::flash('notify.message', $message);
    Session::flash('notify.type', $type);
    Session::flash('notify.title', $title);
    return true;

}