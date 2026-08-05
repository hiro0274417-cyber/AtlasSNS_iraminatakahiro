<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostsController extends Controller
{
    // ⑤ 投稿一覧（自分＋フォローしているユーザー）
    public function index()
    {
        $user = Auth::user();

        $followIds = $user->followings()->pluck('followed_id');

        $posts = Post::with('user')
            ->whereIn('user_id', $followIds->push($user->id))
            ->orderBy('created_at', 'desc')
            ->get();

        return view('top', compact('posts'));
    }

    // ② 投稿をDBに保存する処理
    public function create(Request $request)
    {
        $request->validate([
            'post' => 'required|string|min:1|max:150',
        ],[
            'post.required' => '投稿内容を入力してください。',
            'post.min' => '1文字以上で入力してください。',
            'post.max' => '150文字以内で入力してください。',
        ]);

        Post::create([
            'user_id' => Auth::id(),
            'post'    => $request->post,
        ]);

        return redirect('/top');
    }

    // ③ 編集処理
    public function update(Request $request)
    {
        $request->validate([
            'post' => 'required|string|min:1|max:150',
        ],[
            'post.required' => '投稿内容を入力してください。',
            'post.min' => '1文字以上で入力してください。',
            'post.max' => '150文字以内で入力してください。',
        ]);

        $post = Post::find($request->id);

        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $post->update([
            'post' => $request->post,
        ]);

        return redirect('/top');
    }

    // ④ 削除処理
    public function delete(Request $request)
    {
        $post = Post::find($request->id);

        //自分の投稿以外は削除できない
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $post->delete();

        return redirect('/top');
    }

}
