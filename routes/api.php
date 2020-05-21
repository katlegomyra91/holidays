<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|------------|
| API Routes |
|------------|
*/

Route::resource('holidays', 'HolidayController');
Route::get('init', 'HolidayController@initHolidays');