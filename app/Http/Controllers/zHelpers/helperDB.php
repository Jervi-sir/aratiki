<?php

use App\Models\Offer;
use App\Models\Payment;
use App\Models\Category;

/*---------
|   listAllPayments() return list of payment type
|   listAllCategories() return array of categories
|   suggestOffers() return random offers default 10 with pagination
----------*/


function listAllPayments() {
    $array = [];
    $payments = Payment::all();
    foreach($payments as $index=>$payment) {
        $array[$index] = [
            'id' => $payment->id,
            'name' => $payment->name,
        ];
    }
    return $array;
}

function listAllCategories() {
    $array = [];
    $payments = Category::all();
    foreach($payments as $index=>$category) {
        $array[$index] = [
            'id' => $category->id,
            'url' => route('category.popular', ['category' => $category->id]),
            'name' => $category->name,
            'type' => $category->type,
        ];
    }
    return $array;
}

function suggestOffers() {
    $offers = Offer::all();
    $array = [];
    foreach($offers as $index=>$offer) {
        $array[$index] = [
            'image' => '/media/' . json_decode($offer->images)[0],
            'date' => date('M d' ,strtotime($offer->event_starts)), //[x]
            'duration' => $offer->duration,
            'event_name' => $offer->event_name, //[x]
            'advertiser_name' => $offer->promoter_name, //[x]
            'location' => $offer->location,
            'hasVip' => $offer->hasVip, //[x]
            'price_economy' => $offer->price_economy, //[x]
            'url' => route('showOffer', ['id' => $offer->id]),
        ];
    }

    return $array;
}