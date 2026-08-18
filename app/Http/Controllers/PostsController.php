<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostsController extends Controller
{
    /**
     * 自分とフォローしているユーザーの投稿一覧を表示
     */
    public function index(): View
    {
        $user = Auth::user();

        $followIds = $user->followings()
            ->pluck('followed_id');

        $userIds = $followIds
            ->push($user->id)
            ->unique();

        $posts = Post::with('user')
            ->whereIn('user_id', $userIds)
            ->orderByDesc('created_at')
            ->get();

        return view('top', compact('posts'));
    }

    /**
     * 投稿を新規登録
     */
    public function create(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'post' => ['required', 'string', 'max:150'],
            ],
            [
                'post.required' => '投稿内容を入力してください。',
                'post.max' => '投稿内容は150文字以内で入力してください。',
            ]
        );

        Post::create([
            'user_id' => Auth::id(),
            'post' => $validated['post'],
          ]);

         return redirect()->route('top');
    }

    /**
     * 投稿を更新
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'id' => ['required', 'integer','exists:posts,id'],
                'post' => ['required', 'string', 'max:150'],
            ],
            [
                'id.required' => '投稿IDがありません。',
                'id.integer' => '投稿IDが不正です。',
                'post.required' => '投稿内容を入力してください。',
                'post.max' => '投稿内容は150文字以内で入力してください。',
            ]
        );

        $post = Post::findOrFail($validated['id']);

        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $post->update([
            'post' => $validated['post'],
        ]);
        return redirect()->route('top');
    }

    /**
     * 投稿を削除
     */
    public function delete(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'id' => ['required', 'integer', 'exists:posts,id'],
            ],
            [
                'id.required' => '投稿IDがありません。',
                'id.integer' => '投稿IDが不正です。',
            ]
        );

        $post = Post::findOrFail($validated['id']);

        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $post->delete();
        return redirect()->route('top');
    }

}
