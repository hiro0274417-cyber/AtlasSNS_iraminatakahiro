@extends('layouts.app')
@section('content')

<h1>ユーザー詳細ページ</h1>

<div class="profile-box">

    {{-- アイコン --}}
    <img src="{{ $target->images }}" class="profile-icon">

    {{-- ユーザー名 --}}
    <p class="profile-username">{{ $target->username }}</p>

    {{-- 自己紹介文 --}}
    <p class="profile-bio">{{ $target->bio }}</p>

    {{-- フォロー状態でボタン切り替え --}}
    @if($isFollow)
        <form action="/unfollow/{{ $target->id }}" method="POST">
            @csrf
            <button class="unfollow-btn">フォロー解除</button>
        </form>
    @else
        <form action="/follow/{{ $target->id }}" method="POST">
            @csrf
            <button class="follow-btn">フォローする</button>
        </form>
    @endif

</div>

<hr>

<h2>投稿一覧</h2>

@foreach($target->posts as $post)
<div class="profile-post-box">

    {{-- 投稿者アイコン --}}
    <img src="{{ $target->images }}" class="profile-post-icon">

    {{-- 投稿者名 --}}
    <p class="profile-post-username">{{ $target->username }}</p>

    {{-- 投稿内容 --}}
    <p class="profile-post-text">{{ $post->post }}</p>

    {{-- 投稿日時 --}}
    <p class="profile-post-date">{{ $post->created_at }}</p>

</div>
@endforeach
