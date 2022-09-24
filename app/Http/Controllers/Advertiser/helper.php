<?php

use App\Models\Category;
use Illuminate\Support\Str;

/*---------
|   getDateDifferencet($start, $end) return string date human readable
|   createKeyword($offer) return string of keywords
|   getCategoryId($templateId, $textIfNew = '') return id of category
----------*/


function getDateDifferencet($start, $end) {
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
    $isVIP = $offer->price_vip ? 'vip' : '';

    $keywords = $offer->location . ' ' . 
        $offer->event_name . ' ' . 
        $offer->promoter_name . ' ' . 
        $offer->promoter_details . ' ' . 
        'economic ' . 
        $isVIP;

    return Str::of(strtolower($keywords))->replaceMatches('/ {2,}/', ' ')->value;      
}

function getCategoryId($templateId, $textIfNew = '') {
    if($templateId == 'other') {
        $template = new Category();
        $template->template_name = $textIfNew;
        $template->type = 'other';
        $template->source_code = 'other';
        $template->save();
        return $template->id;
    }

    return Category::find($templateId)->id;
}