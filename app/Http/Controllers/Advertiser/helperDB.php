<?php

use App\Models\Payment;
use App\Models\Category;


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
            'name' => $category->name,
            'type' => $category->type,
        ];
    }
    return $array;
}