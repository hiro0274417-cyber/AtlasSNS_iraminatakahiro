<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * 新規登録画面を表示
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * 新規登録処理
     */
    public function store(Request $request): RedirectResponse
    {
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
            'email',
            'min:5',
            'max:40',
            'unique:users,email',
        ],
        'password' => [
            'required',
            'alpha_num',
            'min:8',
            'max:20',
            'confirmed',
        ],
        'password_confirmation' => [
            'required',
        ],
    ],
    [
        'username.required' => 'ユーザー名を入力してください。',
        'username.min' => 'ユーザー名は2文字以上で入力してください。',
        'username.max' => 'ユーザー名は12文字以内で入力してください。',

        'email.required' => 'メールアドレスを入力してください。',
        'email.email' => '正しいメールアドレスを入力してください。',
        'email.min' => 'メールアドレスは5文字以上で入力してください。',
        'email.max' => 'メールアドレスは40文字以内で入力してください。',
        'email.unique' => 'このメールアドレスはすでに使用されています。',

        'password.required' => 'パスワードを入力してください。',
        'password.alpha_num' => 'パスワードは半角英数字で入力してください。',
        'password.min' => 'パスワードは8文字以上で入力してください。',
        'password.max' => 'パスワードは20文字以内で入力してください。',
        'password.confirmed' => 'パスワード確認と一致していません。',

        'password_confirmation.required' => 'パスワード確認を入力してください。',
    ]
);

        $user = User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect('/added')
            ->with('username', $user->username);
    }

    /**
     * 登録完了画面を表示
     */
    public function added(): View
    {
        return view('auth.added');
    }
}
