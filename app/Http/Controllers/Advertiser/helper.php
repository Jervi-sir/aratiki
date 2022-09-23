<?php

use Carbon\Carbon;
use App\Models\Template;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

function uploadBase64Images($imagesBase64, $event_uuid) {
    $imagesBase64 = [];
    foreach($imagesBase64 as $image) {
        //? Maybe add Location Wilaya in filename
        if($image) {
            $filePath = saveImage($image, $event_uuid);
            array_push($savedImages, $filePath);
        }
    }

    return $imagesBase64;
}

function saveImage($image, $event_uuid) {
    $file = explode( ',', $image)[1];
    $filename = $event_uuid . '__' . 
                date("Y_m_d") . '__' . 
                Carbon::now()->timestamp . 
                '.png';
    $filePath = $filename;
    Storage::disk('public')->put($filePath, base64_decode($file));

    return $filePath;
}
    
function getArrayImageUrl($images, $amount = 5) {
    $images = json_decode($images);
    $array = [];
    
    foreach ($images as $path) {
        array_push($array, url('/') . '/media/' . $path);
    }

    if($amount > count($images)) {
        for($i = 0; $i < ($amount - count($images)); $i++) {
            array_push($array, false);
        }
    }

    return $array;
}

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

function getTemplateId($templateId, $textIfNew = '') {
    if($templateId == 'other') {
        $template = new Template();
        $template->template_name = $textIfNew;
        $template->type = 'other';
        $template->source_code = 'other';
        $template->save();
        return $template->id;
    }

    return Template::find($templateId)->id;
}