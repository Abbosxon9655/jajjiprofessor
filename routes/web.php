<?php

use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CommentsController;
use App\Http\Controllers\Admin\InfoController as AdminInfoController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\admin\TeacherController;
use App\Http\Controllers\BazaController;
use App\Http\Controllers\admin\InfoController;
use App\Http\Controllers\Admin\ShowController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\articleController;
use App\Http\Controllers\Admin\BladeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\NumberController;
use App\Http\Controllers\Admin\HumanController;
use App\Http\Controllers\Admin\NeighborhoodController;
use App\Http\Controllers\Admin\RegionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Compilers\BladeCompiler;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
     return redirect('/index');
});


Route::auto('/', SiteController::class);


// Route::post('/store', [BazaController::class, 'store'])->name('store');

Route::prefix('admin/')->middleware('auth')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    
    Route::resources([
        '/infos' => InfoController::class,
        '/orders' => OrderController::class,
        '/shows' => ShowController::class,
        '/posts' => PostController::class,
        '/articles' => articleController::class,
        '/teachers' => TeacherController::class,
        '/groups' => GroupController::class,
        '/comments' => CommentController::class,
        '/achievements' => AchievementController::class,

        '/numbers' => NumberController::class,
        '/humans' => HumanController::class,
        '/categories' => CategoryController::class,
        '/blades' => BladeController::class,
        '/regions' => RegionController::class,
        '/districts' => DistrictController::class,
        '/neighborhoods' => NeighborhoodController::class,
    ]);

  

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
