<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\BazaController;
use App\Http\Controllers\InfoController;
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


Route::post('/store', [BazaController::class, 'store'])->name('store');

Route::prefix('admin/')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('info/index', [InfoController::class, 'index'])->name('info.index');
    Route::get('info/create', [InfoController::class, 'create'])->name('infos.create');
    Route::post('info/store', [InfoController::class, 'store'])->name('infos.store');

});
