<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

/*---------
|   updateImages($oldImages, $newImages, $event_uuid) return arrayWihoutNull($oldImages)
|   uploadBase64Images($imagesBase64, $event_uuid) return $imagesBase64

|   isBase64($string, $startString = 'data:') return boolean
|   arrayWihoutNull($array) return array
|   fillArray($array, $size = 5) return array
|   saveImage($image, $event_uuid) return filepath
|   getArrayImageUrl($images, $amount = 5) return array
---------*/


function updateImages($oldImages, $newImages, $event_uuid) {
    $oldImages = fillArray(json_decode($oldImages));

    for($i = 0; $i < 5; $i++) {
        //if its null means delete
        if($newImages[$i] == null) {
            !is_null($oldImages[$i]) && Storage::disk('public')->delete($oldImages[$i]);
            $oldImages[$i] = null;
        }
        //if its base64 means update this image
        if(isBase64($newImages[$i])) {
            //save image in cloud
            $filepath = saveImage($newImages[$i], $event_uuid);
            //delete old image from cloud if exists
            if($oldImages[$i] != null) {
                Storage::disk('public')->delete($oldImages[$i]);
            }
            $oldImages[$i] = $filepath;
        }
    }
    return arrayWihoutNull($oldImages);
}

function isBase64($string, $startString = 'data:') {
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}

function arrayWihoutNull($array) {
    $newArray = [];
    foreach ($array as $item) {
        if($item) { array_push($newArray, $item); }
    }
    return $newArray;
}

function fillArray($array, $size = 5) {
    $arrayLenght = count($array);
    for($i = $arrayLenght - 1; $i < $size - 1; $i++) {
        array_push($array, null);
    }
    return $array;
}

function uploadBase64Images($imagesBase64, $event_uuid) {
    $savedImages = [];
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