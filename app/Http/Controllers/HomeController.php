<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        for($i = 0; $i < 5; $i++) {
            $events[$i]['date'] = 'date' . $i;
            $events[$i]['name'] = 'name' . $i;
            $events[$i]['promoter'] = 'promoter' . $i;
            $events[$i]['duration'] = 'duration' . $i;
            $events[$i]['location'] = 'location' . $i;
            $events[$i]['price'] = 'price' . $i;
        }
        return view('home/home', ['events' => $events]);
    }
}
