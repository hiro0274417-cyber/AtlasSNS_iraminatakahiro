<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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

    $followedUserIds = $followings
        ->pluck('followed_id');

    $posts = Post::with('user')
        ->whereIn('user_id', $followedUserIds)
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

    $followerUserIds = $followers->pluck('following_id');

    $posts = Post::with('user')
        ->whereIn('user_id', $followerUserIds)
        ->orderByDesc('created_at')
        ->get();

        return view(
            'follows.follower_list',
            compact('followers', 'posts')
        );
    }
}
