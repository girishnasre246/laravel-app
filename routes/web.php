
<?php

use Illuminate\Support\Facades\Route;
// use Practicals\Song;
use App\Models\Song;



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
Route::get('/veggies', function () {
    return view('table');
});
Route::get('/songs_static', function () {
    


    return view('songs_static'); 
  });
  Route::get('/playlists/{playlistId}', function (string $playlistId) {
    return view('playlist', ['songs' => Song::all(), 'playlistId' => $playlistId ]);
  });


  Route::get('/songs', function () {
    return view('song', [ 'songs' => Song::all() ] );
});