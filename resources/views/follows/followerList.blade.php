@extends('layouts.app')
@section('content')

<h1>フォロワーリスト</h1>

@foreach($followers as $follower)
<div class="follower-user-box">

    {{-- アイコン --}}
    <a href="/user/profile/{{ $follower->followingUser->id }}">
        <img src="{{ $follower->followingUser->images }}" class="follower-user-icon">
    </a>

    {{-- ユーザー名 --}}
    <p class="follower-username">{{ $follower->followingUser->username }}</p>

    {{-- 投稿一覧 --}}
    @foreach($follower->followingUser->posts as $post)
        <div class="follower-post-box">
            <p class="follower-post-text">{{ $post->post }}</p>
            <p class="follower-post-date">{{ $post->created_at }}</p>
        </div>
    @endforeach

</div>
@endforeach

@endsection
