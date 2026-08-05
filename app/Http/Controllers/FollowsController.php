<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FollowsController extends Controller
{
    public function followList()
    {
        $user = Auth::user();

        // 自分がフォローしているユーザー一覧
        $followings = $user->followings()->with('followedUser')->get();

        // Blade に渡す変数名を followings に統一
        return view('follows.followList', compact('followings'));
    }

    public function followerList()
    {
        $user = Auth::user();

        // 自分をフォローしているユーザー一覧
        $followers = $user->followers()->with('followingUser')->get();

        // Blade に渡す変数名を followers に統一
        return view('follows.followerList', compact('followers'));
    }
}
