<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FollowsController;

/*
|--------------------------------------------------------------------------
| ログイン不要ルート（ログイン・新規登録）
|--------------------------------------------------------------------------
*/

// ログイン画面
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');


// 新規登録
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

// 登録完了
Route::get('/added', [RegisteredUserController::class, 'added']);

Route::get('/', function () {
    return Auth::check()
        ? redirect('/top')
        : redirect('/login');
});


/*
|--------------------------------------------------------------------------
| ログイン必須ルート（auth ミドルウェア）
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // トップページ
    Route::get('/top', [PostsController::class, 'index'])->name('top');

    // 投稿機能
    Route::post('/post/create', [PostsController::class, 'create']);
    Route::post('/post/update', [PostsController::class, 'update']);
    Route::post('/post/delete', [PostsController::class, 'delete']);

    // 相手ユーザーのプロフィール
    Route::get('/user/profile/{id}', [UsersController::class, 'profile']);

    // プロフィール編集
    Route::get('/profile/edit', [UsersController::class, 'edit']);
    Route::post('/profile/update', [UsersController::class, 'update']);

    // フォロー機能
    Route::post('/follow/{id}', [UsersController::class, 'follow']);
    Route::post('/unfollow/{id}', [UsersController::class, 'unfollow']);

    // フォローリスト
    Route::get('/follow-list', [FollowsController::class, 'followList']);

    // フォロワーリスト
    Route::get('/follower-list', [FollowsController::class, 'followerList']);

    // ユーザー検索（GET）
    Route::get('/search', [UsersController::class, 'search'])
    ->name('users.search');
});
