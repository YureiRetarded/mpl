<?php

use App\Http\Controllers\Pages\AboutController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\UsersController;
use App\Http\Controllers\Private\Page\IndexController as AdminPanelIndexController;
use App\Http\Controllers\User\Information\Contact\IndexController as UserContactIndexController;
use App\Http\Controllers\User\Information\IndexController as UserInformationIndexController;
use App\Http\Controllers\User\Information\Contact\CreateController as UserInformationCreateController;
use App\Http\Controllers\User\Information\Contact\StoreController as UserInformationStoreController;
use App\Http\Controllers\User\Information\Contact\EditController as UserInformationEditController;
use App\Http\Controllers\User\Information\Contact\UpdateController as UserInformationUpdateController;
use App\Http\Controllers\User\Information\Contact\DestroyController as UserInformationDestroyController;
use App\Http\Controllers\User\News\CreateController as UserNewsCreateController;
use App\Http\Controllers\User\News\EditController as UserNewsEditController;
use App\Http\Controllers\User\News\IndexController as UserNewsIndexController;
use App\Http\Controllers\User\News\NewsProjectController as NewsProjectIndexController;
use App\Http\Controllers\User\News\ShowController as UserNewsShowController;
use App\Http\Controllers\User\News\StoreController as UserNewsStoreController;
use App\Http\Controllers\User\News\UpdateController as UserNewsUpdateController;
use App\Http\Controllers\User\News\DestroyController as UserNewsDestroyController;
use App\Http\Controllers\User\Project\CreateController as UserProjectCreateController;
use App\Http\Controllers\User\Project\EditController as UserProjectEditController;
use App\Http\Controllers\User\Project\IndexController as UserProjectIndexController;
use App\Http\Controllers\User\Project\ShowController as UserProjectShowController;
use App\Http\Controllers\User\Project\StoreController as UserProjectStoreController;
use App\Http\Controllers\User\Project\UpdateController as UserProjectUpdateController;
use App\Http\Controllers\User\Project\DestroyController as UserProjectDestroyController;
use Illuminate\Support\Facades\Auth;
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

//HomePage
Route::get('/', HomeController::class)->name('index');
Route::redirect('/home', '/');

//Auth
Auth::routes();

//Admin
Route::middleware('adminPanel')->group(function () {
    Route::get('/adminpanel', AdminPanelIndexController::class)->name('adminPanel');
});
//AnotherPages
Route::get('/about', AboutController::class)->name('aboutProject');


//Users
Route::prefix('user')->group(function () {
    Route::get('/', UsersController::class)->name('users');
    Route::prefix('{user}')->group(function () {
        Route::get('/', UserInformationIndexController::class);
        Route::prefix('contacts')->group(function (){
            Route::get('/', UserContactIndexController::class)->name('user.contact.index');
            Route::middleware('checkUser')->group(function () {
                Route::get('/create',UserInformationCreateController::class)->name('user.contact.create');
                Route::post('/',UserInformationStoreController::class)->name('user.contact.store');
                Route::prefix('{contact}')->group(function (){
                    Route::get('/edit',UserInformationEditController::class)->name('user.contact.edit');
                    Route::patch('/',UserInformationUpdateController::class)->name('user.contact.update');
                    Route::delete('/',UserInformationDestroyController::class)->name('user.contact.delete');
                });
            });
        });
        Route::get('/news', UserNewsIndexController::class)->name('user.news.index');
        Route::prefix('projects')->group(function () {
            Route::get('/', UserProjectIndexController::class)->name('user.project.index');
            Route::prefix('{project}')->group(function () {
                Route::get('/', UserProjectShowController::class)->name('user.project.show');
                Route::middleware('checkUser')->group(function () {
                    Route::get('/edit', UserProjectEditController::class)->name('user.project.edit');
                    Route::patch('/', UserProjectUpdateController::class)->name('user.project.update');
                    Route::delete('/',UserProjectDestroyController::class)->name('user.project.delete');
                });
                Route::prefix('news')->group(function () {
                    Route::get('/', NewsProjectIndexController::class)->name('user.project.news.index');
                    Route::get('/{news}', UserNewsShowController::class)->name('user.news.show');
                    Route::middleware('checkUser')->group(function () {
                        Route::prefix('{news}')->group(function (){
                            Route::get('/edit', UserNewsEditController::class)->name('user.news.edit');
                            Route::patch('/', UserNewsUpdateController::class)->name('user.news.update');
                            Route::delete('/',UserNewsDestroyController::class)->name('user.news.delete');
                        });
                    });
                });

            });

        });
        Route::middleware('checkUser')->group(function () {
            //Create pages
            Route::get('/create/project', UserProjectCreateController::class)->name('user.project.create');
            Route::get('/create/news', UserNewsCreateController::class)->name('user.news.create');
            // Store
            Route::post('/create/project', UserProjectStoreController::class)->name('user.project.store');
            Route::post('/create/news', UserNewsStoreController::class)->name('user.news.store');
        });
    });
});





