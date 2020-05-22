<?php

use Illuminate\Support\Facades\Route;

/*
|------------|
| Web Routes |
|------------|
*/

Route::get('/', function(){
    return view('index');
});
Route::get('/generatePDF', 'HolidayController@generatePDF');
Route::resource('/holidays', 'HolidayController');
Route::get('/init', 'HolidayController@initHolidays');