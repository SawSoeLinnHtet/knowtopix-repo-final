<?php

use App\Http\Controllers\Site\Post\PostCommentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\RegisterController;
use App\Http\Controllers\Site\FriendController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\Post\PostLikesController;
use App\Http\Controllers\Site\PostController;
use App\Http\Controllers\Site\SiteUserController;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\Site\UserController as confirm;

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

Route::get('admin/dashboard', function () {
    return view('backend.dashboard.index');
})->middleware(['auth'])->name('admin.dashboard');

// admin routes
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::resource('staffs', StaffController::class);
    Route::resource('users', UserController::class);
});
// site register
Route::get('/register', [RegisterController::class, 'index'])->name('site.register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('site.register.store');

// site login
Route::get('/login', [LoginController::class, 'index'])->name('site.login.index');
Route::post('/login', [LoginController::class, 'auth'])->name('site.login.auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('site.logout');

// site routes
Route::group([
    'as' => 'site.',
    'middleware' => ['auth.check:web']
], function () {
    Route::resource('/', HomeController::class);
    Route::resource('/posts', PostController::class);
    Route::post('posts/{post}/like', [PostLikesController::class, 'like'])->name('post.like');
    Route::post('posts/{post}/comment', [PostCommentsController::class, 'comment'])->name('post.comment');

    // user all route
    Route::post('users/random', [SiteUserController::class, 'randomUser'])->name('user.random');

    // friend all route
    Route::post('users/{user}/add', [FriendController::class, 'addUser'])->name('friend.add');
    Route::get('friends', [FriendController::class, 'index'])->name('friend.index');
    Route::post('friends/{id}/confirm', [FriendController::class, 'confirmRequest'])->name('friend.confirm');
});