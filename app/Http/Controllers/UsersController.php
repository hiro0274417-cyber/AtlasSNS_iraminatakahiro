<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;

class UsersController extends Controller
{

/**
 * ユーザー検索画面を表示
 */
public function search(Request $request)
{
    $keyword = trim((string) $request->query('keyword', ''));

    // ログインユーザーが現在フォローしているユーザーID
    $followingUserIds = Follow::where('following_id', Auth::id())
        ->pluck('followed_id')
        ->toArray();

    $users = User::query()
        // 自分自身は表示しない
        ->where('id', '!=', Auth::id())

        // キーワードがある場合だけ部分一致検索
        ->when($keyword !== '', function ($query) use ($keyword) {
            $query->where('username', 'like', '%' . $keyword . '%');
        })

        ->orderBy('username')
        ->get();

    return view(
        'users.search',
        compact('users', 'keyword', 'followingUserIds')
    );
}

    // 相手ユーザーのプロフィールページ
    public function profile($id)
    {
        $loginUser = Auth::user();                 // ログインユーザー
        $target = User::with('posts')->find($id);  // 相手ユーザー

        // 自分がフォローしているか判定
        $isFollow = $loginUser->followings()
                              ->where('followed_id', $id)
                              ->exists();

        return view('users.profile', compact('target', 'isFollow'));
    }

    // フォロー
    /**
 * ユーザーをフォロー
 */
public function follow($id)
{
    $targetUserId = (int) $id;
    $loginUserId = Auth::id();

    // 自分自身はフォローできない
    if ($targetUserId === $loginUserId) {
        abort(403);
    }

    // 存在しないユーザーなら404
    User::findOrFail($targetUserId);

    // 同じフォローがなければ作成
    Follow::firstOrCreate([
        'following_id' => $loginUserId,
        'followed_id' => $targetUserId,
    ]);

    return redirect()
        ->back()
        ->with('success', 'フォローしました。');
}

    // * フォローを解除 */
public function unfollow($id)
{
    $targetUserId = (int) $id;

    Follow::where('following_id', Auth::id())
        ->where('followed_id', $targetUserId)
        ->delete();

    return redirect()
        ->back()
        ->with('success', 'フォローを解除しました。');
}

    // プロフィール編集ページ
    public function edit()
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    // プロフィール更新処理
public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'username' => 'required|max:50',
        'email' => 'required|email',
    ]);

    // 基本項目
    $user->username = $request->username;
    $user->email = $request->email;

    // 自己紹介文
    $user->bio = $request->bio;

    // 画像アップロード
    if ($request->hasFile('images')) {
        $path = $request->file('images')->store('public/images');
        $user->images = str_replace('public/', '/storage/', $path);
    }

    // 保存
    $user->save();

    return redirect('/user/profile/' . $user->id);
}



}
