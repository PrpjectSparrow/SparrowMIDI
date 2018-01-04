<?php

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
/*
Route::get('/', function () {
    return view('index');
})->name('index');
*/
Auth::routes();

Route::get('/', 'HomeController@index')->name('index');


//常规
Route::get('/midi/{id}','MidiController@file')->name("midi.file");

//API
Route::prefix('api')->group(function () {
    Route::get('/midis/','MidiController@apiIndex')->name("api.midi.index");
    Route::get('/midis/recent/','MidiController@apiIndexRecent')->name("api.midi.recent");
});

//UCP
Route::middleware(['auth'])->group(function () {
    //UCP
    Route::get('/ucp/','UCPController@index')->name("ucp");
    //MIDI
    Route::get('/ucp/midi/new','MidiController@upload')->name("ucp.midi.add");
    Route::post('/ucp/midi/upload','MidiController@store')->name("ucp.midi.upload");
});



