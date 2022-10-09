<?php

use App\Models\Category;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;

/*---------
|   getDateDifference($start, $end) return string date human readable
|   createKeyword($offer) return string of keywords
|   getCategoryId($templateId, $textIfNew = '') return id of category
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