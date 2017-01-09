<?php


Route::get('/', function () {
    return view('welcome');
});


Route::get('/status', function () {
    $stati = App\Status::orderBy('seq','asc')->get();
    
    return json_encode($stati);
});


Route::resource('claim','ClaimsController');