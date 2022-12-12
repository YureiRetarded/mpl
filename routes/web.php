<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ResetPassword\GetPageController;
use App\Http\Controllers\Auth\ResetPassword\GetPageResetController;
use App\Http\Controllers\Auth\ResetPassword\GetPageResetTokenController;
use App\Http\Controllers\Auth\ResetPassword\GetPageTokenController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Pages\AboutController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\PostsPageController;
use App\Http\Controllers\Pages\ProjectsPageController;
use App\Http\Controllers\Pages\UsersController;
use App\Http\Controllers\Private\Page\IndexController as AdminPanelIndexController;
use App\Http\Controllers\Private\Post\DestroyController as AdminDestroyPostController;
use App\Http\Controllers\Private\Post\IndexController as AdminIndexPostController;
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
use App\Http\Controllers\User\Post\CreateController as UserPostCreateController;
use App\Http\Controllers\User\Post\DestroyController as UserPostDestroyController;
use App\Http\Controllers\User\Post\EditController as UserPostEditController;
use App\Http\Controllers\User\Post\IndexController as UserPostIndexController;
use App\Http\Controllers\User\Post\PostsProjectController as PostProjectIndexController;
use App\Http\Controllers\User\Post\ShowController as UserPostShowController;
use App\Http\Controllers\User\Post\StoreController as UserPostStoreController;
use App\Http\Controllers\User\Post\UpdateController as UserPostUpdateController;
use App\Http\Controllers\User\Project\CreateController as UserProjectCreateController;
use App\Http\Controllers\User\Project\DestroyController as UserProjectDestroyController;
use App\Http\Controllers\User\Project\EditController as UserProjectEditController;
use App\Http\Controllers\User\Project\IndexController as UserProjectIndexController;
use App\Http\Controllers\User\Project\ShowController as UserProjectShowController;
use App\Http\Controllers\User\Project\StoreController as UserProjectStoreController;
use App\Http\Controllers\User\Project\UpdateController as UserProjectUpdateController;
use App\Http\Controllers\User\Setting\IndexController as UserSettingIndexController;
use App\Http\Controllers\User\Setting\UpdateAboutController as UserUpdateAboutController;
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
//Language change
Route::get('lang/{lang}', LanguageController::class)->name('lang.switch');
//Auth
//Basic auth routes config
Auth::routes(
    [
        'verify' => true,
        'confirm' => false,
        'email' => false,
        'reset' => false
    ]
);

Route::get('/forgot-password', GetPageController::class)->middleware('guest')->name('password.request');
Route::post('/forgot-password', GetPageTokenController::class)->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', GetPageResetController::class)->middleware('guest')->name('password.reset');
Route::post('/reset-password', GetPageResetTokenController::class)->middleware('guest')->name('password.update');

//Log out
Route::post('/logout', LogoutController::class)->name('logout');

//Setting
Route::middleware('auth')->group(function () {

    Route::prefix('setting')->group(function () {
        Route::get('/', UserSettingIndexController::class)->name('user.setting');
        Route::post('/about', UserUpdateAboutController::class)->name('user.updateAbout');
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

        //Posts
        Route::prefix('posts')->group(function () {
            Route::get('/', AdminIndexPostController::class)->name('admin.posts');
            Route::delete('/{post}', AdminDestroyPostController::class)->name('admin.post.delete');
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
//Posts
Route::get('/posts', PostsPageController::class)->name('posts');


//Data with users
Route::prefix('users')->group(function () {
    Route::get('/', UsersController::class)->name('users');
    Route::prefix('{user}')->group(function () {
        Route::get('/', UserInformationIndexController::class)->name('user.index');
        Route::prefix('contacts')->group(function () {
            Route::get('/', UserContactIndexController::class)->name('user.contact.index');
            Route::middleware('checkUser')->group(function () {
                Route::middleware('verified')->group(function () {
                    Route::get('/create', UserInformationCreateController::class)->name('user.contact.create');
                    Route::post('/', UserInformationStoreController::class)->name('user.contact.store');
                    Route::prefix('{contact}')->group(function () {
                        Route::get('/edit', UserInformationEditController::class)->name('user.contact.edit');
                        Route::patch('/', UserInformationUpdateController::class)->name('user.contact.update');
                        Route::delete('/', UserInformationDestroyController::class)->name('user.contact.delete');
                    });
                });
            });
        });
        Route::get('/posts', UserPostIndexController::class)->name('user.posts.index');
        Route::prefix('projects')->group(function () {
            Route::get('/', UserProjectIndexController::class)->name('user.project.index');
            Route::prefix('{project}')->group(function () {
                Route::get('/', UserProjectShowController::class)->name('user.project.show');
                Route::get('/posts', PostProjectIndexController::class)->name('user.project.posts.index');
                Route::middleware('checkUser')->group(function () {
                    Route::middleware('verified')->group(function () {
                        Route::get('/edit', UserProjectEditController::class)->name('user.project.edit');
                        Route::patch('/', UserProjectUpdateController::class)->name('user.project.update');
                        Route::delete('/', UserProjectDestroyController::class)->name('user.project.delete');
                    });
                });
                Route::prefix('posts')->group(function () {
                    Route::get('/{post}', UserPostShowController::class)->name('user.post.show');
                    Route::middleware('checkUser')->group(function () {
                        Route::middleware('verified')->group(function () {
                            Route::prefix('{post}')->group(function () {
                                Route::get('/edit', UserPostEditController::class)->name('user.post.edit');
                                Route::patch('/', UserPostUpdateController::class)->name('user.post.update');
                                Route::delete('/', UserPostDestroyController::class)->name('user.post.delete');
                            });
                        });
                    });
                });

            });

        });
        //Create pages
        Route::middleware('checkUser')->group(function () {
            Route::middleware('verified')->group(function () {
                Route::get('/create/project', UserProjectCreateController::class)->name('user.project.create');
                Route::get('/create/post', UserPostCreateController::class)->name('user.post.create');
                // Store
                Route::post('/create/project', UserProjectStoreController::class)->name('user.project.store');
                Route::post('/create/post', UserPostStoreController::class)->name('user.post.store');
            });
        });
    });
});





