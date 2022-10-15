<?php

use App\Models\Category;
use App\Models\Offer;
use App\Models\Payment;
use Stichoza\GoogleTranslate\GoogleTranslate;

/*---------
|   getDateDifference($start, $end) return string date human readable
|   createKeyword($offer) return string of keywords
|   getCategoryId($templateId, $textIfNew = '') return id of category
|   listAllPayments() return list of payment type
|   listAllCategories() return array of categories
|   suggestOffers() return random offers default 10 with pagination
----------*/

function getDateDifference($start, $end) {
    $start = new DateTime($start);
    $end = new DateTime($end);
    $duration = $start->diff($end);
    $durationFinal = '';
    $days = $duration->format('%d');
    $hours = $duration->format('%h');
    if($hours != 0) {
        $durationFinal = $hours . ' hours';
    }
    if($days != 0) {
        $durationFinal = $days . ' days';
    }

    return $durationFinal;
}

function createKeyword($offer) {
    $tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default

    $meta_data_from_advertiser = $offer->event_name . ', ' .
            $offer->location . ', ' .
            $offer->description . ', ' .
            $offer->duration . ', ' .
            $offer->advertiser_name . ', ' .
            $offer->advertiser_details;

    $ar = $tr->setSource()->setTarget('ar')->translate($meta_data_from_advertiser);
    $fr = $tr->setSource()->setTarget('fr')->translate($meta_data_from_advertiser);
    $en = $tr->setSource()->setTarget('en')->translate($meta_data_from_advertiser);
    $result = strtolower($fr) . ', ' . strtolower($en) . ', ' . strtolower($ar);

    return $result;
    //return Str::of(strtolower($keywords))->replaceMatches('/ {2,}/', ' ')->value;      
}

function getCategory($templateId, $textIfNew = '') {
    if($templateId == 'other') {
        $template = new Category();
        $template->name = $textIfNew;
        $template->type = 'other';
        $template->source_code = 'other';
        $template->save();
        return $template;
    }

    return Category::find($templateId);
}

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
            'code_name' => $category->code_name,
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