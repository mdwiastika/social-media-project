<?php

use App\Events\MessageCreated;
use App\Http\Controllers\Admin\BandingController as AdminBandingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\StoryController as AdminStoryController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\BandingController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

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

// Guest User Access
Route::group(['middleware' => 'guest'], function () {
    // login route
    Route::get('/form-login', [LoginController::class, 'index'])->name('login');
    Route::post('/form-login', [LoginController::class, 'store']);

    //register route
    Route::get('/form-register', [RegisterController::class, 'index']);
    Route::post('/form-register', [RegisterController::class, 'store']);
    Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
    Route::get('/auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);
});
// Auth User Access
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'is_user'], function () {
        Route::group(['middleware' => 'active_user'], function () {
            Route::post('/payment', [UserController::class, 'payment']);
            Route::get('/payment', function () {
                return redirect('/profile/' . auth()->user()->username);
            });
            Route::post('/coin/transaction', [PaymentController::class, 'store']);
            Route::post('/coin/send', [PaymentController::class, 'shareCoin']);
            Route::prefix('feed')->group(function () {
                Route::get('/', [PostController::class, 'index'])->middleware('auth');
                Route::post('/like', [LikeController::class, 'store'])->name('like.add');
                Route::post('/comment', [CommentController::class, 'store'])->name('comment.add');
            });
            Route::prefix('profile')->group(function () {
                Route::get('/{user}', [UserController::class, 'index'])->middleware('auth');
                Route::post('/follow/{user:username}', [FollowController::class, 'store'])->name('follow.store');
            });
            Route::prefix('story')->group(function () {
                Route::get('/create', [StoryController::class, 'create'])->middleware('auth');
                Route::post('/', [StoryController::class, 'store'])->middleware('auth');
            });
            Route::resource('/post', PostController::class)->middleware('auth');
            Route::resource('/', PostController::class)->middleware('auth');

            //User & post Search Route
            Route::resource('/user', UserController::class)->middleware('auth');
            Route::post('/user/search', [UserController::class, 'search'])->name('user.search');
            Route::get('/explore', [UserController::class, 'explore']);
            Route::get('/trending', [PostController::class, 'trending']);
        });
        Route::get('/uji-banding', [BandingController::class, 'index'])->name('uji-banding');
        Route::get('uji-banding/create', [BandingController::class, 'create']);
        Route::post('/uji-banding', [BandingController::class, 'store']);
        Route::resource('/product', ProductController::class);
    });
    // logout route
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Admin Route
    Route::group(['middleware' => 'is_admin'], function () {
        Route::prefix('admin')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::prefix('table')->group(function () {
                // Route users table && change users status
                Route::get('/users', [AdminUserController::class, 'index']);
                Route::post('/user/update-status/{user}', [AdminUserController::class, 'update'])->name('change-user-status');

                // Route posts table && change posts status
                Route::get('/posts', [AdminPostController::class, 'index']);
                Route::post('/post/update-status/{post}', [AdminPostController::class, 'update'])->name('change-post-status');

                // Route stories table && change stories status
                Route::get('/stories', [AdminStoryController::class, 'index']);
                Route::post('/story/update-status/{story}', [AdminStoryController::class, 'update'])->name('change-story-status');

                // Route bandings table && destroy bandings table
                Route::get('/bandings', [AdminBandingController::class, 'index']);
                Route::delete('/bandings/{id}', [AdminBandingController::class, 'destroy']);
            });
        });
    });
});
