@extends('layouts.app')

@section('content')

<div class="profile-edit-page">

    <h1 class="profile-edit-title">
        プロフィール編集
    </h1>

    @if ($errors->any())
        <div class="validation-errors">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form
        action="{{ url('/profile/update') }}"
        method="POST"
        enctype="multipart/form-data"
        class="profile-edit-form"
    >
        @csrf

        <div class="profile-edit-row">
            <label for="images">
                アイコン画像
            </label>

            <input
                type="file"
                id="images"
                name="images"
            >
        </div>

        <div class="profile-edit-row">
            <label for="username">
                ユーザー名
            </label>

            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username', $user->username) }}"
            >
        </div>

        <div class="profile-edit-row">
            <label for="email">
                メールアドレス
            </label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $user->email) }}"
            >
        </div>

        <div class="profile-edit-row">
            <label for="bio">
                自己紹介
            </label>

            <textarea
                id="bio"
                name="bio"
                rows="5"
            >{{ old('bio', $user->bio) }}</textarea>
        </div>

        <div class="profile-edit-row">
            <label for="newPassword">
                新しいパスワード
            </label>

            <input
                type="password"
                id="newPassword"
                name="new_password"
                autocomplete="new-password"
            >
        </div>

        <div class="profile-edit-row">
            <label for="newPasswordConfirmation">
                パスワード確認
            </label>

            <input
                type="password"
                id="newPasswordConfirmation"
                name="new_password_confirmation"
                autocomplete="new-password"
            >
        </div>

        <button
            type="submit"
            class="profile-update-button"
        >
            更新
        </button>

    </form>

</div>

@endsection
