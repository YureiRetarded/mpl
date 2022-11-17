<?php

use App\Http\Controllers\Pages\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Information\IndexController as UserInformationIndexController;
use App\Http\Controllers\User\Information\Contact\IndexController as UserContactIndexController;
use App\Http\Controllers\User\Project\IndexController as UserProjectIndexController;
use App\Http\Controllers\User\News\IndexController as UserNewsIndexController;
use App\Http\Controllers\User\Project\ShowController as UserProjectShowController;
use App\Http\Controllers\User\News\ShowController as UserNewsShowController;

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
use App\Http\Controllers\Private\Page\IndexController as AdminPanelIndexController;
use App\Http\Controllers\Private\Project\CreateController as PrivateProjectCreateController;
use App\Http\Controllers\Private\Project\EditController as PrivateProjectEditController;
use App\Http\Controllers\Private\Project\IndexController as PrivateProjectIndexController;
use App\Http\Controllers\Private\Project\ShowController as PrivateProjectShowController;
use App\Http\Controllers\Project\IndexController as ProjectIndexController;
use App\Http\Controllers\Project\ShowController as ProjectShowController;




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
    Route::get('admin/adminpanel', AdminPanelIndexController::class)->name('adminPanel');
});
//AnotherPages
Route::get('/about', AboutController::class)->name('aboutProject');


//Users
Route::prefix('user')->group(function (){
    Route::get('/',UsersController::class)->name('users');
    Route::prefix('{user}')->group(function () {
        //Indexes pages
        Route::get('/', UserInformationIndexController::class);
        Route::get('/contacts',UserContactIndexController::class)->name('user.contact.index');
        Route::get('/projects', UserProjectIndexController::class)->name('user.project.index');
        Route::get('/news',UserNewsIndexController::class)->name('user.news.index');

        //Show pages
        Route::get('/projects/{project}', UserProjectShowController::class)->name('user.project.show');
        Route::get('/news/{news}',UserNewsShowController::class)->name('user.news.show');
    });
});


//ПЕРЕРАБОТАТЬ всё снизу

//Private
//Route::prefix('private')->group(function () {
//
//    //News
//    Route::prefix('news')->group(function () {
//        Route::get('/', PrivateNewsIndexController::class)->name('private.news.index');
//        Route::get('/create', PrivateNewsCreateController::class)->name('private.news.create');
//        Route::get('/{news}', PrivateNewsShowController::class)->name('private.news.show');
//        Route::get('/{news}/edit', PrivateNewsEditController::class)->name('private.news.edit');
//
//    });
//    //Projects
//    Route::prefix('projects')->group(function () {
//        Route::get('/', PrivateProjectIndexController::class)->name('private.projects.index');
//        Route::get('/create', PrivateProjectCreateController::class)->name('private.projects.create');
//        Route::get('/{project}', PrivateProjectShowController::class)->name('private.projects.show');
//        Route::get('/{project}/edit', PrivateProjectEditController::class)->name('private.projects.edit');
//    });
//    //About
//    Route::prefix('about')->group(function () {
//        Route::get('/', PrivateAboutIndexController::class)->name('private.about.index');
//        Route::get('/{id}/edit', PrivateAboutEditController::class)->name('private.about.edit');
//    });
//    //Contacts
//    Route::prefix('contacts')->group(function () {
//        Route::get('/', PrivateContactInformationIndexController::class)->name('private.contacts.index');
//        Route::get('/create', PrivateContactInformationCreateController::class)->name('private.contacts.create');
//        Route::get('/{contact}', PrivateContactInformationShowController::class)->name('private.contacts.show');
//        Route::get('/{contact}/edit', PrivateContactInformationEditController::class)->name('private.contacts.edit');
//    });
//
//});





