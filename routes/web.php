<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ZendeskController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/zendesk/read', [App\Http\Controllers\ZendeskController::class, 'index'])->name('index');
Route::get('/zendesk/delete/{id}', [App\Http\Controllers\ZendeskController::class, 'destroy'])->name('destroy');
Route::post('/zendesk/update/{id}', [App\Http\Controllers\ZendeskController::class, 'update'])->name('update');

Route::get('/zendesk/show/{id}', [App\Http\Controllers\ZendeskController::class, 'show'])->name('show');
Route::post('/zendesk/store', [App\Http\Controllers\ZendeskController::class, 'store'])->name('store');
