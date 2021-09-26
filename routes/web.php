<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


// what ever thing after the slash match go to it
// if not redirect to wlcome page
Route::get('/{vue_capture?}', function () {
    return view('welcome');
})->where('vue_capture' , '[\/\w\.-]*');

