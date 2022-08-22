<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function() {
    for($i = 0; $i < 5; $i++) {
        $events[$i]['date'] = 'date' . $i;
        $events[$i]['name'] = 'name' . $i;
        $events[$i]['promoter'] = 'promoter' . $i;
        $events[$i]['duration'] = 'duration' . $i;
        $events[$i]['location'] = 'location' . $i;
        $events[$i]['price'] = 'price' . $i;
    }
    return view('home/home', ['events' => $events]);
});

Route::get('/log', function() {
    return view('login');
})->name('promoter.become');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
