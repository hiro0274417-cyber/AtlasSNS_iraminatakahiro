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
         <label for="icon_image">
            アイコン画像
        </label>

            <img
                src="{{ $user->icon_image_url }}"
                alt="{{ $user->username }}のアイコン"
                class="profile-edit-icon"
            >

            <input
                type="file"
                id="icon_image"
                name="icon_image"
                accept=".jpg,.jpeg,.png,.bmp,.gif,.svg"
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
                自己紹介文
            </label>

            <textarea
                id="bio"
                name="bio"
                rows="5"
            >{{ old('bio', $user->bio) }}</textarea>
        </div>

        <div class="profile-edit-row">
            <label for="newPassword">
                パスワード
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
