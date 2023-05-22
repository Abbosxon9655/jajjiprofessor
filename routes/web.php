<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CommentsController;
use App\Http\Controllers\Admin\InfoController as AdminInfoController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\admin\TeachController;
use App\Http\Controllers\BazaController;
use App\Http\Controllers\admin\InfoController;
use App\Http\Controllers\Admin\ShowController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\articleController;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\PeopleController;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Attributes\PostCondition;

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

Route::prefix('admin/')->middleware('auth')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    
    Route::resource('/infos', InfoController::class);
    Route::resource('/orders', OrderController::class);
    Route::resource('/shows', ShowController::class);
    Route::resource('/posts', PostController::class);
    Route::resource('/articles', articleController::class);
    Route::resource('/numbers', NumberController::class);
    Route::resource('/peoples', PeopleController::class);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
