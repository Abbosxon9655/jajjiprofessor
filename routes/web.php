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

Route::prefix('admin/')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Route::get('infos/index', [InfoController::class, 'index'])->name('infos.index');
    // Route::get('infos/create', [InfoController::class, 'create'])->name('infos.create');
    // Route::post('infos/store', [InfoController::class, 'store'])->name('infos.store');
    // Route::get('infos/show/{id}', [InfoController::class, 'show'])->name('infos.show');
    // Route::get('infos/edit/{id}', [InfoController::class, 'edit'])->name('infos.edit');
    // Route::put('infos/update/{id}', [InfoController::class, 'update'])->name('infos.update');
    // Route::delete('infos/destroy/{id}', [InfoController::class, 'destroy'])->name('infos.destroy');

    
    // Route::get('/posts/index', [PostController::class, 'index'])->name('posts.index');
    // Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    // Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    // Route::get('/posts/show/{id}', [PostController::class, 'show'])->name('posts.show');
    // Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    // Route::put('posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
    // Route::delete('posts/destroy/{id}', [PostController::class, 'destroy'])->name('posts.destroy');


    // Route::get('/orders/index', [OrderController::class, 'index'])->name('orders.index');
    // Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    // Route::post('orders/store', [OrderController::class, 'store'])->name('orders.store');
    // Route::get('/orders/show/{id}', [OrderController::class, 'show'])->name('orders.show');
    // Route::get('/orders/edit/{id}', [OrderController::class, 'edit'])->name('orders.edit');
    // Route::put('/orders/update/{id}', [OrderController::class, 'update'])->name('orders.update');
    // Route::delete('/orders/destroy/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');


    // Route::get('/teachs/index', [TeachController::class, 'index'])->name('teachs.index');
    // Route::get('/teachs/create', [TeachController::class, 'create'])->name('teachs.create');
    // Route::post('/teachs/store', [TeachController::class, 'store'])->name('teachs.store');
    // Route::get('/teachs/show/{id}', [TeachController::class, 'show'])->name('teachs.show');
    // Route::get('/teachs/edit/{id}', [TeachController::class, 'edit'])->name('teachs.edit');
    // Route::put('/teachs/update/{id}', [TeachController::class, 'update'])->name('teachs.update');
    // Route::delete('/teachs/destroy/{id}', [TeachController::class, 'destroy'])->name('teachs.destroy');


   
    
    Route::resource('/infos', InfoController::class);
    Route::resource('/orders', OrderController::class);
    Route::resource('/shows', ShowController::class);
    Route::resource('/posts', PostController::class);
    










    




});
