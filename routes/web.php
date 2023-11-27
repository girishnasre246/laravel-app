<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

Route::get('/veggies/{sabji}', function ($sabji) {

    return $sabji;
})->whereIn('sabji', ['baigan', 'bhindi', 'aaloo', 'gobhi']);

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/hello', function () {
    return view('veggies');
});

// On route '/veggies 'a chart should be seen , with name and price of veggies
// On route '/veggies,' a chart should be seen, with the name and price of veggies
Route::get('/veggies', function () {
    return view('table');
});

// Static songs route
Route::get('/songs_static', function () {
    $song1 = new Song();
    $song1->setTitle("Stan");
    $song1->setArtist("Eminem");

    $song2 = new Song();
    $song2->setTitle("Nothing Else Matters");
    $song2->setArtist("Metallica");

    $song3 = new Song();
    $song3->setTitle("With You");
    $song3->setArtist("A P Dhillon");

    return view('songs', ['songs' => [$song1, $song2, $song3]]);
});

// Dynamic songs route
Route::get('/songs', function () {
    return view('songs', ['songs' => Song::all()]);
});
