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

    $users = User::query()
        // 自分自身は検索結果に表示しない
        ->where('id', '!=', Auth::id())

        // キーワードが入力されている場合だけ名前で絞り込む
        ->when($keyword !== '', function ($query) use ($keyword) {
            $query->where('username', 'like', '%' . $keyword . '%');
        })

        ->orderBy('username')
        ->get();

    return view('users.search', compact('users', 'keyword'));
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
    public function follow($id)
    {
        Follow::create([
            'following_id' => Auth::id(),
            'followed_id' => $id,
        ]);

        return redirect()->back();
    }

    // フォロー解除
    public function unfollow($id)
    {
        Follow::where('following_id', Auth::id())
              ->where('followed_id', $id)
              ->delete();

        return redirect()->back();
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
