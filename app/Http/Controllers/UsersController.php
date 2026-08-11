<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UsersController extends Controller
{
    /**
     * ユーザー検索画面を表示
     */
    public function search(Request $request): View
    {
        $keyword = trim((string) $request->query('keyword', ''));

        $followingUserIds = Follow::where('following_id', Auth::id())
            ->pluck('followed_id')
            ->toArray();

        $users = User::query()
            ->where('id', '!=', Auth::id())
            ->when($keyword !== '', function ($query) use ($keyword) {
                $query->where(
                    'username',
                    'like',
                    '%' . $keyword . '%'
                );
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view(
            'users.search',
            compact('users', 'keyword', 'followingUserIds')
        );
    }

    /**
     * ユーザープロフィールを表示
     */
    public function profile($id): View
    {
        $targetUserId = (int) $id;
        $loginUserId = Auth::id();

        $target = User::with([
            'posts' => function ($query) {
                $query->orderByDesc('created_at');
            },
        ])->findOrFail($targetUserId);

        $isOwnProfile = $targetUserId === $loginUserId;
        $isFollow = false;

        if (!$isOwnProfile) {
            $isFollow = Follow::where(
                'following_id',
                $loginUserId
            )
                ->where('followed_id', $targetUserId)
                ->exists();
        }

        return view(
            'users.profile',
            compact('target', 'isOwnProfile', 'isFollow')
        );
    }

    /**
     * ユーザーをフォロー
     */
    public function follow($id): RedirectResponse
    {
        $targetUserId = (int) $id;
        $loginUserId = Auth::id();

        if ($targetUserId === $loginUserId) {
            abort(403);
        }

        User::findOrFail($targetUserId);

        Follow::firstOrCreate([
            'following_id' => $loginUserId,
            'followed_id' => $targetUserId,
        ]);

        return redirect()
            ->back()
            ->with('success', 'フォローしました。');
    }

    /**
     * フォローを解除
     */
    public function unfollow($id): RedirectResponse
    {
        $targetUserId = (int) $id;

        Follow::where('following_id', Auth::id())
            ->where('followed_id', $targetUserId)
            ->delete();

        return redirect()
            ->back()
            ->with('success', 'フォローを解除しました。');
    }

    /**
     * プロフィール編集画面を表示
     */
    public function edit(): View
    {
        $user = Auth::user();

        return view('users.edit', compact('user'));
    }

    /**
     * プロフィールを更新
     */
    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $validated = $request->validate(
            [
                'username' => [
                    'required',
                    'string',
                    'min:2',
                    'max:12',
                ],

                'email' => [
                    'required',
                    'string',
                    'min:5',
                    'max:40',
                    'email',
                    Rule::unique('users', 'email')->ignore($user->id),
                ],
                'bio' => [
                    'nullable',
                    'string',
                    'max:150',
                ],
                'new_password' => [
                'required',
                'alpha_num',
                'min:8',
                'max:20',
                'confirmed',
            ],
                'icon_image' => [
                    'nullable',
                    'file',
                    'mimes:jpg,jpeg,png,bmp,gif,svg',
                ],
            ],
            [
                'username.required'
                    => 'ユーザー名を入力してください。',
                'username.max'
                    => 'ユーザー名は50文字以内で入力してください。',
                'email.required'
                    => 'メールアドレスを入力してください。',
                'email.email'
                    => '正しいメールアドレスを入力してください。',
                'email.unique'
                    => 'このメールアドレスは既に使用されています。',
                'bio.max'
                    => '自己紹介は150文字以内で入力してください。',
                'new_password.alpha_num'
                    => 'パスワードは半角英数字で入力してください。',
                'new_password.min'
                    => 'パスワードは8文字以上で入力してください。',
                'new_password.max'
                    => 'パスワードは20文字以内で入力してください。',
                'new_password.confirmed'
                    => '確認用パスワードと一致しません。',
                'images.image'
                    => '画像ファイルを選択してください。',
                'images.mimes'
                    => '画像はjpg、jpeg、png形式を選択してください。',
                'images.max'
                    => '画像サイズは2MB以内にしてください。',

                'new_password.required'
                    => 'パスワードを入力してください。',
            ]
        );

        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->bio = $validated['bio'] ?? null;

        if (!empty($validated['new_password'])) {
            $user->password = Hash::make(
                $validated['new_password']
            );
        }

        if ($request->hasFile('icon_image')) {
            $path = $request
                ->file('icon_image')
                ->store('public/images');

            $user->icon_image = str_replace(
                'public/',
                '/storage/',
                $path
            );
        }

        $user->save();

        return redirect()
            ->to('/user/profile/' . $user->id)
            ->with(
                'success',
                'プロフィールを更新しました。'
            );
    }
}
