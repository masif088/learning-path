<?php

use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\LearningPathController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Jetstream;


use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController;
use Laravel\Jetstream\Http\Controllers\Livewire\TeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
//use Laravel\Jetstream\Jetstream;
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

Route::get('/sometings',function (){
   return view('example.form');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect(route('admin.dashboard'));
})->name('dashboard');

Route::name('admin.')->prefix('admin')->middleware(['auth:sanctum','web', 'verified'])->group(function() {
    Route::view('/dashboard', "dashboard")->name('dashboard');

    Route::middleware(['checkTeam:admin'])->group(function() {
        Route::get('learning-path',[LearningPathController::class,'index'])->name('lp.index');
        Route::get('learning-path/create',[LearningPathController::class,'create'])->name('lp.create');
        Route::get('learning-path/{id}/edit',[LearningPathController::class,'create'])->name('lp.edit');

    });

    Route::middleware(['checkTeam:admin,editor'])->group(function() {
//        Route::resource('module', ModuleController::class);
        Route::get('{slug}/module',[ModuleController::class,'index'])->name('module.index');
        Route::get('{slug}/module/create',[ModuleController::class,'create'])->name('module.create');
        Route::get('{slug}/module/{id}/edit',[ModuleController::class,'edit'])->name('module.edit');

        Route::resource('announcement', AnnouncementController::class);
    });

    Route::middleware(['checkTeam:admin,editor,client'])->group(function() {
//        Route::resource('module', ModuleController::class);
    });


//    Route::get('/user', [UserController::class, "index"])->name('user');
//    Route::view('/user/create', "pages.user.create")->name('user.create');
//    Route::view('/user/edit/{userId}', "pages.user.edit")->name('user.edit');

    Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {
        Route::group(['middleware' => ['auth', 'verified']], function () {
            // User & Profile...
            Route::get('/user/profile', [UserProfileController::class, 'show'])
                ->name('profile.show');

            // API...
            if (Jetstream::hasApiFeatures()) {
                Route::get('/user/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
            }

            // Teams...
            if (Jetstream::hasTeamFeatures()) {
                Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
                Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
                Route::put('/current-team', [CurrentTeamController::class, 'update'])->name('current-team.update');
            }
        });
    });


//    Route::resource('tag',TagController::class)->only(['index','create','edit']);
//    Route::resource('blog',BlogController::class)->only(['index','create','edit']);
//    Route::resource('faq',FaqController::class)->only(['index','create','edit']);
//    Route::resource('headline',HeadlineController::class)->only(['index','create','edit']);
//    Route::resource('user',UserController::class)->only(['index','create','edit']);
//    Route::resource('event',EventController::class)->only(['index','create','edit']);
//    Route::resource('news',NewController::class)->only(['index','create','edit']);

});
