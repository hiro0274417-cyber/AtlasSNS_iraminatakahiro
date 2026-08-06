<!-- @extends('layouts.app')

@section('content')

<div class="profile-edit-page">

    <h1 class="profile-edit-title">
        プロフィール編集
    </h1>

    {{-- エラー表示 --}}
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

            <label>
                アイコン画像
            </label>

            <input
                type="file"
                name="images"
            >

        </div>

        <div class="profile-edit-row">

            <label>
                ユーザー名
            </label>

            <input
                type="text"
                name="username"
                value="{{ old('username', $user->username) }}"
            >

        </div>

        <div class="profile-edit-row">

            <label>
                メールアドレス
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email', $user->email) }}"
            >

        </div>

        <div class="profile-edit-row">

            <label>
                自己紹介
            </label>

            <textarea
                name="bio"
                rows="5"
            >{{ old('bio', $user->bio) }}</textarea>

        </div>

        <div class="profile-edit-row">

    <label>
        新しいパスワード
    </label>

    <input
        type="password"
        name="new_password"
        autocomplete="new-password"
    >

</div>

<div class="profile-edit-row">

    <label>
        パスワード確認
    </label>

    <input
        type="password"
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
 -->
