<?php

namespace App\Http\Controllers;

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
            ->with([
                'followedUser.posts' => function ($query) {
                    $query->orderByDesc('created_at');
                },
            ])
            ->get();

        return view(
            'follows.followList',
            compact('followings')
        );
    }

    /**
     * 自分をフォローしているユーザーと、その投稿を表示
     */
    public function followerList(): View
    {
        $followers = Auth::user()
            ->followers()
            ->with([
                'followingUser.posts' => function ($query) {
                    $query->orderByDesc('created_at');
                },
            ])
            ->get();

        return view(
            'follows.followerList',
            compact('followers')
        );
    }
}
