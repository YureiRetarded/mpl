<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Pages\AboutController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\NewsPageController;
use App\Http\Controllers\Pages\ProjectsPageController;
use App\Http\Controllers\Pages\UsersController;
use App\Http\Controllers\Private\News\DestroyController as AdminDestroyNewsController;
use App\Http\Controllers\Private\News\IndexController as AdminIndexNewsController;
use App\Http\Controllers\Private\Page\IndexController as AdminPanelIndexController;
use App\Http\Controllers\Private\Project\DestroyController as AdminDestroyProjectController;
use App\Http\Controllers\Private\Project\IndexController as AdminIndexProjectController;
use App\Http\Controllers\Private\Role\CreateController as AdminCreateRoleController;
use App\Http\Controllers\Private\Role\DestroyController as AdminDestroyRoleController;
use App\Http\Controllers\Private\Role\EditController as AdminEditRoleController;
use App\Http\Controllers\Private\Role\IndexController as AdminIndexRoleController;
use App\Http\Controllers\Private\Role\StoreController as AdminStoreRoleController;
use App\Http\Controllers\Private\Role\UpdateController as AdminUpdateRoleController;
use App\Http\Controllers\Private\Status\CreateController as AdminCreateStatusController;
use App\Http\Controllers\Private\Status\DestroyController as AdminDestroyStatusController;
use App\Http\Controllers\Private\Status\EditController as AdminEditStatusController;
use App\Http\Controllers\Private\Status\IndexController as AdminIndexStatusController;
use App\Http\Controllers\Private\Status\StoreController as AdminStoreStatusController;
use App\Http\Controllers\Private\Status\UpdateController as AdminUpdateStatusController;
use App\Http\Controllers\Private\Tag\CreateController as AdminCreateTagController;
use App\Http\Controllers\Private\Tag\DestroyController as AdminDestroyTagController;
use App\Http\Controllers\Private\Tag\EditController as AdminEditTagController;
use App\Http\Controllers\Private\Tag\IndexController as AdminIndexTagController;
use App\Http\Controllers\Private\Tag\StoreController as AdminStoreTagController;
use App\Http\Controllers\Private\Tag\UpdateController as AdminUpdateTagController;
use App\Http\Controllers\Private\User\EditController as AdminEditUserController;
use App\Http\Controllers\Private\User\IndexController as AdminIndexUserController;
use App\Http\Controllers\Private\User\UpdateController as AdminUpdateUserController;
use App\Http\Controllers\User\Information\Contact\CreateController as UserInformationCreateController;
use App\Http\Controllers\User\Information\Contact\DestroyController as UserInformationDestroyController;
use App\Http\Controllers\User\Information\Contact\EditController as UserInformationEditController;
use App\Http\Controllers\User\Information\Contact\IndexController as UserContactIndexController;
use App\Http\Controllers\User\Information\Contact\StoreController as UserInformationStoreController;
use App\Http\Controllers\User\Information\Contact\UpdateController as UserInformationUpdateController;
use App\Http\Controllers\User\Information\IndexController as UserInformationIndexController;
use App\Http\Controllers\User\News\CreateController as UserNewsCreateController;
use App\Http\Controllers\User\News\DestroyController as UserNewsDestroyController;
use App\Http\Controllers\User\News\EditController as UserNewsEditController;
use App\Http\Controllers\User\News\IndexController as UserNewsIndexController;
use App\Http\Controllers\User\News\NewsProjectController as NewsProjectIndexController;
use App\Http\Controllers\User\News\ShowController as UserNewsShowController;
use App\Http\Controllers\User\News\StoreController as UserNewsStoreController;
use App\Http\Controllers\User\News\UpdateController as UserNewsUpdateController;
use App\Http\Controllers\User\Project\CreateController as UserProjectCreateController;
use App\Http\Controllers\User\Project\DestroyController as UserProjectDestroyController;
use App\Http\Controllers\User\Project\EditController as UserProjectEditController;
use App\Http\Controllers\User\Project\IndexController as UserProjectIndexController;
use App\Http\Controllers\User\Project\ShowController as UserProjectShowController;
use App\Http\Controllers\User\Project\StoreController as UserProjectStoreController;
use App\Http\Controllers\User\Project\UpdateController as UserProjectUpdateController;
use App\Http\Controllers\User\Setting\IndexController as UserSettingIndexController;
use App\Http\Controllers\User\Setting\UpdateAboutController as UserUpdateAboutController;
use App\Http\Controllers\User\Setting\UpdateEmailController as UserUpdateEmailController;
use App\Http\Controllers\User\Setting\UpdateNameController as UserUpdateNameController;
use App\Http\Controllers\User\Setting\UpdatePasswordController as UserUpdatePasswordController;
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

//Auth
Auth::routes();
Route::post('/logout', LogoutController::class)->name('logout');

//Setting
Route::middleware('auth')->group(function () {

    Route::prefix('setting')->group(function () {
        Route::get('/', UserSettingIndexController::class)->name('user.setting');
        Route::post('/about', UserUpdateAboutController::class)->name('user.updateAbout');
        Route::post('/email', UserUpdateEmailController::class)->name('user.updateEmail');
        Route::post('/name', UserUpdateNameController::class)->name('user.updateName');
        Route::post('/password', UserUpdatePasswordController::class)->name('user.updatePassword');
    });
});
//Admin
Route::middleware('adminPanel')->group(function () {
    Route::prefix('adminpanel')->group(function () {
        Route::get('/', AdminPanelIndexController::class)->name('adminPanel');

        //Users
        Route::prefix('users')->group(function () {
            Route::get('/', AdminIndexUserController::class)->name('admin.users');
            Route::prefix('{user}')->group(function () {
                Route::get('/edit', AdminEditUserController::class)->name('admin.user.edit');
                Route::patch('/', AdminUpdateUserController::class)->name('admin.user.update');
            });
        });

        //Tags
        Route::prefix('tags')->group(function () {
            Route::get('/', AdminIndexTagController::class)->name('admin.tags');
            Route::get('/create', AdminCreateTagController::class)->name('admin.tag.create');
            Route::post('/', AdminStoreTagController::class)->name('admin.tag.store');
            Route::prefix('{tag}')->group(function () {
                Route::get('/edit', AdminEditTagController::class)->name('admin.tag.edit');
                Route::patch('/', AdminUpdateTagController::class)->name('admin.tag.update');
                Route::delete('/', AdminDestroyTagController::class)->name('admin.tag.delete');
            });
        });

        //Roles
        Route::prefix('roles')->group(function () {
            Route::get('/', AdminIndexRoleController::class)->name('admin.roles');
            Route::get('/create', AdminCreateRoleController::class)->name('admin.role.create');
            Route::post('/', AdminStoreRoleController::class)->name('admin.role.store');
            Route::prefix('{role}')->group(function () {
                Route::get('/edit', AdminEditRoleController::class)->name('admin.role.edit');
                Route::patch('/', AdminUpdateRoleController::class)->name('admin.role.update');
                Route::delete('/', AdminDestroyRoleController::class)->name('admin.role.delete');
            });
        });
        //Statuses
        Route::prefix('statuses')->group(function () {
            Route::get('/', AdminIndexStatusController::class)->name('admin.statuses');
            Route::get('/create', AdminCreateStatusController::class)->name('admin.status.create');
            Route::post('/', AdminStoreStatusController::class)->name('admin.status.store');
            Route::prefix('{status}')->group(function () {
                Route::get('/edit', AdminEditStatusController::class)->name('admin.status.edit');
                Route::patch('/', AdminUpdateStatusController::class)->name('admin.status.update');
                Route::delete('/', AdminDestroyStatusController::class)->name('admin.status.delete');
            });
        });

        //News
        Route::prefix('news')->group(function () {
            Route::get('/', AdminIndexNewsController::class)->name('admin.news');
            Route::delete('/{news}', AdminDestroyNewsController::class)->name('admin.news.delete');
        });

        //Projects
        Route::prefix('projects')->group(function () {
            Route::get('/', AdminIndexProjectController::class)->name('admin.projects');
            Route::delete('/{project}', AdminDestroyProjectController::class)->name('admin.project.delete');
        });
    });
});
//AnotherPages
Route::get('/about', AboutController::class)->name('aboutProject');


//Projects
Route::get('/projects', ProjectsPageController::class)->name('projects');
//News
Route::get('/news', NewsPageController::class)->name('news');


//Data with users
Route::prefix('users')->group(function () {
    Route::get('/', UsersController::class)->name('users');
    Route::prefix('{user}')->group(function () {
        Route::get('/', UserInformationIndexController::class)->name('user.index');
        Route::prefix('contacts')->group(function () {
            Route::get('/', UserContactIndexController::class)->name('user.contact.index');
            Route::middleware('checkUser')->group(function () {
                Route::get('/create', UserInformationCreateController::class)->name('user.contact.create');
                Route::post('/', UserInformationStoreController::class)->name('user.contact.store');
                Route::prefix('{contact}')->group(function () {
                    Route::get('/edit', UserInformationEditController::class)->name('user.contact.edit');
                    Route::patch('/', UserInformationUpdateController::class)->name('user.contact.update');
                    Route::delete('/', UserInformationDestroyController::class)->name('user.contact.delete');
                });
            });
        });
        Route::get('/news', UserNewsIndexController::class)->name('user.news.index');
        Route::prefix('projects')->group(function () {
            Route::get('/', UserProjectIndexController::class)->name('user.project.index');
            Route::prefix('{project}')->group(function () {
                Route::get('/', UserProjectShowController::class)->name('user.project.show');
                Route::get('/news', NewsProjectIndexController::class)->name('user.project.news.index');
                Route::middleware('checkUser')->group(function () {
                    Route::get('/edit', UserProjectEditController::class)->name('user.project.edit');
                    Route::patch('/', UserProjectUpdateController::class)->name('user.project.update');
                    Route::delete('/', UserProjectDestroyController::class)->name('user.project.delete');
                });
                Route::prefix('news')->group(function () {
                    Route::get('/{news}', UserNewsShowController::class)->name('user.news.show');
                    Route::middleware('checkUser')->group(function () {
                        Route::prefix('{news}')->group(function () {
                            Route::get('/edit', UserNewsEditController::class)->name('user.news.edit');
                            Route::patch('/', UserNewsUpdateController::class)->name('user.news.update');
                            Route::delete('/', UserNewsDestroyController::class)->name('user.news.delete');
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





