<?php

use App\Http\Controllers\News\IndexController as NewsIndexController;
use App\Http\Controllers\News\ShowController as NewsShowController;
use App\Http\Controllers\Pages\AboutController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Private\About\ContactInformation\CreateController as PrivateContactInformationCreateController;
use App\Http\Controllers\Private\About\ContactInformation\EditController as PrivateContactInformationEditController;
use App\Http\Controllers\Private\About\ContactInformation\IndexController as PrivateContactInformationIndexController;
use App\Http\Controllers\Private\About\ContactInformation\ShowController as PrivateContactInformationShowController;
use App\Http\Controllers\Private\About\EditController as PrivateAboutEditController;
use App\Http\Controllers\Private\About\IndexController as PrivateAboutIndexController;
use App\Http\Controllers\Private\News\CreateController as PrivateNewsCreateController;
use App\Http\Controllers\Private\News\EditController as PrivateNewsEditController;
use App\Http\Controllers\Private\News\IndexController as PrivateNewsIndexController;
use App\Http\Controllers\Private\News\ShowController as PrivateNewsShowController;
use App\Http\Controllers\Private\Project\CreateController as PrivateProjectCreateController;
use App\Http\Controllers\Private\Project\EditController as PrivateProjectEditController;
use App\Http\Controllers\Private\Project\IndexController as PrivateProjectIndexController;
use App\Http\Controllers\Private\Project\ShowController as PrivateProjectShowController;
use App\Http\Controllers\Project\IndexController as ProjectIndexController;
use App\Http\Controllers\Project\ShowController as ProjectShowController;
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


//Public
//HomePage
Route::get('/', HomeController::class)->name('index');

//About me
Route::get('/about_me', AboutController::class)->name('about');

//News
Route::prefix('news')->group(function () {
    Route::get('/', NewsIndexController::class)->name('news.index');
    Route::get('/{news}', NewsShowController::class)->name('news.show');
});

//Projects
Route::prefix('projects')->group(function () {
    Route::get('/', ProjectIndexController::class)->name('project.index');
    Route::get('/{project}', ProjectShowController::class)->name('project.show');
});

//Private
Route::prefix('private')->group(function () {

    //News
    Route::prefix('news')->group(function () {
        Route::get('/', PrivateNewsIndexController::class)->name('private.news.index');
        Route::get('/create', PrivateNewsCreateController::class)->name('private.news.create');
        Route::get('/{news}', PrivateNewsShowController::class)->name('private.news.show');
        Route::get('/{news}/edit', PrivateNewsEditController::class)->name('private.news.edit');

    });
    //Projects
    Route::prefix('projects')->group(function () {
        Route::get('/', PrivateProjectIndexController::class)->name('private.projects.index');
        Route::get('/create', PrivateProjectCreateController::class)->name('private.projects.create');
        Route::get('/{project}', PrivateProjectShowController::class)->name('private.projects.show');
        Route::get('/{project}/edit', PrivateProjectEditController::class)->name('private.projects.edit');
    });
    //About
    Route::prefix('about')->group(function () {
        Route::get('/', PrivateAboutIndexController::class)->name('private.about.index');
        Route::get('/{id}/edit', PrivateAboutEditController::class)->name('private.about.edit');
    });
    //Contacts
    Route::prefix('contacts')->group(function () {
        Route::get('/', PrivateContactInformationIndexController::class)->name('private.contacts.index');
        Route::get('/create', PrivateContactInformationCreateController::class)->name('private.contacts.create');
        Route::get('/{contact}', PrivateContactInformationShowController::class)->name('private.contacts.show');
        Route::get('/{contact}/edit', PrivateContactInformationEditController::class)->name('private.contacts.edit');
    });

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
