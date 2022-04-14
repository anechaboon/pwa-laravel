<?php

use App\Events\GetRequestEvent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return redirect('/index');
});

Route::get('/trigger/{index}', function ($index) {
    event(new GetRequestEvent($index));
});

// call this to send data to app subscribed
// param index for point index to show data name
Route::get('/broadcast/{index}',function($index) {
    broadcast(new GetRequestEvent($index));
});


Route::get('index', [HomeController::class, 'index'])->name('index');
Route::get('test', [HomeController::class, 'test'])->name('test');

