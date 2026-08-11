<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Post;

class FollowsController extends Controller
{
    /**
     * 自分がフォローしているユーザーと、その投稿を表示
     */
    public function followList(): View
{
    $followings = Auth::user()
        ->followings()
        ->with('followedUser')
        ->get();

    $followed_user_ids = $followings
        ->pluck('followed_id');

    $posts = \App\Models\Post::with('user')
        ->whereIn('user_id', $followed_user_ids)
        ->orderByDesc('created_at')
        ->get();

    return view(
    'follows.follow_list',
    compact('followings', 'posts')
    );
}

    /**
     * 自分をフォローしているユーザーと、その投稿を表示
     */
    public function followerList(): View
{
    $followers = Auth::user()
        ->followers()
        ->with('followingUser')
        ->get();

    $follower_user_ids = $followers->pluck('following_id');

    $posts = Post::with('user')
        ->whereIn('user_id', $follower_user_ids)
        ->orderByDesc('created_at')
        ->get();

    return view(
    'follows.follower_list',
    compact('followers', 'posts')
    );
    }
}
