<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [SiteController::class, 'index']);
Route::get('/groups', [SiteController::class, 'groups']);
Route::get('/teach', [SiteController::class, 'teach']);
Route::get('/yutuqlar', [SiteController::class, 'yutuqlar']);
Route::get('/gallery', [SiteController::class, 'gallery']);
Route::get('/maqola', [SiteController::class, 'maqola']);
