<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
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
    return view('pages/try');
});
Route::get('ajax',function() {
    return view('pages/message');
 });
 Route::get('/w', function () {
    return view('pages/welcome');
});
 Route::get('getmsg', [AjaxController::class, 'autosearch'])->name('search');