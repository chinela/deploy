<?php

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
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

Route::get('/about', function () {
    return 'This is about us';
});

Route::get('/live', function () {
    return 'This is live route';
});

Route::get('/beta', function () {
    return 'This is beta route';
});

Route::get('/queue', function () {
    Mail::to('chinedu@gmai.commm')->send(new TestMail());
    return 'working';
});
