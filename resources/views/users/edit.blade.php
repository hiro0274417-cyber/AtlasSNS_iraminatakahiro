@extends('layouts.app')

@section('content')

<h1>プロフィール編集</h1>

<div class="edit-profile-box">

    {{-- 現在のアイコン --}}
    <img src="{{ $user->images }}" class="edit-profile-icon">

    <form action="/profile/update" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- ユーザー名 --}}
        <label>ユーザー名</label>
        <input type="text" name="username" value="{{ $user->username }}">

        {{-- メールアドレス --}}
        <label>メールアドレス</label>
        <input type="email" name="email" value="{{ $user->email }}">

        {{-- 自己紹介文 --}}
        <label>自己紹介文</label>
        <textarea name="bio">{{ $user->bio }}</textarea>

        {{-- パスワード（伏せ字） --}}
        <label>パスワード</label>
        <input type="password" name="password">

        {{-- パスワード確認 --}}
        <label>パスワード確認</label>
        <input type="password" name="password_confirmation">

        {{-- アイコン画像（初期値は表示しない） --}}
        <label>アイコン画像</label>
        <input type="file" name="images">

        <button type="submit" class="edit-submit-btn">更新する</button>
    </form>

</div>
@endsection
