<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Site\FriendController;
use App\Http\Controllers\Site\SearchController;
use App\Http\Controllers\Site\ProfileController;
use App\Http\Controllers\Site\SiteUserController;
use App\Http\Controllers\Admin\BlogMailController;
use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\RegisterController;
use App\Http\Controllers\Site\Blogs\BlogPostController;
use App\Http\Controllers\Site\Post\PostLikesController;
use App\Http\Controllers\Admin\Blogs\CategoryController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Site\Post\PostCommentsController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLogin;

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

Route::get('admin/', function () {
    return view('backend.dashboard.index');
})->middleware('auth.staff')->name('admin.dashboard');

Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => 'guest:staff'
    ],
    function () {
    // staff login
    Route::get('login', [AdminLogin::class, 'index'])->name('login.index');
    Route::post('login', [AdminLogin::class, 'auth'])->name('login.auth');
});

// admin routes
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth.staff']
], function () {
    Route::post('logout', [AdminLogin::class, 'logout'])->name('logout');
    Route::resource('staffs', StaffController::class);
    Route::resource('users', UserController::class);
    Route::post('users/{user}/status', [UserController::class, 'changeAccountStatus'])->name('users.status');
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
    Route::patch('posts/{post}/status', [App\Http\Controllers\Admin\PostController::class, 'changePostStatus'])->name('posts.status');
    Route::get('posts/{post}/likes', [App\Http\Controllers\Admin\Post\LikeController::class, 'index'])->name('posts.likes.index');
    Route::get('posts/{post}/comments', [App\Http\Controllers\Admin\Post\CommentController::class, 'index'])->name('posts.comments.index');
    Route::patch('posts/{post}/comments/{comment}/status', [App\Http\Controllers\Admin\Post\CommentController::class, 'changeCommentStatus'])->name('posts.comments.status');
    Route::get('friends', [App\Http\Controllers\Admin\FriendController::class, 'accepted'])->name('friends.accepted');
    Route::get('friends/pending', [App\Http\Controllers\Admin\FriendController::class, 'pending'])->name('friends.pending');
    Route::get('blogs/request', [App\Http\Controllers\Admin\BlogController::class, 'request'])->name('blogs.request');
    Route::put('blogs/{blog}/request/accept', [App\Http\Controllers\Admin\BlogController::class, 'accept'])->name('blogs.request.accept');
    Route::put('blogs/{blog}/request/reject', [App\Http\Controllers\Admin\BlogController::class, 'reject'])->name('blogs.request.reject');
    Route::resource('blogs/categories', CategoryController::class);
});

// site routes -----  

Route::middleware(['guest'])->group(function () {
    // site register
    Route::get('/register', [RegisterController::class, 'index'])->name('site.register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('site.register.store');

    // site login
    Route::get('/login', [LoginController::class, 'index'])->name('site.login.index');
    Route::post('/login', [LoginController::class, 'auth'])->name('site.login.auth');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('site.logout');

// verification

Route::prefix('email/verify')->group(function () {
    Route::get('/', [EmailVerificationController::class, 'verify'])->name('verification.verify');
    Route::get('notice', [EmailVerificationController::class, 'notice'])->name('verification.notice');
    Route::get('resend', [EmailVerificationController::class, 'resend'])->name('verification.resend');
    Route::get('sent', [EmailVerificationController::class, 'sent'])->name('verification.sent');
    Route::get('success', [EmailVerificationController::class, 'success'])->name('verification.success');
});

// site routes
Route::group([
    'as' => 'site.',
    'middleware' => ['auth', 'verified']
], function () {
    Route::resource('/', HomeController::class);
    Route::resource('/posts', PostController::class);
    Route::post('posts/{post}/like', [PostLikesController::class, 'like'])->name('post.like');
    Route::post('posts/{post}/comment', [PostCommentsController::class, 'comment'])->name('post.comment');
    Route::patch('posts/{post}/comment/{comment}', [PostCommentsController::class, 'update'])->name('post.comment.update');
    Route::delete('posts/{post}/comment/{comment}', [PostCommentsController::class, 'destroy'])->name('post.comment.delete');

    // user all route
    Route::post('users/random', [SiteUserController::class, 'randomUser'])->name('user.random');

    // friend all route
    Route::post('users/{user}/add', [FriendController::class, 'addUser'])->name('friend.add');
    Route::get('friends', [FriendController::class, 'index'])->name('friend.index');
    Route::get('friends/{user}/details', [FriendController::class, 'show'])->name('friend.details');
    Route::delete('friends/{user}/unfriend', [FriendController::class, 'unfriend'])->name('friend.unfriend');
    Route::delete('friends/{user}/cancel', [FriendController::class, 'cancel'])->name('friend.cancel');
    Route::post('friends/{user}/confirm', [FriendController::class, 'confirmRequest'])->name('friend.confirm');
    Route::delete('friends/{user}/cancel_request', [FriendController::class, 'cancelRequest'])->name('friend.cancel_request');

    // search route
    Route::get('search', [SearchController::class, 'index'])->name('search.index');
    
    // username route
    Route::get('profile/{user}', [ProfileController::class, 'viewProfile'])->name('profile.index');
    Route::get('profile/{user}/setting', [ProfileController::class, 'viewSetting'])->name('profile.setting');
    Route::patch('profile/{user}', [ProfileController::class, 'update'])->name('profile.edit');
    Route::put('profile/{user}/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::post('profile/{user}/upload', [ProfileController::class, 'upload'])->name('profile.upload');

    // blogs route
    Route::get('blogs', [BlogController::class, 'index'])->name('blog.index');
    Route::get('blogs/request', [BlogController::class, 'request'])->name('blog.request');
    Route::post('blogs/request', [BlogController::class, 'request_store'])->name('blog.request.store');
    Route::get('blogs/{blog:slug}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::patch('blogs/{blog}/update', [BlogController::class, 'update'])->name('blog.update');

    Route::get('blogs/accept/mail/check', [BlogMailController::class, 'verify'])->name('blogs.accept.verify');

    Route::get('blogs/{blog:slug}/post/create', [BlogPostController::class, 'create'])->name('blog.post.create');
    Route::post('blogs/{blog:slug}/post/store', [BlogPostController::class, 'store'])->name('blog.post.store');

    Route::get('blogs/{blog:slug}/post/{slug}/edit', [BlogPostController::class, 'edit'])->name('blog.post.edit');
    Route::put('blogs/{blog:slug}/post/{slug}/update', [BlogPostController::class, 'update'])->name('blog.post.update');
    Route::delete('blogs/{blog:slug}/post/{slug}/delete', [BlogPostController::class, 'destroy'])->name('blog.post.delete');
    Route::get('blogs/{blog:slug}/post/{slug}/feature', [BlogPostController::class, 'feature'])->name('blog.post.feature');
});

Route::group([
    'as' => 'site.',
], function () {
    Route::get('blogs/{blog:slug}', [BlogController::class, 'details'])->name('blog.details');
    Route::get('blogs/{blog:slug}/posts/{slug}', [BlogPostController::class, 'details'])->name('blog.post.details');
    Route::get('blogs/{blog:slug}/author', [BlogController::class, 'author_details'])->name('blog.author_details');
});